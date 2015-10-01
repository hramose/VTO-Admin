@extends('back.blog.template')

@section('form')
	{!! Form::open(['url' => 'blog', 'method' => 'post', 'class' => 'form-horizontal panel']) !!}	


   <!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#blog' ).addClass( 'active' );   
               $( '#blogcreate' ).addClass( 'active' );   
               $( '#blogall' ).removeClass( 'active' ); 
                
   });
</script>

@stop



