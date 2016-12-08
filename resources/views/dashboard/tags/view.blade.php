@extends('layouts.view')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <label>
            Name
            <input type="text" name="name" value="{{ $tag->name }}">
        </label>
        <label>
            Description
            <input type="text" name="description" value="{{ $tag->description }}">
        </label>
        <input type="submit" value="Change it!">
        <br>
        <br>
    </form>
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
            </tr>

            @foreach($bookmarks as $bookmark)
                <tr>
                    <td>
                        <input type="checkbox" name="selected[]" value="{{ $bookmark->id }}">
                    </td>
                    <td>
                        <a href="/dashboard/bookmarks/{{ $bookmark->id }}">{{ $bookmark->name }}</a>
                    </td>
                    <td>{{ $bookmark->description }}</td>
                    <td>{{ $bookmark->created_at }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <button type="submit" name="delete" value="true">Delete selected</button>
        <button type="reset">Clear</button>
    </form>
@endsection