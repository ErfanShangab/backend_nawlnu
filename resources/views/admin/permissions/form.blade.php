<div class="row mB-40">
	<div class="col-sm-8">
		<div class="bgc-white p-20 bd">
			{!! Form::myInput('text', 'name', 'Perrmission Name') !!}

			 <div class='form-group'>
			 	<select class="form-control">
			 		@foreach($roles as $role)
			 		<option value="{{ $role->id }}">{{ $role->name }}</option>
			 		@endforeach
			 	</select>
			 </div>
		</div>
	</div>
</div>