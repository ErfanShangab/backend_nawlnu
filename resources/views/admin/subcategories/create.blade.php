@extends('admin.default')

@section('page-header')
	تصنيف جديد
@stop
@section('content')
	{!! Form::open([
			'action' => ['SubCategoryController@store'],
			'files' => true
		])
	!!}
		@include('admin.subcategories.form')
		<button type="submit" class="btn btn-primary">{{ trans('app.add_button') }}</button>
	{!! Form::close() !!}
	
@stop
