@extends('layouts.base')

@if(str_contains(url()->current(), 'tags'))
    @php($item_type = "tag")
@elseif(str_contains(url()->current(), 'users'))
    @php($item_type = "user")
@else
    @php($item_type = "bookmark")
@endif

@section('title')
    Create a {{ $item_type }}
@endsection

@section('content')
    <div class="grid-container">
        <section class="grid-30 mobile-grid-100">
            <h1>Create a {{ $item_type }}</h1>
            @yield('description')
        </section>

        <section class="grid-70 mobile-grid-100">
            @yield('page-content')
        </section>
    </div>
@endsection