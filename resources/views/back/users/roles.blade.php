@extends('back.template')

@section('main')

  @include('back.partials.entete', ['title' => trans('back/roles.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/roles.roles')])
	<div class="box box-primary">
			<div class="col-lg-12">
	<div class="col-sm-12">
		@if(session()->has('ok'))
			@include('partials/error', ['type' => 'success', 'message' => session('ok')])
		@endif
		{!! Form::open(['url' => 'user/roles', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	
			@foreach ($roles as $role) 
				{!! Form::control('text', 0, $role->slug, $errors, trans('back/roles.' . $role->slug), $role->title) !!}
			@endforeach
			{!! Form::submit(trans('front/form.send')) !!}
		{!! Form::close() !!}
	</div>
</div></div>

<!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#user' ).addClass( 'active' );   
               $( '#userroles' ).addClass( 'active' );   
               $( '#usercreate' ).removeClass( 'active' ); 
              $( '#userall' ).removeClass( 'active' );     
   });
</script>
@stop