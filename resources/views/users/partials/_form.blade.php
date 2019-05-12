<div class="form-group">
    {{ Form::label('name', 'Full Name:') }}
    {{ Form::text('name', null, ['class'=> 'form-control','required'=>'', 'placeholder'=>'Name & surnane']) }}
    @if($errors->has('name'))
    	<span class="has-error alert-danger">{{ $errors->first('name')}}</span>
	@endif
</div>
<div class="form-group">
    {{ Form::label('email', 'Email:') }}
    {{ Form::text('email', null, ['class'=> 'form-control','required'=>'', 'placeholder'=>'example@mail.com', ($user->id) ? 'readonly' : '']) }}
    @if($errors->has('email'))
    	<span class="has-error alert-danger">{{ $errors->first('email')}}</span>
	@endif
</div>
@if(!$user->id)
<div class="form-group">
    {{ Form::label('password', 'Password:') }}
    {{ Form::password('password', null, ['class'=> 'form-control','required'=>'']) }}
    @if($errors->has('password'))
    	<span class="has-error alert-danger">{{ $errors->first('password')}}</span>
	@endif
</div>
@endif
<div class="form-group">
    {{ Form::label('role', 'Role(s):') }}
    {{ Form::select('role[]', $roles, $user->roles, ['class'=> 'form-control','required'=>'', 'multiple']) }}
    @if($errors->has('role'))
    	<span class="has-error alert-danger">{{ $errors->first('role')}}</span>
	@endif
</div>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{ route('users.index') }}" class="btn btn-light">Cancel</button>


