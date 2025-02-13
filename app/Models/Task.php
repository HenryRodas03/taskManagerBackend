<?php

namespace App\Models;

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

        if ($request->status) {
            $search->where('status', $request->status)->get();
        }

        if ($request->date) {
            $search->where('date', $request->date)->get();
        }

        return $search->paginate(10);
    }

    public static function saveOrUpdateTask($request)
    {
        $data = $request->only(['name', 'description', 'status', 'date']);

        Task::updateOrInsert(
            ['id' => $request->id ?? null],
            $data
        );

        return ['succes'];
    }
}
