@extends('layouts.app')

@section('content')
  
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{-- <div class="card-header">{{ __('Posts') }}</div> --}}

                    {{-- <div class="card-body"> --}}
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><a href="{{ route('post',$post['id']) }}">{{ $post['title'] }}</a></td>
                                        {{-- <td>{{ $post->user->name }}</td> --}}
                                        <td>{{ $post['created_at'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection

 
