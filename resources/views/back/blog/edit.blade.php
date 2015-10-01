@extends('back.blog.template')

@section('form')

	{!! Form::model($post, ['route' => ['blog.update', $post->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
   <!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#blog' ).addClass( 'active' );   
               $( '#blogcreate' ).removeClass( 'active' );   
               $( '#blogall' ).removeClass( 'active' ); 
                
   });
</script>

@stop

