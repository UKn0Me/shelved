@extends('layouts.base')

@section('title', 'Dashboard')

@section('content')
    <div class="grid-container">
        <section class="grid-33 mobile-grid-100">
            <h1>Stats</h1>
            <p>You currently have {{ $bookmarks->count() }} bookmark(s),
                with {{ $bookmarks->count() - $bookmarks->where('tag_id', NULL)->count() }} of them being tagged under
                your {{ $tags->count() }} tag(s), leaving {{ $bookmarks->where('tag_id', NULL)->count() }} untagged.</p>
        </section>
        <section class="grid-66 mobile-grid-100">
            <h2>Latest</h2>
            <section class="grid-50 mobile-grid-100">
                @if(!empty($bookmarks->sortByDesc('created_at')->first()))
                    <h3>
                        <a href="{{ $bookmarks->sortByDesc('created_at')->first()->url }}">
                            {{ $bookmarks->sortByDesc('created_at')->first()->name }}
                        </a>
                    </h3>
                    <ul>
                        <li>Created at {{ $bookmarks->sortByDesc('created_at')->first()->created_at }}</li>
                        <li>Last modified {{ $bookmarks->sortByDesc('created_at')->first()->updated_at }}</li>
                        <li>
                            Tagged under
                            <a href="/dashboard/tags/{{ $bookmarks->sortByDesc('created_at')->first()->tag_id }}">
                                {{ $tags->find($bookmarks->sortByDesc('created_at')->first()->tag_id)->name }}
                            </a>
                        </li>
                    </ul>
                    <p>{{ $bookmarks->sortByDesc('created_at')->first()->description }}</p>
                @else
                    <p>You don't seem to have any bookmarks</p>
                @endif
            </section>

            <section class="grid-50 mobile-grid-100">
                @if(!empty($tags->sortByDesc('created_at')->first()))
                    <h3>
                        <a href="/dashboard/tags/{{ $tags->sortByDesc('created_at')->first()->id }}">
                            {{ $tags->sortByDesc('created_at')->first()->name }}
                        </a>
                    </h3>
                    <ul>
                        <li>Created at {{ $tags->sortByDesc('created_at')->first()->created_at }}</li>
                        <li>Last modified {{ $tags->sortByDesc('created_at')->first()->updated_at }}</li>
                    </ul>
                    <p>{{ $tags->sortByDesc('created_at')->first()->description }}</p>
                @else
                    <p>You don't seem to have any tags</p>
                @endif
            </section>
        </section>
    </div>
@endsection