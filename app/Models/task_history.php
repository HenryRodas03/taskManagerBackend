<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class task_history extends Model
{

    public $timestamps = true;

    protected $table = 'task_history';

    protected $fillable = [
        'task_id',
        'previous_status',
        'new_status',
    ];
}
