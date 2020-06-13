@extends('admin.default')

@section('page-header')
	تعديل بيانات موظف 
@stop
{{-- <small>{{ trans('app.update_item') }}</small> --}}
@section('content')
	{!! Form::model($item, [
			'action' => ['EmployeeController@update', $item->id],
			'method' => 'put', 
			'files' => true
		])
	!!}

<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">

			<div class="form-group form-md-line-input">
				<label for="name">إسم الموظف</label>
				<input class="form-control" name="name" id="name" type="text" required="true" value="{{$item->User->name}}">
			</div>
			
		
			<div class="form-group form-md-line-input">
				<label for="phone">رقم الهاتف </label>
				<input class="form-control" name="f_phone" id="f_phone" type="f_phone"  value="{{$item->User->f_phone}}">
			</div>

			<div class="form-group form-md-line-input">
				<label for="phone">رقم اخر </label>
				<input class="form-control" name="s_phone" id="s_phone" type="s_phone"  value="{{$item->User->s_phone}}">
			</div>

			<div class="form-group form-md-line-input">
				<label for="email">البريد الإلكتروني </label>
				<input class="form-control" name="email" id="email" type="email"  value="{{$item->User->email}}">
			</div>
				   

	
		 

			{!! Form::myInput('text', 'nid', '   الرقم الوطني    ') !!}
	
			{!! Form::myInput('text', 'nid_details', '  تاريخ ومكان اصداره ') !!}

<div class="form-group">
	{{ Form::label("تفاصيل العميل", null, ['class' => 'control-label']) }}
	{!! Form::textarea('details', null, [
		'class'      => 'form-control',
		'rows'       => 4, 
		'name'       => 'details',
	 
	 
	]) !!}
</div>

 

			{{ Form::hidden('role', 'employee') }}
			{{-- {!! Form::mySelect('role', 'Role', config('variables.role'), null, ['class' => 'form-control select2']) !!} --}}
	
			{!! Form::myFile('avatar', 'الصورة الشخصية') !!}
	
			{{-- {!! Form::myTextArea('bio', 'Bio') !!} --}}
		</div>  
	</div>
	@if (isset($item) && $item->avatar)
		<div class="col-sm-4">
			<div class="bgc-white p-20 bd">
				<img src="{{ $item->avatar }}" alt="">
			</div>
		</div>
	@endif
</div>

		<button type="submit" class="btn btn-primary">{{ trans('app.edit_button') }}</button>
		
	{!! Form::close() !!}
	
@stop
