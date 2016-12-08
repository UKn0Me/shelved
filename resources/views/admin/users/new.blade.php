@extends('layouts.new')

@section('description')
    <p>Create a user to let your mate try the future.</p>
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
            Email
            <br>
            <input type="email" name="email">
        </label>
        <br>
        <br>
        <label>
            Secure password
            <br>
            <input type="password" name="password">
        </label>
        <br>
        <br>
        <br>
        <label>
            Password (again)
            <br>
            <input type="password" name="password_confirm">
        </label>
        <br>
        <br>
        <label>
            Group
            <br>
            <select name="group">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>
        </label>
        <br>
        <br>
        <input type="submit" value="Create it!">
        <br>
    </form>
@endsection