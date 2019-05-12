@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">

                    <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm float-right">New Role +</a><br><br>

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
                                <th scope="col">Guard</th>
                                <th scope="col">Created</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role['name'] }}</td>
                                    <td>{{ $role['guard_name'] }}</td>
                                    <td>{{ $role['created_at'] }}</td>
                                    <td width="30%">
                                        <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm btn-success">Edit</a> 
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
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
@endsection

@section('stylesheets')
<style type="text/css">
    .bg-success, .bg-error {
        padding: 15px;
        color: rgb(255, 255, 255);;
    }
</style>
@endsection



