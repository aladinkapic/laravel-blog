@extends('template')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('posts.index') }}" > {{ __('All posts') }} </a></li>
    @if(isset($post))
        <li class="breadcrumb-item active"><a href="{{ route('posts.preview', ['id' => $post->id ]) }}" > {{ $post->title ?? '' }} </a></li>
    @else
        <li class="breadcrumb-item active"><a href="{{ route('posts.create') }}" > {{ __('Create post') }} </a></li>
    @endif
@endsection

@section('content')

    <div class="p-3 mb-2 bg-white text-dark">
        <form action="{{ route('posts.save') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Blog title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelp" placeholder="Enter post title" @if(isset($preview)) readonly @endif value="{{ $post->title ?? '' }}">
                        <small id="titleHelp" class="form-text text-muted"> {{ __('Please, insert post title here') }} </small>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Blog description</label>
                        <textarea name="description" id="description" class="form-control" rows="6" aria-describedby="descriptionHelp" maxlength="1000" @if(isset($preview)) readonly @endif>{{ $post->description ?? '' }}</textarea>
                        <small id="descriptionHelp" class="form-text text-muted"> {{ __('Please, insert post description in this area. Note, maximum number of characters is 1000!') }} </small>
                    </div>
                </div>
            </div>

            @if(!isset($preview))
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-secondary"> {{ __('Submit data') }} </button>
                    </div>
                </div>
            @endif
        </form>
    </div>

@endsection
