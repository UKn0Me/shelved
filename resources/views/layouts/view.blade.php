@extends('layouts.base')

@if(str_contains(url()->current(), 'tags'))
    @php($item = $tag)
    @php($item_type = "tag")
@elseif(str_contains(url()->current(), 'users'))
    @php($item = $user)
    @php($item_type = "user")
@else
    @php($item = $bookmark)
    @php($item_type = "bookmark")
@endif

@section('title', $item->name)

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
        <section class="grid-30 mobile-grid-100">
            <h1>
                @if($item_type == "bookmark")
                    <a href="{{ $item->url }}">{{ $item->name }}</a>
                @else
                    {{ $item->name }}
                @endif
            </h1>
            <ul>
                <li>
                    Created {{ $item->created_at }}
                </li>
                <li>
                    Last modified {{ $item->updated_at }}
                </li>
            </ul>
        </section>

        <section class="grid-70 mobile-grid-100">
            @yield('page-content')
        </section>
    </div>
@endsection