@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit user') }}</div>

                <div class="card-body">
				    {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id], 'class'=>'form-horizontal']) !!}
                        @include('users/partials/_form')
                    {!! Form::close() !!}
 				</div>
 			</div>
 		</div>
 	</div>
@endsection