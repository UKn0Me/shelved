@extends('layouts.list')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Group</th>
                <th>Created</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>
                        <input type="checkbox" name="selected[]" value="{{ $user->id }}">
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="/admin/users/{{ $user->id }}">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->group->name }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </table>
        <br>
        <button type="submit" name="deactivate" value="true">Deactivate selected</button>
        <button type="reset">Clear</button>
    </form>
@endsection