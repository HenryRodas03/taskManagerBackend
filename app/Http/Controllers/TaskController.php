<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationTask;
use App\Models\Task;

class TaskController extends Controller
{

    public function getTasks(ValidationTask $request)
    {
        try {
            $response = Task::getTasks($request);
            return ['status' => true, 'message' => 'success', 'data' => $response];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => "error", $e->getMessage()];
        }
    }

    public function saveOrUpdateTask(ValidationTask $request)
    {
        try {
            $response = Task::saveOrUpdateTask($request);
            return ['status' => true, 'message' => 'success', 'data' => $response];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => "error", $e->getMessage()];
        }
    }

    public function deleteTask(ValidationTask $request)
    {
        try {
            $response = Task::deleteTask($request);
            return ['status' => true, 'message' => 'success', 'data' => $response];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => "error", $e->getMessage()];
        }
    }
}
