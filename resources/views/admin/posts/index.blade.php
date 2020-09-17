@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>

    @if(Session::has('created_post'))

        <p>{{session('created_post')}}</p>

    @endif



    <table class="table">
        <thead>
          <tr>
              <th>Id</th>
              <th>Photo</th>
              <th>Owner</th>
              <th>Category</th>
              <th>Title</th>
              <th>Body</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)
          <tr>
              <td>{{$post->id}}</td>
              <td><a href="{{route('admin.posts.edit', $post->id)}}">
                      <img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"
                           alt="" class="img-responsive img-rounded"></a></td>
              <td>{{$post->user->name}}</td>
              <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
              <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
              <td>{{$post->body}}</td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>

            @endforeach

        @endif

        </tbody>
      </table>



@stop