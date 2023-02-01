@extends('layouts.main-layout')

@section('content')

    <h1 class="text-danger">Movies</h1>
    <ul>
        @foreach ($movies as $movie)
            <li>
                {{ $movie -> title }} ({{ $movie -> original_title }})<br>
                {{ $movie -> nationality }}<br>
                {{ $movie -> date }}<br>
                {{ $movie -> vote }}
            </li>
        @endforeach
        <hr>
        <li>
            {{ $single_movie -> title }} ({{ $single_movie -> original_title }})<br>
            {{ $single_movie -> nationality }}<br>
            {{ $single_movie -> date }}<br>
            {{ $single_movie -> vote }}
        </li>
    </ul>

@endsection