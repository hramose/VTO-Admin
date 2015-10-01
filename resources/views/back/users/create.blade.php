@extends('back.template')

@section('main')

<!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#user' ).addClass( 'active' );   
               $( '#usercreate' ).addClass( 'active' );   
               $( '#userall' ).removeClass( 'active' ); 
              $( '#userroles' ).removeClass( 'active' );     
   });
</script>	


 <!-- Entête de page -->
  @include('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.creation')])
	<div class="box box-primary">
			<div class="col-lg-12">
	<div class="col-sm-12">

	
		

		{!! Form::open(['url' => 'user', 'method' => 'post',  'files' => 'true', 'class' => 'form-horizontal panel']) !!}	
			{!! Form::control('text', 0, 'username', $errors, trans('back/users.name')) !!}
			{!! Form::control('email', 0, 'email', $errors, trans('back/users.email')) !!}
			{!! Form::control('password', 0, 'password', $errors, trans('back/users.password')) !!}
			{!! Form::control('password', 0, 'password_confirmation', $errors, trans('back/users.confirm-password')) !!}
			{!! Form::selection('role', $select, null, trans('back/users.role')) !!}
		


		<div class="form-group">
    {!! Form::label(trans('back/users.chooseimgheader')) !!}
    
    <div id="zone">
<span>
    <input  type="file" accept="image/*"
            style="visibility:hidden; width: 1px;" 
            id='files' name='imagex'  
            onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))"  /> <!-- Chrome security returns 'C:\fakepath\'  -->
            <input class="btn btn-u"  type="button" value="{!!trans('back/users.chooseimg')!!}" onclick="$(this).parent().find('input[type=file]').click();"/> <!-- on button click fire the file click event -->
     
   <div id="zonepicandtitle"><span  class="badge badge-important" ></span><br><output id="list"></output></div>
</span>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);
      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }
  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
</div>

     
         <br>
         <!-- Published -->

         <!--
         <input type="hidden" value="is_published">
         <div class="control-group {{ $errors->has('is_published') ? 'has-error' : '' }}">
            <div class="controls">
               <label class="checkbox">{{ Form::checkbox('is_published', 'is_published') }} Veröffentlichen ?</label>
               @if ($errors->first('is_published'))
               <span class="help-block">{{ $errors->first('is_published') }}</span>
               @endif
            </div>
         </div>
         <br>

         -->
      </div>


</div>


  <!-- Image Start -->





















	{!! Form::submit(trans('front/form.send')) !!}	
	{!! Form::close() !!}


</div>

</div>
</div>
@stop