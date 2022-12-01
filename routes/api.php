<?php
use App\Http\Controllers\MatterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('matters', MatterController::class);
Route::get('/matterFindName/{name}', [MatterController::class, 'findName']);
Route::get('/matterFindDescription/{description}', [MatterController::class, 'findDescription']);
Route::get('/matterFindNameDescription/{search}', [MatterController::class, 'findNameDescription']);