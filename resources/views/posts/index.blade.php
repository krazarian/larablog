@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-10">
                @foreach($posts as $post)
                    <a href="/posts/{{ $post->id }}"><h2>{{ $post->title }}</h2></a>
                    <p>{!!  $post->body !!}</p>
                    <hr>
                @endforeach
            </div>
        </div>

        <div class="flash alert alert-{{ session('class') }} alert-dismissible" role="alert">
            {{ session('flash') }}
        </div>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection