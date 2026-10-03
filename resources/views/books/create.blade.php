@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
    <h2>Add a Book</h2>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf

        <div>
            <label>Title</label><br>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Author</label><br>
            <input type="text" name="author" value="{{ old('author') }}">
            @error('author') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Year</label><br>
            <input type="text" name="year" value="{{ old('year') }}">
            @error('year') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Category</label><br>
            <select name="category">
                <option value="">Choose a category</option>
                <option value="Motivation" @selected(old('category') == 'Motivation')>Motivation</option>
                <option value="Self-Help" @selected(old('category') == 'Self-Help')>Self-Help</option>
                <option value="Psychology" @selected(old('category') == 'Psychology')>Psychology</option>
            </select>
            @error('category') <span>{{ $message }}</span> @enderror
        </div>

        <br>
        <button type="submit">Save</button>
    </form>
@endsection