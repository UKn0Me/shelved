@extends('layouts.new')

@section('description')
    <p>Remember your bookmarks so that you can get back to them.</p>
@endsection

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <label>
            Name
            <br>
            <input type="text" name="name">
        </label>
        <br>
        <br>
        <label>
            Description
            <br>
            <input type="text" name="description">
        </label>
        <br>
        <br>
        <input type="submit" value="Create it!">
        <br>
    </form>
@endsection
