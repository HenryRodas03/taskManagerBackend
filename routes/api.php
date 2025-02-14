<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    //Auth
    Route::post('logOut', [AuthController::class, 'logOut']);

    //TaskController
    Route::get('listAllTasks', [TaskController::class, 'getTasks']);

    Route::post('saveOrUpdateTask', [TaskController::class, 'saveOrUpdateTask']);
    Route::post('deleteTask', [TaskController::class, 'deleteTask']);
});
