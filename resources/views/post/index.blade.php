@extends('layouts.main')
@section('title', 'Posts')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
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
                                    <div class="d-flex">
                                        <span>{{ $post->likedUsers->count() }}</span>
                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fa{{ auth()->user()->likedUsers->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
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
            <div class="row">
                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
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
                                        <div class="d-flex">
                                            <span>{{ $post->likedUsers->count() }}</span>
                                            <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fa{{ auth()->user()->likedUsers->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
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
                    </section>
                </div>
                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-carousel">
                        <h5 class="widget-title">Post Lists</h5>
                        <div class="post-carousel">
                            <div id="carouselId" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselId" data-slide-to="1"></li>
                                    <li data-target="#carouselId" data-slide-to="2"></li>
                                    <li data-target="#carouselId" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <?php $i = 0?>
                                    @foreach($randomPosts as $post)
                                    <figure class="carousel-item {{ $i == 0 ? ' active' : '' }}">
                                        <img src="{{ asset('storage/' . $post->preview_image) }}"
                                             alt="First slide">
                                        <figcaption class="post-title">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                                                @guest()
                                                    <div>
                                                        <span>{{ $post->likedUsers->count() }}</span>
                                                        <a href="{{ route('personal.main.index') }}"><i class="far fa-heart"></i></a>
                                                    </div>
                                                @endguest
                                                @auth()
                                                    <div class="d-flex">
                                                        <span>{{ $post->likedUsers->count() }}</span>
                                                        <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="border-0 bg-transparent">
                                                                <i class="fa{{ auth()->user()->likedUsers->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endauth
                                            </div>
                                        </figcaption>
                                    </figure>
                                    <?php $i++?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Popular Post</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                            <li class="post">
                                <a href="{{ route('post.show', $post->id) }}" class="post-permalink media">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="blog post">
                                    <div class="media-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="post-title">{{ $post->title }}</h6>
                                            @guest()
                                                <div>
                                                    <span>{{ $post->likedUsers->count() }}</span>
                                                    <a href="{{ route('personal.main.index') }}"><i class="far fa-heart"></i></a>
                                                </div>
                                            @endguest
                                            @auth()
                                                <div class="d-flex">
                                                    <span>{{ $post->likedUsers->count() }}</span>
                                                    <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                                        @csrf
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            <i class="fa{{ auth()->user()->likedUsers->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories"
                             class="w-100">
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
