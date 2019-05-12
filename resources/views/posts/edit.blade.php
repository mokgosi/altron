@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit post') }}</div>

                    <div class="card-body">
					    {!! Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', $post->id], 'class'=>'form-horizontal']) !!}	
					        @include('posts/partials/_form')
					    {!! Form::close() !!}
				 	</div>
			 	</div>
		 	</div>
	 	</div>
 	</div>
@endsection
