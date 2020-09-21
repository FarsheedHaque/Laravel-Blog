@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    @if(Session::has('deleted_photo'))
        <p>{{session('deleted_photo')}}</p>
    @endif

    @if($photos)

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created</th>
          </tr>
        </thead>

        @foreach($photos as $photo)

            <tbody>
              <tr>
                <td>{{$photo->id}}</td>
                <td><img height="100" src="{{$photo->file}}" alt=""></td>
                <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
                  <td>
                          {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}

                              <div>
                                  {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                              </div>

                              {!! Form::close() !!}
                  </td>
              </tr>

            </tbody>

        @endforeach

      </table>

    @endif

@stop