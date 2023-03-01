@extends('layouts.app')

@section('content')
<h1>Post create</h1>
{{-- <Form method="post" action="/posts"> --}}
{{-- {!! Form::open(['method'=>'POST','route' => 'posts.store'])!!} --}}
{{-- {!! Form::open(['method'=>'POST','url'=>'PostsController@store'])!!} --}}


{!! Form::open(['method'=>'POST','action'=>'App\Http\Controllers\PostsController@store','files'=>'true'])!!}

    @csrf
    {{-- <input type="text" name='title' placeholder="Enter title" > --}}
    <div class="form-group">
        {!!Form::label('title','Title')!!}
        {!!Form::text('title',null,['class'=>'form-control'])!!}
    </div>
    <div class="form-group">
        {!!Form::file('file',['class'=>'form-control'])!!}
    </div>
    {{-- <input type="submit" name="submit"> --}}
    <div class="form-group">
        {!!Form::submit('Create Post',['class'=>'btn btn-primary'])!!}
    </div>

{!!Form::close()!!}
    
{{-- </Form> --}}

@if(count($errors)>0)

    <div class="alert alert-denger">

        <ul>
            
            @foreach ($errors->all() as $error )
            
            <li>{{$error}}</li>
            
            @endforeach
            
        </ul>
    </div>

@endif

@endsection
