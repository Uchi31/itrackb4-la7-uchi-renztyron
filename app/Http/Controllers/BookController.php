<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BookController extends Controller
{
    private function getBooks()
{
    $path = storage_path('app/data/books.json');
    $data = json_decode(file_get_contents($path), true);

    $books = [];
    foreach ($data as $book) {
        $books[$book['id']] = $book;
    }

    return $books;
}

private function saveBooks($books)
{
    $path = storage_path('app/data/books.json');
    file_put_contents($path, json_encode(array_values($books), JSON_PRETTY_PRINT));
}

    public function index(Request $request)
{
    $books = $this->getBooks();

    $category = $request->query('category', '');
    $year = $request->query('year', '');

    if ($category !== '') {
        foreach ($books as $key => $book) {
            if ($book['category'] !== $category) {
                unset($books[$key]);
            }
        }
    }

    if ($year !== '') {
        foreach ($books as $key => $book) {
            if ($book['year'] != $year) {
                unset($books[$key]);
            }
        }
    }

    return view('books.index', [
        'books' => $books,
        'category' => $category,
        'year' => $year,
    ]);
}

    public function create()
{
    return view('books.create');
}

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|max:255',
        'author' => 'required|max:255',
        'year' => 'required|numeric',
        'category' => 'required|in:Motivation,Self-Help,Psychology',
    ]);

    $books = $this->getBooks();
    $newId = count($books) ? max(array_keys($books)) + 1 : 1;
    $validated['id'] = $newId;
    $books[$newId] = $validated;

    $this->saveBooks($books);

    return redirect()->route('books.index')->with('success', 'Book added successfully.');
}

    public function show(string $id)
    {
        $books = $this->getBooks();

        if (!isset($books[$id])) {
            abort(404);
        }

        return view('books.show', ['book' => $books[$id]]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function featured()
    {
        $books = $this->getBooks();
        $featured = $books[3];

        return view('books.show', ['book' => $featured]);
    }

    
}
