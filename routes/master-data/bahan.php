<?php

use App\Http\Controllers\Master\BahanController;
use Illuminate\Support\Facades\Route;

Route::prefix("bahan")->group(function() {
    Route::get("/", [BahanController::class, "index"]);
    Route::get("/create", [BahanController::class, "create"]);
    Route::post("/", [BahanController::class, "store"]);
    Route::get("/{id}/edit", [BahanController::class, "edit"]);
    Route::put("/{id}", [BahanController::class, "update"]);
    Route::delete("/{id}", [BahanController::class, "delete"]);
    Route::put("/{id}/change-status", [BahanController::class, "change_status"]);
});
