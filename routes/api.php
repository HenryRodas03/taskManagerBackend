<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    //TaskController
    Route::get('listAllTasks', [TaskController::class, 'getTasks']);

    Route::post('saveOrUpdateTask', [TaskController::class, 'saveOrUpdateTask']);
});
