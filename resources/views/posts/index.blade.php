@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    <div class="card-body">

                        <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm float-right">New Post +</a><br><br>

                        @if(Session::has('success'))
                            <p class="bg-success">{{ session('success') }}</p>
                        @endif

                         @if(Session::has('error'))
                            <p class="bg-error">{{ session('error') }}</p>
                        @endif
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post['title'] }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post['created_at'] }}</td>
                                        <td width="30%">
                                            <a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-primary">View</a> 
                                            @if(Auth::id() === $post->user->id)
                                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            @endif
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
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
    </div>
@endsection

@section('stylesheets')
<style type="text/css">
    .bg-success, .bg-error {
        padding: 15px;
        color: rgb(255, 255, 255);;
    }
    .btn {
        margin-right: 15px;
    }
    .btn-warning {
        color: #fff !important;
    }
</style>
@endsection



