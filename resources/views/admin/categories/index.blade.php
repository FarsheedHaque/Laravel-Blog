@extends('layouts.admin')

@section('content')

    <h1>Categories</h1>

    @if(Session::has('created_category'))

        <p>{{session('created_category')}}</p>

    @endif

    @if(Session::has('updated_category'))

        <p>{{session('updated_category')}}</p>

    @endif

    @if(Session::has('deleted_category'))

        <p>{{session('deleted_category')}}</p>

    @endif

    <div class="col-sm-6">

            {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}
    </div>

    <div class="col-sm-6">

        @if($categories)

        <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th><th>Created</th>
              </tr>
            </thead>
            <tbody>

            @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Dates'}}</td>
              </tr>

            </tbody>
          </table>

            @endforeach

        @endif

    </div>




@stop
