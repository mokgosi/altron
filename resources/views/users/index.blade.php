@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">Add user +</a><br><br>

                        @if(Session::has('success'))
                            <p class="bg-success">{{ session('success') }}</p>
                        @endif

                        @if(Session::has('error'))
                            <p class="bg-error">{{ session('error') }}</p>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['email'] }}</td>
                                        <td>{{ $user->getRoleNames()->join(',') }}</td>
                                        <td width="30%">
                                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-sm btn-primary">View</a> 
                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-success pull-left">Edit</a> 
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'style'=>'display:inline' ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('stylesheets')
<style type="text/css">
    .bg-success, .bg-error {
        padding: 15px;
        color: rgb(255, 255, 255);;
    }
</style>
@endsection

