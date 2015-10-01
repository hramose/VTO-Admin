@extends('back.template')

@section('main')

	<!-- Entête de page -->
	@include('back.partials.entete', ['title' => trans('back/users.dashboard'), 'icone' => 'user', 'fil' => link_to('user', trans('back/users.Users')) . ' / ' . trans('back/users.edition')])
<div class="box box-primary">
			<div class="col-lg-12">
	<div class="col-sm-12">
		{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal panel']) !!}

		

			{!! Form::control('text', 0, 'username', $errors, trans('back/users.name')) !!}
			{!! Form::control('email', 0, 'email', $errors, trans('back/users.email')) !!}
			{!! Form::selection('role', $select, $user->role_id, trans('back/users.role')) !!}
			{!! Form::checkHorizontal('confirmed', trans('back/users.confirmed'), $user->confirmed) !!}
			{!! Form::submit(trans('front/form.send')) !!}			
   			 {!! Form::label(trans('back/users.chooseimgheader')) !!}
   			 <div class="form-group">
			<img src="{{ asset('')}}/{{$user->imagepath}}/{{$user->imagefilename}}" width="50" height="50">
			<div id="zone">
			<span>
    <input  type="file" accept="image/*"
            style="visibility:hidden; width: 1px;" 
            id='files' name='imagey'  
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
			

		{!! Form::hidden('imagepath_old', $user->imagepath) !!}
		{!! Form::hidden('imagefilename_old', $user->imagefilename) !!}


		{!! Form::close() !!}
	</div>

</div>
		</div>

<!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#user' ).addClass( 'active' );   
               $( '#usercreate' ).removeClass( 'active' );   
               $( '#userall' ).removeClass( 'active' ); 
              $( '#userroles' ).removeClass( 'active' );     
   });
</script>		
@stop