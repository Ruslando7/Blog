@extends('admin.layouts.main')
@section('title', 'Post Update')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Post Update</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit post</li>
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
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label>Post</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter tag"
                                       value="{{ $post->title }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                @error('content')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Main Image</label>
                                <div class="mb-3">
                                    @if(isset($post->main_image))
                                        <img src="{{ asset('storage/' . $post->main_image) }}" width="30%" height="30%"
                                             alt="main_image">
                                    @else
                                        <p class="text-danger">Main image not found</p>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="main_image" type="file" class="custom-file-input"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Preview Image</label>
                                <div class="mb-3">
                                    @if(isset($post->preview_image))
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" width="30%"
                                             height="30%" alt="preview_image">
                                    @else
                                        <p class="text-danger">Preview image not found</p>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_image" type="file" class="custom-file-input"
                                               id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            {{$category->id == $post->category_id ? ' selected' : ''}} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group w-50" data-select2-id="71">
                                <label>Tags</label>
                                <select name="tag_ids[]" class="select2 select2-hidden-accessible" multiple=""
                                        data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="7"
                                        tabindex="-1" aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option
                                            {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                    @error('tag_ids')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
