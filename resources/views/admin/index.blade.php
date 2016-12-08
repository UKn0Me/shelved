@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    <div class="grid-container">
        <section class="grid-25 mobile-grid-100">
            <h1>Administration</h1>
            <ul>
                <li>
                    <a href="/admin/tags">Tags</a>
                </li>
                <li>
                    <a href="/admin/bookmarks">Bookmarks</a>
                </li>
                <li>
                    <a href="/admin/users">Users</a>
                </li>
            </ul>
        </section>

        <section class="grid-40 mobile-grid-100">
            <h2>Stats</h2>
            <p>Sitewide there are a total of {{ $bookmarks->count() }} bookmarks over {{ $tags->count() }} tag(s)
                and {{ $users->count() }} user(s).</p>
            <p>On average, a user has {{ round($bookmarks->count()/$users->count(), 2) }}
                bookmarks, {{ round($tags->count()/$users->count(), 2) }} tags
                and {{ round($bookmarks->count()/$tags->count(), 2) }}
                bookmarks to a tag.</p>
            <p>There are currently {{ $users->where('group_id', 1)->count() }} administrator(s) and if you're seeing
                this,
                you're one of them!</p>
        </section>
        <section class="grid-35 mobile-grid-100">
            <h2>Latest</h2>
            <section class="grid-100">
                <h3>
                    {{ $users->sortByDesc('created_at')->first()->name }}
                </h3>
                <ul>
                    <li>Email {{ $users->sortByDesc('created_at')->first()->email }}</li>
                    <li>Joined {{ $users->sortByDesc('created_at')->first()->created_at }}</li>
                    <li>In group {{ $users->sortByDesc('created_at')->first()->group->name }}</li>
                </ul>
            </section>
        </section>
    </div>
@endsection