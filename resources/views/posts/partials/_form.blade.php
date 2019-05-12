<div class="form-group">

    {{ Form::hidden('user_id', Auth::id()) }}

    {{ Form::label('title', 'Title:') }}
    {{ Form::text('title', null, ['class'=> 'form-control','required'=>'', 'placeholder'=>'Enter post title']) }}
    @if($errors->has('title'))
    	<span class="has-error alert-danger">{{ $errors->first('title')}}</span>
	@endif
</div>
<div class="form-group">
    {{ Form::label('body', 'Body:') }}
    {{ Form::textarea('body', null, ['class'=> 'form-control','required'=>'']) }}
    @if($errors->has('body'))
    	<span class="has-error alert-danger">{{ $errors->first('body')}}</span>
	@endif
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{ route('posts.index') }}" class="btn btn-light">Cancel</a>


