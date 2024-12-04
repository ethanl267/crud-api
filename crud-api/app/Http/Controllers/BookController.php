<?php

namespace App\Http\Controllers\AuthController;

use App\Models\Book;
use Illuminate\Http\Request;

Route::post('/login', [AuthController::class, 'login']); // For user login
Route::post('/register', [AuthController::class, 'register']); // For user registration

class BookController extends Controller
{
    // Store a newly created book in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($book, 201); // Return the created book with a 201 status
    }

    // Display a listing of the books
    public function index()
    {
        $books = Book::all(); // Get all books from the database
        return response()->json($books);
    }

    // Display the specified book
    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        return response()->json($book);
    }

    // Update the specified book
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($book);
    }

    // Remove the specified book from storage
    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => 'Book not found'], 404);
        }

        $book->delete();

        return response()->json(['message' => 'Book deleted successfully']);
    }
}

