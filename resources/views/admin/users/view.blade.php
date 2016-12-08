@extends('layouts.view')

@section('page-content')
    <form action="{{ url()->current() }}" method="post">
        {{ csrf_field() }}
        <label>
            Name
            <br>
            <input type="text" name="name" value="{{ $user->name }}">
        </label>
        <br>
        <br>
        <label>
            Email
            <br>
            <input type="email" name="email" value="{{ $user->email }}">
        </label>
        <br>
        <br>
        <label>
            Group
            <br>
            <select name="group">
                @foreach($groups as $group)
                    @if($group->id == $user->group_id)
                        @php($selected = ' selected')
                    @else
                        @php($selected = '')
                    @endif

                    <option value="{{ $group->id }}"{{ $selected }}>{{ $group->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <input type="submit" value="Change it!">
        <br>
    </form>
@endsection