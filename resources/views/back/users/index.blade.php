@extends('back.template')

@section('head')

@stop

@section('main')


  @include('back.partials.entete', ['title' => trans('back/users.dashboard') . link_to_route('user.create', trans('back/users.add'), [], ['class' => 'btn btn-info pull-right']), 'icone' => 'user', 'fil' => trans('back/users.users')])
 <!-- Menü -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#user' ).addClass( 'active' );   
               $( '#userall' ).addClass( 'active' );   
               $( '#usercreate' ).removeClass( 'active' ); 
              $( '#userroles' ).removeClass( 'active' );     
   });
</script>

  <div id="tri" class="btn-group btn-group-sm">
    <a href="#" type="button" name="total" class="btn btn-default active ">{{ trans('back/users.all') }} <span class="badge">{{  $counts['total'] }}</span></a>
    @foreach ($roles as $role)
      <a href="#" type="button" name="{!! $role->slug !!}" class="btn btn-default">{{ $role->title . 's' }} <span class="badge">{{ $counts[$role->slug] }}</span></a>
    @endforeach
  </div>
<br><br>
	@if(session()->has('ok'))
    @include('partials/error', ['type' => 'success', 'message' => session('ok')])
	@endif


    <div class="box box-primary">
      <div class="col-lg-12">



 

	<div class="table-responsive">
		<table class=" table-bordered table-striped">
			<thead>
				<tr class="blacktr">
        <th></th>
					<th>{{ trans('back/users.name') }}</th>
					<th>{{ trans('back/users.role') }}</th>
					<th>{{ trans('back/users.seen') }}</th>
					<th></th>
					<th></th>
          <th></th>
				</tr>
			</thead>
			<tbody>
			  @include('back.users.table')
      </tbody>
		</table>
	</div>

	<div class="pull-right">{!! $links !!}</div>
</div>
</div>


@stop

@section('scripts')

  <script>
    
    $(function() {

      // Seen gestion
      $(document).on('change', ':checkbox', function() {    
        $(this).parents('tr').toggleClass('warning');
        $(this).hide().parent().append('<i class="fa fa-refresh fa-spin"></i>');
        var token = $('input[name="_token"]').val();
        $.ajax({
          url: 'userseen/' + this.value,
          type: 'PUT',
          data: "seen=" + this.checked + "&_token=" + token
        })
        .done(function() {
          $('.fa-spin').remove();
          $('input[type="checkbox"]:hidden').show();
        })
        .fail(function() {
          $('.fa-spin').remove();
          var chk = $('input[type="checkbox"]:hidden');
          chk.show().prop('checked', chk.is(':checked') ? null:'checked').parents('tr').toggleClass('warning');
          alert('{{ trans('back/users.fail') }}');
        });
      });

      // Sorting gestion
      $('#tri').find('a').click(function(e) {
        e.preventDefault();
        // Wait icon
        $('.breadcrumb li').append('<span id="tempo" class="fa fa-refresh fa-spin"></span>');  
        // Buttons aspect
        $('#tri').find('a').removeClass('active');
        // Send ajax
        $.ajax({
          url: 'user/sort/' + $(this).attr('name'),
          type: 'GET',
          dataType: 'json'
        })
        .done(function(data) {
          $('tbody').html(data.view);
          $('.link').html(data.links);
          $('#tempo').remove();
        })
        .fail(function() {
          alert('{{ trans('back/users.fail') }}');
        });        
      });

    });

  </script>

@stop