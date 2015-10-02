@extends('back.template')

@section('main')

  <br><br>
 <div class="container">

 <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
 <div class="alert alert-danger alert-dismissible">

<h4>
<i class="icon fa fa-ban"></i>
Securemode!
</h4>
{{ trans('back/admin.secure') }}

</div>

</div>

</div>

@stop

