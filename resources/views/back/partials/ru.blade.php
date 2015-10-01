@extends('back.template')

@section('main')

	@include('back.partials.entete', ['title' => trans('back/admin.dashboard'), 'icone' => 'dashboard', 'fil' => trans('back/admin.dashboard')])

	<div class="row">


		@include('back/partials/pannel', ['color' => 'bg-aqua', 'icone' => 'fa fa-pencil icon-success', 'nbr' => $nbrPosts, 'name' => trans('back/admin.posts'), 'url' => 'blog', 'total' => trans('back/admin.posts')])

@if(session('statut') == 'admin' || session('statut') == 'redac')
		@include('back/partials/pannel', ['color' => 'bg-red', 'icone' => 'fa fa-fw fa-comments icon-success', 'nbr' => $nbrComments, 'name' => trans('back/admin.comments'), 'url' => 'comment', 'total' => trans('back/admin.comments')])
@endif

<!--MENÜ-->
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#rudashboard' ).addClass( 'active' );   
             
   
   });
</script>



@stop

