@extends('layouts.base')

@section('title', 'Sign up')

@section('content')
    <div class="grid-container">
        <section class="grid-60 mobile-grid-100">
            <h1>Sign up</h1>
            <p>Signing up means you agree to the terms of service and privacy policy.</p>
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
                    Your name
                    <br>
                    <input type="text" name="name">
                </label>
                <br>
                <br>
                <br>
                <label>
                    Email address
                    <br>
                    <input type="email" name="email">
                </label>
                <br>
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
                <input type="submit" value="Sign me up!">
            </form>
        </section>
    </div>
@endsection