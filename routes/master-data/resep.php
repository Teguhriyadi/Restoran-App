<?php

use App\Http\Controllers\Master\ResepController;
use Illuminate\Support\Facades\Route;

Route::prefix("resep")->group(function() {
    Route::get("/", [ResepController::class, "index"]);
    Route::get("/create", [ResepController::class, "create"]);
    Route::post("/", [ResepController::class, "store"]);
    Route::get("/{id}/edit", [ResepController::class, "edit"]);
    Route::put("/{id}", [ResepController::class, "update"]);
    Route::delete("/{id}", [ResepController::class, "delete"]);
    Route::put("/{id}/change-status", [ResepController::class, "change_status"]);
});
