<div class="form-group">
    {{ Form::label('name', 'Name:') }}
    {{ Form::text('name', null, ['class'=> 'form-control','required'=>'', 'placeholder'=>'Enter role name']) }}
    @if($errors->has('name'))
    	<span class="has-error alert-danger">{{ $errors->first('name')}}</span>
	@endif
</div>

<div class="form-group">
    {{ Form::label('guard_name', 'Guard Name:') }}
    {{ Form::text('guard_name', null, ['class'=> 'form-control','required'=>'', 'placeholder'=>'Enter guard name']) }}
    @if($errors->has('guard_name'))
        <span class="has-error alert-danger">{{ $errors->first('guard_name')}}</span>
    @endif
</div>

@foreach($permissions as $permission)
    <div class="form-group row">
        <div class="col-sm-6">
            <div class="form-check">
                @if(isset($role))
                {!! Form::checkbox('permissions[]', $permission->id, $role->permissions, ['class' => 'form-check-input']) !!}
                @else
                {!! Form::checkbox('permissions[]', $permission->id, false, ['class' => 'form-check-input']) !!}
                @endif
                {!! Form::label($permission->name, $permission->name) !!}
            </div>
        </div>
    </div>
@endforeach

<button type="submit" class="btn btn-primary">Submit</button>
<a href="{{ route('roles.index') }}" class="btn btn-light">Cancel</a>

