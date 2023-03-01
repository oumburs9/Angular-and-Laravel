@extends('layouts.app')

@section('content')
<h1>Post Edit</h1>
{!! Form::model($post,['method'=>'PATCH','action'=>['App\Http\Controllers\PostsController@update',$post->id]])!!}
    @csrf
    <div class="form-group">
        {!!Form::label('title','Title')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::submit('Update Post',['class'=>'btn btn-info'])!!}
    </div>
{!!Form::close()!!}

{!! Form::model(['method'=>'DELETE','action'=>['App\Http\Controllers\PostsController@destroy',$post->id]])!!}
    <div class="form-group">
        {!!Form::submit('Delete Post',['class'=>'btn btn-danger'])!!}
    </div>
{!!Form::close()!!}

@endsection





















{{-- @extends('layouts.app') --}}

{{-- 
 @section('content')
<h1>Post Edit</h1>
<form method="post" action="/posts/{{$post->id}}">

    @csrf
    {{ csrf_field() }} 
    <input type="hidden" name="_method" value="PUT">


    <input type="text" name='title' placeholder="Enter title" value="{{$post->title}}" >
    <input type="submit" name="submit">
    
</form>

<form method="post" action="/posts/{{$post->id}}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <input type="submit" value="DELETE">

</form>

@endsection  --}}