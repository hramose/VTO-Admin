@extends('front.template')

@section('main')

<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/home') }}" style="color:#ffffff">{{ trans('front/site.title') }}</a>
        </div><!-- /.login-logo -->

   @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Fehler!</strong> Zugangsdaten sind nicht korrekt.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $errorgross = ucfirst($error)  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<a href="blog/order?name=created_at&sens=asc">test </a>

    
@if(session('statut') == 'admin')

<div class="alert alert-success  alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<h4>
<i class="icon fa fa-check"></i>
Hi {{ auth()->user()->username }}!
</h4>
{{ trans('front/login.admin') }}
</div>
@elseif(session('statut') == 'redac') 
<div class="alert alert-success  alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<h4>
<i class="icon fa fa-check"></i>
Hi {{ auth()->user()->username }}!
</h4>
{{ trans('front/login.redaction') }}
</div>

@elseif(session('statut') == 'user') 

<div class="alert alert-success  alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<h4>
<i class="icon fa fa-check"></i>
Hi {{ auth()->user()->username }}!
</h4>
{{ trans('front/login.user') }}
</div>

@elseif(session('statut') == 'guest')
<div class="alert alert-success  alert-dismissable">
<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
<h4>
<i class="icon fa fa-check"></i>
Hi {{ auth()->user()->username }}!
</h4>
{{ trans('front/login.guest') }}
</div>



@else



    <div class="login-box-body">
    <p class="login-box-msg">{{ trans('front/login.connection') }}</p>
   {!! Form::open(['url' => 'auth/login', 'method' => 'post', 'role' => 'form']) !!}	
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="E-Mail" name="log"/>  
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Passwort" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        {!! Form::check('memory', trans('front/login.remind')) !!}
                    </label>
                </div>
            </div><!-- /.col -->
            <div class="col-xs-4">

                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('front/form.send') }}</button>
           
            </div><!-- /.col -->
        </div>
        
		
    </form>

    <div class="social-auth-links text-center">
           </div><!-- /.social-auth-links -->

    <a href="{{ url('password/email') }}">{!! link_to('password/email', trans('front/login.forget')) !!}</a><br>
   <!-- <a href="{{ url('/auth/register') }}" class="text-center">Register a new membership</a>-->

</div><!-- /.login-box-body -->

</div><!-- /.login-box -->
@endif



 <!-- jQuery 2.1.4 -->
   <script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>

	<!-- Hingerund Login -->  
<script src="{{ URL::asset('plugins/backstretch/jquery.backstretch.min.js') }}"></script>  
   <script type="text/javascript">
      $.backstretch([
      	"{{URL::asset('plugins/backstretch/mozart.png')}}",
      	"{{URL::asset('plugins/backstretch/konzert.jpg')}}",          
        "{{URL::asset('plugins/backstretch/konzert2.jpg')}}",        
        "{{URL::asset('plugins/backstretch/konzert9.png')}}",  
        "{{URL::asset('plugins/backstretch/konzert10.jpg')}}",  
        
 
               
  
     
        ], {
          fade: 1000,
          duration: 7000
      });
   </script>   





@stop

