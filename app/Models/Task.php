<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use function App\Helpers\cleanKeyWord;


class Task extends Model
{
    use SoftDeletes, HasFactory;

    public $timestamps = true;

    protected $table = 'tasks';

    protected $fillable = [
        'name',
        'description',
        'status',
        'date',
    ];

    public static function getTasks($request)
    {
        $requestQuery = new Task;
        $search = $requestQuery->newQuery();


        $search->when($request->keyWordInput, function (Builder $query, $keyWordInput) {
            $keyWord = cleanKeyWord($keyWordInput);
            $query->where(function ($query) use ($keyWord) {
                $query->orWhere('tasks.name', 'LIKE', $keyWord)
                    ->orWhere('tasks.description', 'LIKE', $keyWord);
            });
        });


        if ($request->status != null) {
            $search->where('status', $request->status)->get();
        }

        if ($request->date != null) {
            $search->where('date', $request->date)->get();
        }

        if ($request->finishDate != null) {
            $search->whereIn('tasks.id', function ($query) use ($request) {
                $query->select('task_id')
                    ->from('task_history')
                    ->where('tasks.status', 2)
                    ->whereDate('changed_at', $request->finishDate);
            })->get();
        }

        return $search->orderBy('created_at', 'desc')->paginate(10);
    }

    public static function saveOrUpdateTask($request)
    {
        $data = $request->only(['name', 'description', 'status', 'date']);


        $task = Task::updateOrCreate(
            ['id' => $request->id ?? null],
            $data
        );

        $lastHistory = TaskHistory::where('task_id', $task->id)
            ->orderBy('changed_at', 'desc')
            ->first();

        $previousStatus = $lastHistory ? $lastHistory->new_status : 0;

        TaskHistory::create([
            'task_id' => $task->id,
            'previous_status' => $previousStatus,
            'new_status' => $task->status,
            'changed_at' => Carbon::now()->toDateString(),
        ]);

        return ['success'];
    }

    public static function deleteTask($request)
    {
        $user = task::find($request->taskId);
        return $user->delete();
    }
}
