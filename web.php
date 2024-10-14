<?php

use App\Controllers\JanrController;
use App\Controllers\MuallifController;
use App\Controllers\KitobController;
use App\Controllers\AuthController;
use App\Routes\Route;

// Muallif
Route::get("/", [MuallifController::class, "index"]);
Route::post("/createM", [MuallifController::class, "createM"]);
Route::post("/deleteM", [MuallifController::class, "deleteM"]);
Route::post("/showM", [MuallifController::class, "showM"]);
Route::post("/editM", [MuallifController::class,"editM"]);
Route::post("/updateM", [MuallifController::class,"updateM"]);
// Janr
Route::get("/janr",[JanrController::class,"index"]);
Route::post("/create", [JanrController::class, "create"]);
Route::post("/delete", [JanrController::class, "delete"]);
Route::post("/show", [JanrController::class, "show"]);
Route::post("/edit", [JanrController::class,"edit"]);
Route::post("/update", [JanrController::class,"update"]);
// Kitob
Route::get("/kitob", [KitobController::class,"index"]);
Route::post("/createK", [KitobController::class, "createK"]);
Route::post("/deleteK", [KitobController::class, "deleteK"]);
Route::post("/showK", [KitobController::class, "showK"]);
Route::post("/editK", [KitobController::class,"editK"]);
Route::post("/updateK", [KitobController::class,"updateK"]);
// Auth
Route::get('/login', [AuthController::class,'loginPage']);
Route::post('/loginu',[AuthController::class,'login']);

Route::get('/logout',[AuthController::class,'logout']);

Route::get('/register',[AuthController::class,'registerPage']);
Route::post('/register',[AuthController::class,'register']);
