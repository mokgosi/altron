@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add new post') }}</div>

                    <div class="card-body">
					    {!! Form::model(new App\Post, ['route' => ['posts.store'], 'id'=>'form',
					        'class'=>'form-horizontal', 'novalidate'=>'novalidate'])  !!}
					        @include('posts/partials/_form')
					    {!! Form::close() !!}
				 	</div>
			 	</div>
		 	</div>
	 	</div>
 	</div>
@endsection
