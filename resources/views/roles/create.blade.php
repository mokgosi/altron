@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new role') }}</div>

                <div class="card-body">
				    {!! Form::model(new App\Role, ['route' => ['roles.store'], 'id'=>'form',
				        'class'=>'form-horizontal', 'novalidate'=>'novalidate'])  !!}
				        @include('roles/partials/_form')
				    {!! Form::close() !!}
 				</div>
 			</div>
 		</div>
 	</div>
@endsection

