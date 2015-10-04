
      <header class="main-header">
        <!-- Logo -->
        <a href="../index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
         
              <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><span style="color:#ECF0F5">VTO</span> <b>Admin</b> </span>
    </a>


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list"></i>
                        <?php   $taskcountkey = Session::get('taskcountkey'); $tasklisttkey = Session::get('tasklisttkey'); ?>
                        <span class="label label-success">{{ isset($taskcountkey) ? $taskcountkey : 'taskcountkey Fehler!' }}</span>
                        
                    </a>
                    <ul class="dropdown-menu">
                    
                        <li class="header">{{ isset($taskcountkey) ? $taskcountkey : 'taskcountkey Fehler!' }} {{ trans('back/tasklist.tasklist-comments') }}

                        
                        </li>

                        <li>
                            <!-- inner menu: contains the messages -->
                            <ul class="menu">
                                <li><!-- start message -->
                             
                                    
                                        <!-- Message title and timestamp -->



                                      
      
                                        <!-- The message -->
                                 
                                 
@foreach ($tasklisttkey as $v)
<?php $testtt="$v->id"; ?>
<p>&nbsp;&nbsp; <a href="{{ URL::to('tasklist')}}/<?php echo $testtt ?>/edit">{{ $v->headline }}</a></p><hr>
@endforeach

                                </li><!-- end message -->
                            </ul><!-- /.menu -->
                        </li>
                        
                    </ul>
                </li><!-- /.messages-menu -->

  
        
              <!-- User Account: style can be found in dropdown.less --> 
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{ asset('')}}/{{ auth()->user()->imagepath }}/{{ auth()->user()->imagefilename }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ auth()->user()->username }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset('')}}/{{ auth()->user()->imagepath }}/{{ auth()->user()->imagefilename }}" class="img-circle" alt="User Image">
                    <p>
                      {{ auth()->user()->username }}
                      <small>Letzer Login: {{ Auth::user()->updated_at->format('d.m.Y (H:i:s)') }}</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                       <div class="col-xs-12 text-center">
                                <a href="#">Berechtigung: 

@if(session('statut') == 'admin')
{{trans('back/users.adminstatus')}}

@elseif (session('statut') == 'redac')
{{trans('back/users.redakstatus')}}

@elseif (session('statut') == 'user')
{{trans('back/users.userstatus')}}

@elseif (session('statut') == 'guest')
{{trans('back/users.gueststatus')}}
@endif 


                                </a>
                            </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a data-toggle="control-sidebar" href="#control-sidebar-home-tab" id="sidebarprofil" class="btn btn-default btn-flat" id="userprofileclick">{{trans('back/users.card')}}</a>
                    </div>
                    <div class="pull-right">                  

                      <a href="{!! url('auth/logout') !!}" class="btn btn-default btn-flat"> {{ trans('back/admin.logout') }}</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
