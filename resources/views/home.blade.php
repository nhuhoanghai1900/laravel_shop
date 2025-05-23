@extends('layouts.app')
@section('title', 'CATMEN HOME')

@section('content')
    <section class="section-banner mx-auto p-4 d-flex justify-content-center">
        <img src="/img/banner.jpg" alt="banner">
    </section>
    <section class="container mx-auto section-categories mb-5">
        @foreach ($clothesCategories as $category)
            <div class="categories-item">
                <a href="{{ route('shop.show', ['category' => $category->slug]) }}">
                    <img src='{{ $category->img }}' alt="banner">
                </a>
                <span><a href="{{ route('shop.show', ['category' => $category->slug]) }}">
                        {{ $category->des }}
                    </a></span>
            </div>
        @endforeach
    </section>
@endsection
