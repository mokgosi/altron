@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit role') }}</div>

                <div class="card-body">
				    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id], 'class'=>'form-horizontal']) !!}
                        @include('roles/partials/_form')
                    {!! Form::close() !!}
 				</div>
 			</div>
 		</div>
 	</div>
@endsection