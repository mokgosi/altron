@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">View Role</div>

                    <div class="card-body">
                    	<p>Role: {{ $role->name }}</p>
                        <p>Guard: {{ $role->guard_name }}</p>
                    	<a href="/" class="btn btn-sm btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                        	