@extends('admin.layouts.main')
@section('title', $post->title)
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2">{{ $post->title }}</h1>
                        <a href="{{ route('admin.post.edit', $post->id) }}"><i class="far fa-edit text-success"></i></a>
                        <form class="ml-1" action="{{ route('admin.post.delete', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $post->title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <h3>Preview Image</h3>
                        <div>
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <h3>Main Image</h3>
                        <div>
                            <img src="{{ asset('storage/' . $post->main_image) }}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Content</th>
                                        <td>{!! $post->content !!}</td>
                                    </tr>
                                    <tr>
                                        <th>Category</th>
                                        <td>{{ $post->category->title }} </td>
                                    </tr>
                                    <tr>
                                        <th>Tags</th>
                                        <td>
                                            <?php $i = 1; $postTagCount = $post->tags->count();?>
                                            @foreach($post->tags as $tag)
                                                @if($i == $postTagCount)
                                                    {{ $tag->title }}
                                                @else
                                                    {{ $tag->title . ',' }}
                                                @endif
                                                <?php $i++;?>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Likes</th>
                                        <td>{{ $post->likedUsers->count() }}</td>
                                    </tr>
                                    <tr>
                                        <th>Comments</th>
                                        <td>{{ $post->comments->count() }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <a href="{{route('admin.post.index')}}">Назад</a>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
