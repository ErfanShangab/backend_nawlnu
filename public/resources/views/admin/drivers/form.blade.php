<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'إسم الكابتن') !!}
		
			{!! Form::myInput('email', 'email', 'البريد الإلكتروني') !!}

			{!! Form::myInput('phone', 'f_phone', ' رقم الهاتف   ') !!}
	
			{!! Form::myInput('phone', 's_phone', ' رقم هاتف اخر  ') !!}
			{!! Form::myInput('password', 'password', 'كلمة السر ') !!}
	
			{!! Form::myInput('password', 'password_confirmation', ' تأكيد كلمة السر') !!}

			{!! Form::myInput('text', 'nid', '   الرقم الوطني    ') !!}
			{!! Form::myInput('text', 'nid_details', '  تاريخ ومكان اصداره ') !!}

			{!! Form::myInput('vehicle_id', 'vehicle_id', ' رقم المركبة ') !!}
			


			<div class="form-group">
				{!! Form::select('is_hosted', array('true' => 'مستضاف مندوب', 'false' => 'مندوب محلي'))!!}
			</div>
			


			<div class="form-group">
	{{ Form::label("تفاصيل أخرى", null, ['class' => 'control-label']) }}
	{!! Form::textarea('details', null, [
		'class'      => 'form-control',
		'rows'       => 4, 
		'name'       => 'details',
	 
	 
	]) !!}
</div>


			{{ Form::hidden('role', 'driver') }}


			{!! Form::myFile('avatar', 'الصورة الشخصية') !!}


	
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