<?php

use App\Http\Controllers\AuthenticationController;

Route::post('register', [AuthenticationController::class, 'register']);

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
});
