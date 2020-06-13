@extends('admin.default')

@section('page-header')
	Roles <small>{{ trans('app.update_permission') }}</small>
@stop

@section('content')
	{!! Form::model($permission, [
			'action' => ['PermissionController@update', $permission->id],
			'method' => 'put',
			'files' => true
		])
	!!}

		@include('admin.permissions.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>

	{!! Form::close() !!}

@stop
