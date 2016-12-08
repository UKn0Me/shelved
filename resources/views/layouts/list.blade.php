@extends('layouts.base')

@if(str_contains(url()->current(), 'tags'))
    @php($item = $tags)
    @php($item_type = "Tags")
@elseif(str_contains(url()->current(), 'users'))
    @php($item = $users)
    @php($item_type = "Users")
@else
    @php($item = $bookmarks)
    @php($item_type = "Bookmarks")
@endif

@section('title', $item_type)

@section('styles')
    @parent

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
@endsection

@section('content')
    <div class="grid-container">
        <section class="grid-25 mobile-grid-100">
            <h1>{{ $item_type }} ({{ $item->count() }})</h1>

            <ul>
                @unless(str_contains(url()->current(), 'users'))
                    <li>
                        <a href="/dashboard/tags/new">Create a new tag</a>
                    </li>
                    <li>
                        <a href="/dashboard/bookmarks/new">Create a new bookmark</a>
                    </li>
                @endunless

                @if(str_contains(url()->current(), 'users'))
                    <li>
                        <a href="/admin/users/new">Create a new user</a>
                    </li>
                @endif
            </ul>
        </section>

        <section class="grid-75 mobile-grid-100">
            @yield('page-content')
        </section>
    </div>
@endsection