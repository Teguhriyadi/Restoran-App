<?php

use App\Http\Controllers\Master\KategoriController;
use Illuminate\Support\Facades\Route;

Route::prefix("kategori")->group(function() {
    Route::get("/", [KategoriController::class, "index"]);
    Route::get("/create", [KategoriController::class, "create"]);
    Route::post("/", [KategoriController::class, "store"]);
    Route::get("/{id}/edit", [KategoriController::class, "edit"]);
    Route::put("/{id}", [KategoriController::class, "update"]);
    Route::delete("/{id}", [KategoriController::class, "delete"]);
    Route::put("/{id}/change-status", [KategoriController::class, "change_status"]);
});
