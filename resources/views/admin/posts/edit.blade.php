@extends('layouts.admin')

@section('content')



    <h1>Edit Post</h1>

    @if(Session::has('updated_post'))

        <p>{{session('updated_post')}}</p>

    @endif


    <div class="col-sm-3">

        <img height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

    </div>

    <div class="row">

        <div class="col-sm-9">

            {!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => 'true']) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id',null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Body', 'Description') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>

            <div>
                {!! Form::submit('Edit Post', ['class' => 'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id]]) !!}


            <div>
                {!! Form::submit('Delete Post', ['class' => 'btn btn-danger col-sm-3']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>


    <div class="row">
        @include('include.form-error')
    </div>




@stop