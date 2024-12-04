<?php

use App\Http\Controllers\BookController;

Route::post('/books', [BookController::class, 'store']);      // Create a new book
Route::get('/books', [BookController::class, 'index']);        // List all books
Route::get('/books/{id}', [BookController::class, 'show']);    // View a single book by ID
Route::put('/books/{id}', [BookController::class, 'update']);  // Update a book
Route::delete('/books/{id}', [BookController::class, 'destroy']); // Delete a book
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
