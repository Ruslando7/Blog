@extends('personal.layouts.main')
@section('title', 'Comments')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Comments on Post</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Comments</li>
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
                    <div class="col-md-8">
                        <table class="table table-hover post">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Post</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td><a href="{{ route('post.show', $comment->post->id) }}"><img src="{{ asset('storage/' . $comment->post->preview_image) }}" alt="Preview image" width="100%" height="100%"></a></td>
                                    <td><a href="{{ route('post.show', $comment->post->id) }}">{{ $comment->post->title }}</a></td>
                                    <td><a href="{{ route('post.show', $comment->post->id) }}">{{ $comment->message }}</a></td>
                                    <td>{{ $comment->dateAsCarbon->format('h:i:s d-m-y') }}</td>
                                    <td><a href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fas fa-pen"></i></a></td>
                                    <td>
                                        <form action="{{ route('personal.comment.delete', $comment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
@endsection
