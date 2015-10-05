@extends('back.template')
@section('main')
<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<!-- Menü -->
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
                 $( '#tasklistadd' ).addClass( 'active' );   
                  $( '#tasklist' ).addClass( 'active' );   
                  $( '#tasklistall' ).removeClass( 'active' );   
   });
</script>
<!--Breadcrumb -->
@include('back.partials.entete', ['title' => trans('back/tasklist.tasklistname'), 'icone' => 'pencil', 'fil' => link_to('tasklist', trans('back/tasklist.tasklistname')) . ' / ' . trans('back/blog.creation')])
<!-- general form elements -->
{!! Form::open(['url'=>'tasklist','class'=>'form-signup form-paddind']) !!}
<div class="box box-primary">
   <!-- <div class="box-header with-border">
      <h3 class="box-title"  
      <ul id="navlist">
        <li><a href = "{{ URL::to('tasklist') }}"><span class="glyphicon glyphicon-save"></span> Taskliste</a></li>
        <li><a href = "{{ URL::to('tasklist/create') }}"><span class="glyphicon glyphicon-save"></span> Neuer Task</a></li>
      </ul></h3>
      </div> --><!-- /.box-header --> 
   <!-- form start -->
   <form role="form">
      <div class="box-body">
         <div class="form-group">
            <label for="exampleInputEmail1">{{(trans('back/tasklist.headline'))}}</label>
            {!! Form::control('text', 0, 'headline',  $errors) !!}                      
            <!--{!! Form::control('text', 0, 'headline',  $errors, trans('back/blog.content')) !!}-->
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">{{(trans('back/tasklist.info'))}}</label>
            {!! Form::select('info', array('Sehr dringend' => 'Sehr dringend', 'Dringend' => 'Dringend','Weniger dringend' => 'Weniger dringend', 'Nicht wichtig' => 'Nicht wichtig'), null ,array('class'=>'form-control','style'=>'' )) !!}
         </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">                     
         {!! Form::submit(trans('back/tasklist.tasklist-add')) !!}
      </div>
   </form>
</div>
<!-- /.box -->
{!! Form::close() !!}
@stop