@extends('layouts.books')

@section('page-title')
    Psatoteka - Strona główna
@stop

@section('content')
    <table class="table table-stripped">
        <thead>
        <th>Lp.</th>
        <th>Tytuł</th>
        <th>Autor</th>
        <th>Status</th>
        </thead>
        <tbody>
            @foreach($books as $key => $book)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>Status</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop