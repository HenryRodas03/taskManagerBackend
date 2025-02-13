<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TaskHistory extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $table = 'task_history';

    protected $fillable = [
        'task_id',
        'previous_status',
        'new_status',
    ];
}
