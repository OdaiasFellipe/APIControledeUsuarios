<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    function () {
        return response()->json(
            [
                'version' => app()->version(),
            ]
        );
    }
);

Route::group(
    [
        'prefix' => 'auth'
    ],
    function ($router) {

       
        Route::post('/login',[AuthController::class, 'login']);
        Route::get('/logout',[AuthController::class, 'logout']);
        Route::get('/refresh',[AuthController::class, 'refresh']);
        Route::get('/me',[AuthController::class, 'me']);
        Route::post('/register',[AuthController::class, 'register']);
    }
);



Route::middleware('auth:api')->group(function() {
    Route::patch('user/profile', [UserController::class, 'profile']);
});