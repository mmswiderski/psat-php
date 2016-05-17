@extends('layouts.books')

@section('page-title')
    Psatoteka - Authors
@stop

@section('content')
    <table class="table table-stripped">
        <thead>
        <th>Lp.</th>
        <th>Imie</th>
        <th>Nazwisko</th>
        </thead>
        <tbody>
        @foreach($authors as $key => $author)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->surname }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

