@extends('layouts.main')
@section('title', $tag->title)
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $tag->title }}</h1>
            <section class="featured-posts-section mb-4">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                                @guest()
                                    <div>
                                        <span>{{ $post->likedUsers->count() }}</span>
                                        <a href="{{ route('personal.main.index') }}"><i class="far fa-heart"></i></a>
                                    </div>
                                @endguest
                                @auth()
                                    <div class="d-flex" id="like" data-like="{{ $post->id }}">
                                        <span id="count">{{ $post->likedUsers->count() }}</span>
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                            @csrf
                                            <button id="btn-like" data-id="{{ $post->id }}" type="submit" class="border-0 bg-transparent">
                                                <i id="icon" class="fa-heart fa{{ auth()->user()->likedUsers->contains($post->id) ? 's' : 'r' }}"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                            <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto mb-4" style="margin-top: -80px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>


@endsection
