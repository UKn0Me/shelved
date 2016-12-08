@extends('layouts.list')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Created</th>
            </tr>

            @foreach($tags as $tag)
                <tr>
                    <td>
                        <input type="checkbox" name="selected[]" value="{{ $tag->id }}">
                    </td>
                    <td>
                        <a href="/dashboard/tags/{{ $tag->id }}">{{ $tag->name }}</a>
                    </td>
                    <td>{{ $tag->description }}</td>
                    <td>{{ $tag->created_at }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <button type="submit" name="delete" value="true">Delete selected</button>
        <button type="reset">Clear</button>
    </form>
@endsection