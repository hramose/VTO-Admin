@extends('back.template')

@section('main')


	@include('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.card')])
<div class="box box-primary">
			<div class="col-lg-12">
	<p>{{ trans('back/users.name') . ' : ' .  $user->username }}</p>
	<p>{{ trans('back/users.email') . ' : ' .  $user->email }}</p>
	<p>{{ trans('back/users.role') . ' : ' .  $user->role->title }}</p>
	<p>{{ $user->confirmed ? trans('back/users.confirmed') : trans('back/users.not-confirmed') }}</p>
	<p> <img src="{{ asset('')}}/{{ auth()->user()->imagepath }}/{{ auth()->user()->imagefilename }}" class="img-circle" alt="User Image" height="50">
                     </p>
	</div>
		</div>

		<!-- Menü -->
<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>  
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#user' ).addClass( 'active' );   
               
   });
</script>


@stop