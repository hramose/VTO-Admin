@extends('front.template')

@section('main')
<br>
	<div class="row">
		<div class="box box-primary">
			<div class="col-lg-12">
				@if(session()->has('status'))
      				@include('partials/error', ['type' => 'success', 'message' => session('status')])
				@endif
				@if(session()->has('error'))
					@include('partials/error', ['type' => 'danger', 'message' => session('error')])
				@endif	
					
				<h1 class=" "><small>{{ trans('front/password.title') }}</small></h1>
			
				<p>{{ trans('front/password.info') }}</p>		
				{!! Form::open(['url' => 'password/email', 'method' => 'post', 'role' => 'form']) !!}	

					<div class="row">
            
                  

						{!! Form::control('email', 6, 'email', $errors, trans('front/password.email')) !!}
						{!! Form::submit(trans('front/form.send'), ['col-lg-12']) !!}
						{!! Form::text('address', '', ['class' => 'hpet']) !!}	
						
					</div>

				{!! Form::close() !!}

			</div>
		</div>
	</div>
@stop