@extends('admin.default')

@section('page-header')
	Roles <small>{{ trans('app.update_role') }}</small>
@stop

@section('content')
	{!! Form::model($role, [
			'action' => ['RoleController@update', $role->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.roles.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
