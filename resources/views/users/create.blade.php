@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new user') }}</div>

                <div class="card-body">
				    {!! Form::model(new App\User, ['route' => ['users.store'], 'id'=>'form',
				        'class'=>'form-horizontal', 'novalidate'=>'novalidate'])  !!}
				        @include('users/partials/_form')
				    {!! Form::close() !!}
 				</div>
 			</div>
 		</div>
 	</div>
@endsection