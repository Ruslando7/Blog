@extends('layouts.main')
@section('title', $post->title)
@section('content')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog single page</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{ $date->monthName }} {{ $date->day }}, {{ $date->year }}
                • {{ $date->format('H:i') }} • {{ $post->comments->count() }} Comments</p>
            <section class="text-center blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="mx-auto"
                     style="max-height: 600px;">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <p data-aos="fade-up"><a href="#">Lorem ipsum, or lipsum as it is sometimes known,</a> is dummy
                            text used in laying out printed graphic or web designs. The passage is at attributed to an
                            unknown typesetters in 1the 5th century who is thought scrambled with all parts of Cicero’s
                            De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out
                            printed graphic or web designs</p>
                        <h2 class="mb-4" data-aos="fade-up">Blog single page</h2>
                        <ul data-aos="fade-up">
                            <li>What manner of thing was upon me I did not know, but that it was large and heavy and
                                many-legged I could feel.
                            </li>
                            <li>My hands were at its throat before the fangs had a chance to bury themselves in my neck,
                                and slowly
                            </li>
                            <li>I forced the hairy face from me and closed my fingers, vise-like, upon its windpipe.
                            </li>
                        </ul>

                        <blockquote data-aos="fade-up">
                            <p>You are safe here! I shouted above the sudden noise. She looked away from me downhill.
                                The people were coming out of their houses, astonished.</p>
                            <footer class="blockquote-footer">Oluchi Mazi</footer>
                        </blockquote>
                        <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed
                            graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th
                            century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it
                            is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <div class="d-flex align-items-center">
                        <h6 class="mb-1">Оценить статью:</h6>
                        @guest()
                            <div class="d-flex ml-2">
                                <span class="mr-1">{{ $post->likedUsers->count() }}</span>
                                <a href="{{ route('login') }}"><i class="far fa-heart"></i></a>
                            </div>
                        @endguest
                        @auth()
                            <div class="d-flex ml-2" id="like" data-like="{{ $post->id }}">
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
                @if(($relatedPosts->toArray()))
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <a class="col-md-4" data-aos="fade-up" data-aos-delay="100" href="{{ route('post.show', $relatedPost->id) }}">
                                        <img src="{{ asset('storage/' . $relatedPost->preview_image) }}"
                                             alt="related post"
                                             class="post-thumbnail" style="height: 210px; object-fit: cover;">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <h5 class="post-title">{{ $relatedPost->title }}</h5>
                                    </a>
                                @endforeach
                            </div>
                        </section>
                    @endif
                    <div class="comment-section">
                        <h2 class="section-title mb-4" data-aos="fade-up">Comments ({{ $post->comments->count() }})</h2>
                        <div class="card-comment">
                            @foreach($post->comments as $comment)
                                <div class="comment-text mb-3" data-aos="fade-up">
                                <span class="username">
                                <div><b>{{ $comment->user->name }}</b></div>
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                </span><!-- /.username -->
                                    {{ $comment->message }}
                                </div>
                                <!-- /.comment-text -->
                            @endforeach
                        </div>
                    </div>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                            <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control" placeholder="Comment"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Send Message" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
