@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_user'))

     <p class="bg-danger">{{session('deleted_user')}}</p>
   @endif


    <h1> Users </h1>
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
            <td> <img height="50" src="{{ URL::to('/') }}/images/{{$user->photo ? $user->photo->file : 'not photo' }}" alt="" class=" img-rounded" /></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role_id ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active ==1 ? 'Active' :'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
{{--            <td>{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}--}}
            <td><a href="{{route('admin.users.edit', $user->id)}}"> <div class="form-group">
                        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                    </div></a></td>

            <td>{!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}</td>
        </tr>
@endforeach
    @endif
        </tbody>
    </table>
    </div>
@endsection