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
            Tagged under
            <br>
            <select name="tagged">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <label>
            URL
            <br>
            <input type="url" name="url">
        </label>
        <br>
        <br>
        <label>
            Description
            <br>
            <textarea rows="4" cols="50" name="description"></textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Create it!">
        <br>
    </form>
@endsection