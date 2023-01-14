<?php

use app\core\classes\Route;
use app\controllers\AuthController;
use app\controllers\BlogController;
use app\middlewares\AuthMiddleware;

Route::get("/", [BlogController::class, "index"]);
Route::get("/posts", [BlogController::class, "index"]);
Route::middleware(AuthMiddleware::class, function () {
    Route::get("/post/create", [BlogController::class, "create"]);
    Route::post("/post/store", [BlogController::class, "store"]);
    Route::get("/auth/logout", [AuthController::class, "logout"]);
});
Route::get("/auth/register", [AuthController::class, "registerView"]);
Route::post("/auth/register", [AuthController::class, "register"]);
Route::get("/auth/login", [AuthController::class, "loginView"]);
Route::post("/auth/login", [AuthController::class, "login"]);


