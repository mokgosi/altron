@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body">
                    	<p>Name: {{ $user->name }}</p>

                    	<p>Email: {{ $user->email }}</p>

                        <p>Role: {{ $user->getRoleNames() }}</p>

                    	<p><strong>Permissions:</strong></p>

                        @foreach($permissions as $permission)
                        {{ $permission->name }}<br>
                        @endforeach

                        <p>&nbsp;</p>

                    	<a href="{{ route('users.index') }}" class="btn btn-sm btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                        	 -