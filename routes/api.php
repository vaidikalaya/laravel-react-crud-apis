<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::controller(UserController::class)->group(function(){
    Route::get('/users','index');
    Route::get('/user/{id}','userDetail');
    Route::post('/save-user','saveUser');
    Route::patch('/update-user/{id}','updateUser');
    Route::delete('/delete-user/{id}','deleteUser');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
