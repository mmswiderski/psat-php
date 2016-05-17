@extends('layouts.books')

@section('page-title')
    Psatoteka - Books to authors
@stop

@section('content')
    <table class="table table-stripped">
        <thead>
        <th>Lp.</th>
        <th>author_id</th>
        <th>book_id</th>
        </thead>
        <tbody>
        @foreach($books as $key => $book)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $book->author_id }}</td>
                <td>{{ $book->book_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop