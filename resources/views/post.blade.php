@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                    	<p>Author: {{ $post->user->name }}</p>

                    	<p>{{ $post->body }}</p>

                    	<p>{{ $post->created_at }}</p>

                    	<a href="/" class="btn btn-sm btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                        	