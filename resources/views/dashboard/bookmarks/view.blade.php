@extends('layouts.view')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <label>
            Name
            <br>
            <input type="text" name="name" value="{{ $bookmark->name }}">
        </label>
        <br>
        <br>
        <label>
            Tagged under
            <br>
            <select name="tagged">
                @foreach($tags as $tag)
                    @if($tag->id == $bookmark->tag_id)
                        @php($selected = ' selected')
                    @else
                        @php($selected = '')
                    @endif

                    <option value="{{ $tag->id }}"{{ $selected }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <label>
            URL
            <br>
            <input type="url" name="url" value="{{ $bookmark->url }}">
        </label>
        <br>
        <br>
        <label>
            Description
            <br>
            <textarea rows="4" cols="50" name="description">{{ $bookmark->description }}</textarea>
        </label>
        <br>
        <br>
        <input type="submit" value="Change it!">
        <br>
    </form>
@endsection