@extends('template')

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('posts.index') }}" > {{ __('All posts') }} </a></li>
@endsection

@section('content')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul class="m-0">
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @foreach($posts as $post)
        <div class="card">
            <div class="card-header"> {{ $post->title ?? '' }} </div>
            <div class="card-body">
                <p class="card-text"> {!! nl2br($post->description ?? '') !!} </p>
                <a href=" {{ route('posts.preview', ['id' => $post->id ?? '']) }} " class="btn btn-success"> {{ __('Preview post') }} </a>
            </div>
        </div>
    @endforeach
@endsection
