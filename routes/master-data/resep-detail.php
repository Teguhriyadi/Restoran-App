<?php

use App\Http\Controllers\Master\ResepController;
use App\Http\Controllers\Master\ResepDetailController;
use Illuminate\Support\Facades\Route;

Route::prefix("resep-detail")->group(function() {
    Route::get("/{id}/list", [ResepDetailController::class, "index"]);
    Route::get("/{id}/create", [ResepDetailController::class, "create"]);
    Route::post("/{id}/store", [ResepDetailController::class, "store"]);
    Route::get("/{id}/edit", [ResepDetailController::class, "edit"]);
    Route::put("/{id}/", [ResepDetailController::class, "update"]);
    Route::delete("/{id}/delete-data", [ResepDetailController::class, "delete"]);
});
