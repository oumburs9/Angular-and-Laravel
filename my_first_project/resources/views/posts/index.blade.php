@extends('layouts.app')

@section('content')
<ul>
    @foreach ($posts as $post )

    <div class="image-container">
        <img height="100px" src="{{$post->path}}" alt="image">
    </div>
        <li><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</li>
    @endforeach
</ul>


@endsection