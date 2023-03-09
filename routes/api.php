<?php

use App\Http\Controllers\Api\TestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('/test', TestApiController::class);
