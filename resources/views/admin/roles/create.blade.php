@extends('admin.default')

@section('page-header')
	Roles <small>{{ trans('app.add_new_item') }}</small>
@stop

@section('content')
	{!! Form::open([
			'action' => ['RoleController@store'],
			'files' => true
		])
	!!}

		@include('admin.roles.form')

		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>

	{!! Form::close() !!}

@stop
