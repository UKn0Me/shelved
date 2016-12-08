@extends('layouts.list')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Tag</th>
                <th>Created</th>
            </tr>

            @foreach($bookmarks as $bookmark)
                <tr>
                    <td>
                        <input type="checkbox" name="selected[]" value="{{ $bookmark->id }}">
                    </td>
                    <td>
                        <a href="{{ url()->current() }}/{{ $bookmark->id }}">{{ $bookmark->name }}</a>
                    </td>
                    <td>@if(!empty($bookmark->tag->name)){{ $bookmark->tag->name }}@endif</td>
                    <td>{{ $bookmark->created_at }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <button type="submit" name="delete" value="true">Delete selected</button>
        <button type="reset">Clear</button>
    </form>
@endsection