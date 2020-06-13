<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'إسم الموظف') !!}
		
			{!! Form::myInput('email', 'email', 'البريد الإلكتروني') !!}
	
			{!! Form::myInput('password', 'password', 'كلمة السر ') !!}
	
			{!! Form::myInput('password', 'password_confirmation', ' تأكيد كلمة السر') !!}

			{!! Form::myInput('phone', 'f_phone', ' رقم الهاتف   ') !!}
	
			{!! Form::myInput('phone', 's_phone', ' رقم هاتف اخر  ') !!}

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