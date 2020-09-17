@extends('layouts.admin')


@section('content')



    <h1>Users</h1>

    @if(Session::has('created_user'))

        <p>{{session('created_user')}}</p>

    @endif

    @if(Session::has('deleted_user'))

        <p>{{session('deleted_user')}}</p>

    @endif

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>Status</th>
              <th>Created</th>
              <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">
                            <img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"
                                 alt="" class="img-responsive img-rounded"></a></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td><td>{{$user->role ? $user->role->name : 'user has no role'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>

            @endforeach

        @endif

        </tbody>
      </table>


@stop