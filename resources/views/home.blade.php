@extends('layouts.app')
@section('title', 'Trang chủ')

@section('contain')
    <section class="section-banner mx-auto p-4 d-flex justify-content-center">
        <img src="/img/banner.jpg" alt="banner">
    </section>
    <section class="container mx-auto section-categories">
        @foreach ($categories as $cat)
            <div class="categories-item">
                <a href="/shop/{{ $cat->slug }}?category_id={{ $cat->id }}"><img
                        src='{{ $cat->img }}' alt="banner"></a>
                <span><a href="/shop/{{ $cat->slug }}">{{ $cat->des }}</a></span>
            </div>
        @endforeach
    </section>
@endsection
