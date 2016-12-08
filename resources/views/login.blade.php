@extends('layouts.base')

@section('title', 'Login')

@section('content')
    <div class="grid-container">
        <section class="grid-60 mobile-grid-100">
            <h1>Login</h1>
            <p>Enjoy the glorious feeling of organised, central bookmarks.</p>
            <br>
            <h3>Note</h3>
            <p>An admin account is automatically created with the following details;
                <br>email: "admin@example.com",
                <br>password: "secret".</p>
        </section>

        <section class="grid-40 mobile-grid-100">
            <br>
            <form action="{{ url()->current() }}" method="post">
                {{ csrf_field() }}
                <label>
                    Email address
                    <br>
                    <input type="email" name="email">
                </label>
                <br>
                <br>
                <br>
                <label>
                    Password
                    <br>
                    <input type="password" name="password">
                </label>
                <br>
                <br>
                <input type="submit" value="Log me in!">
                <br>
            </form>
        </section>
    </div>
@endsection