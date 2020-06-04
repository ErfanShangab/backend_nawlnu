<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'إسم العميل') !!}
		
			{!! Form::myInput('email', 'email', 'البريد الإلكتروني') !!}

			{!! Form::myInput('phone', 'phone', ' رقم الهاتف') !!}
	
			{!! Form::myInput('password', 'password', 'كلمة السر ') !!}
	
			{!! Form::myInput('password', 'password_confirmation', ' تأكيد كلمة السر') !!}
			
			{!! Form::myInput('text', 'details', ' تفاصيل أخرى  ') !!}
	
			{{ Form::hidden('role', 'customer') }}
			{{-- {!! Form::mySelect('role', 'Role', config('variables.role'), null, ['class' => 'form-control select2']) !!} --}}
	
			{{-- {!! Form::myFile('avatar', 'الصورة الشخصية') !!} --}}
	
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