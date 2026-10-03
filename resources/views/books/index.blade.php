@extends('layouts.app')

@section('title', 'All Books')

@section('content')

<a href="{{ route('books.create')}}" class="btn btn-primary mb-3">Add books</a>
    <p>
        Filter by category:
        <a href="{{ route('books.index', ['category' => 'Motivation', 'year' => $year]) }}">Motivation</a>
        |
        <a href="{{ route('books.index', ['category' => 'Self-Help', 'year' => $year]) }}">Self-Help</a>
        |
        <a href="{{ route('books.index', ['category' => 'Psychology', 'year' => $year]) }}">Psychology</a>
    </p>

    <p>
        Filter by year:
        <a href="{{ route('books.index', ['category' => $category, 'year' => 1937]) }}">1937</a>
        |
        <a href="{{ route('books.index', ['category' => $category, 'year' => 2018]) }}">2018</a>
    </p>

    <p>
        @if ($category || $year)
            Active filters:
            @if ($category) Category: {{ $category }} @endif
            @if ($year) Year: {{ $year }} @endif
            |
            <a href="{{ route('books.index') }}">Clear all filters</a>
        @else
            Showing all books
        @endif
    </p>

    @forelse ($books as $book)
        @if ($loop->first)
            <table class="table table-striped table-bordered">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year</th>
                </tr>
        @endif

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><a href="{{ route('books.show', $book['id']) }}">{{ $book['title'] }}</a></td>
            <td>{{ $book['author'] }}</td>
            <td>
                {{ $book['year'] }}
                @if ($book['year'] < 1950)
                    <span>(Classic)</span>
                @endif
            </td>
        </tr>

        @if ($loop->last)
            </table>
        @endif
    @empty
        <p>No books are available right now. Please check back later.</p>
    @endforelse
@endsection