@extends('back.template')

@section('main')
<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<!-- Menü -->
<script>
$(function() {     
            $( this ).parent().find( 'li.active' ).removeClass( 'active' );
            //$( this ).addClass( 'user' );
            $( '#tasklist' ).addClass( 'active' );   
});
</script>

<!--Breadcrumb -->
@include('back.partials.entete', ['title' => trans('back/admin.tasklistname'), 'icone' => 'pencil', 'fil' => link_to('tasklist', trans('back/admin.tasklistname')) . ' / ' . trans('back/admin.tasklistakt')])


<!-- Errors
    @if($errors->any())
      <ul class="alert alert-danger"> 
         @foreach($errors->all() as $error)
                 <li>{{ $errorgross = ucfirst($error)  }}</li>
                 
         @endforeach
    </ul>
  -->
     @endif


         <!-- general form elements -->
           {!! Form::model($tasklists,['method'=>'PATCH','action'=>['TasklistController@update',$tasklists->id],'class'=>'form-signup form-paddind',  'files' => 'true']) !!}
              <div class="box box-primary">
                <!--<div class="box-header with-border">
                  <h3 class="box-title"  <ul id="navlist">
                    <li><a href = "{{ URL::to('tasklist') }}"><span class="glyphicon glyphicon-save"></span> Taskliste</a></li>
                    <li><a href = "{{ URL::to('tasklist/create') }}"><span class="glyphicon glyphicon-save"></span> Neuer Task</a></li>
                </ul></h3>
                </div>--><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                    <div class="form-group">
                     <label for="exampleInputEmail1">Headline</label>
                     
                     {!! Form::control('text', 0, 'headline',  $errors) !!} 
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Info</label>
                      {!! Form::select('info', ['Sehr dringend' => 'Sehr dringend', 'Dringend' => 'Dringend','Weniger dringend' => 'Weniger dringend', 'Nicht wichtig' => 'Nicht wichtig'], null, ['class' => 'form-control']) !!}
 
                    </div>
                   
                  

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                     {!! Form::submit(trans('back/admin.tasklist-take')) !!}
                  
                  </div>
                </form>
              </div><!-- /.box -->
 {!! Form::close() !!}
            







@stop