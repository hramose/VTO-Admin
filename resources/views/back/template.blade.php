<!DOCTYPE html>

<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
  <![endif]-->
  <!--[if IE 7]>         
  <html class="no-js lt-ie9 lt-ie8">
    <![endif]-->
    <!--[if IE 8]>         
    <html class="no-js lt-ie9">
      <![endif]-->
      <!--[if gt IE 8]><!--> 
      <html class="no-js">
        <!--<![endif]-->
        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>VTO - Admin</title>
          <meta name="description" content="">
          <meta name="viewport" content="width=device-width, initial-scale=1">
         
          <!--[if (lt IE 9) & (!IEMobile)]>
          {!! HTML::script('js/vendor/respond.min.js') !!}
          <![endif]-->
          <!--[if lt IE 9]>
          {{ HTML::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
          {{ HTML::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
          <![endif]-->
          {!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800') !!}
          {!! HTML::style('http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic') !!}
          @yield('head')
        </head>
        <body>
          <!--[if lte IE 7]>
          <p class="browsehappy">Vous utilisez un navigateur <strong>obsolète</strong>. S'il vous plaît <a href="http://browsehappy.com/">Mettez le à jour</a> pour améliorer votre navigation.</p>
          <![endif]-->
          <!DOCTYPE html>
          <html>
            <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <title>VTO Admin</title>
              <!-- Tell the browser to be responsive to screen width -->
              <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
              <!-- Bootstrap 3.3.5 -->
              <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}">
              <!-- Font Awesome -->
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
              <!-- Ionicons -->
              <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
              <!-- Theme style -->
              <link rel="stylesheet" href="{{ URL::asset('/dist/css/AdminLTE.min.css') }}">
              <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
              <link rel="stylesheet" href="{{ URL::asset('/dist/css/skins/_all-skins.min.css') }}">
              <!-- customize style -->
              <link rel="stylesheet" href="{{ URL::asset('css/customize.css') }}">
               <!-- Table style -->  
              <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/ResponsiveTables.css') }}">
              <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
              <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
              <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
            </head>
            <body class="hold-transition skin-blue sidebar-mini">
              <div class="wrapper">
                @include('back.partials.headermenu') 


                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                  <!-- sidebar: style can be found in sidebar.less -->
                  <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                        <img src="{{ asset('')}}/{{ auth()->user()->imagepath }}/{{ auth()->user()->imagefilename }}" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                        <p>{{ auth()->user()->username }}</p>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                      </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                      <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                        </span>
                      </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    

                    <ul class="sidebar-menu">
                    <li class="header">NAVIGATION</li>
                    <!-- Navigation -->
              
                      <!-- Menu de la barre latérale -->
                    @if(session('statut') == 'admin')
                    <!--DASHBOARD START--> 
                    <li >
                      <li {!! classActivePath('admin')!!}>                      
                      <a href="{!! route('admin') !!}">
                      <i class="fa fa-fw fa-dashboard"></i>
                      <span>{{ trans('back/admin.dashboard') }}</span>
                      </a>
                    </li>
                     <!--TASKLIST START--> 
                    <li class="treeview" id="tasklist">
                      <a href="#">
                      <i class="fa fa-list"></i>
                       <span>{{ trans('back/admin.tasklist-comments') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li id="tasklistall" class="active" ><a  href="{!! url('tasklist') !!}">{{ trans('back/admin.tasklistname') }}</a></li>
                        <li  id="tasklistadd" ><a href="{!! url('tasklist/create') !!}">{{ trans('back/admin.tasklist-add') }}</a></li>
                        </li>
                      </ul>
                      <!--USER START--> 
                    <li class="treeview" id="user">
                      <a href="#">
                      <i class="ion ion-person-add"></i> <span>{{ trans('back/admin.users') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li id="userall"><a href="{!! url('user') !!}">{{ trans('back/admin.see-all-user') }}</a></li>
                        <li id="usercreate"><a href="{!! url('user/create') !!}">{{ trans('back/admin.add-user') }}</a></li>
                        <li id="userroles"><a href="{!! url('user/roles') !!}">{{ trans('back/admin.edit-user') }}</a></li>
                        </li>
                      </ul>
                       <!--USER SUPPORT MESSAGES START--> 
                      <li {!! classActivePath('contact') !!}>
                      <a href="{!! url('contact') !!}">
                      <i class="fa fa-fw fa-envelope"></i> <span>{{ trans('back/admin.messages') }}</span></a>
                    </li>
                    <!--Comments START--> 
                    <li {!! classActivePath('comment') !!}>
                    <a href="{!! url('comment') !!}"><i class="fa fa-fw fa-comments"></i><span>{{ trans('back/admin.comments') }}</span></a>
                    </li> 
                    <!--MEDIAS START--> 
                     <li {!! classActivePath('medias') !!}>
                    <a href="{!! route('medias') !!}"><i class="fa fa-fw fa-file-image-o"></i> <span>{{ trans('back/admin.medias') }}</span></a>
                    </li>
                    <!--BLOG START--> 
                    <li {!! classActiveSegment(1, 'blog') !!}>
                    <li class="treeview" id="blog">
                      <a href="#">
                        <i class="fa fa-pencil"></i> <span>{{ trans('back/admin.posts') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li id="blogall"><a href="{!! url('blog') !!}">{{ trans('back/admin.see-all-news') }}</a></li>
                        <li id="blogcreate"><a href="{!! url('blog/create') !!}">{{ trans('back/admin.add-news') }}</a></li>
                      </ul>
                      <!-- /.navbar-collapse -->
                  </section>

                     @elseif(session('statut') == 'redac')

                          <!--TASKLIST START--> 
                    <li class="treeview" id="tasklist">
                      <a href="#">
                      <i class="fa fa-list"></i>
                       <span>{{ trans('back/admin.tasklist-comments') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li id="tasklistall" class="active" ><a  href="{!! url('tasklist') !!}">{{ trans('back/admin.tasklistname') }}</a></li>
                        <li  id="tasklistadd" ><a href="{!! url('tasklist/create') !!}">{{ trans('back/admin.tasklist-add') }}</a></li>
                        </li>
                      </ul>

                       <!--Comments START--> 
                    <li {!! classActivePath('comment') !!}>
                    <a href="{!! url('comment') !!}"><i class="fa fa-fw fa-comments"></i><span>{{ trans('back/admin.comments') }}</span></a>
                    </li> 
                                     
                    <li {!! classActivePath('medias') !!}>
                    <a href="{!! route('medias') !!}"><i class="fa fa-fw fa-file-image-o"></i> <span>{{ trans('back/admin.medias') }}</span></a>
                    </li>
                    <li {!! classActiveSegment(1, 'blog') !!}>
                    <li class="treeview">
                      <a href="#">
                      <i class="fa fa-fw fa-caret-down"></i> <span>{{ trans('back/admin.posts') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{!! url('blog') !!}">{{ trans('back/admin.see-all-news') }}</a></li>
                        <li><a href="{!! url('blog/create') !!}">{{ trans('back/admin.add-news') }}</a></li>
                      </ul>
                      <!-- /.navbar-collapse -->
                  </section>


                  @elseif(session('statut') == 'user')

                       <!--TASKLIST START--> 
                    <li class="treeview" id="tasklist">
                      <a href="#">
                      <i class="fa fa-list"></i>
                       <span>{{ trans('back/admin.tasklist-comments') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li id="tasklistall" class="active" ><a  href="{!! url('tasklist') !!}">{{ trans('back/admin.tasklistname') }}</a></li>
                        <!--<li  id="tasklistadd" ><a href="{!! url('tasklist/create') !!}">{{ trans('back/admin.tasklist-add') }}</a></li>-->
                        </li>
                      </ul>
                                     
                  
                    <li {!! classActiveSegment(1, 'blog') !!}>
                    <li class="treeview">
                      <a href="#">
                        <i class="fa fa-fw fa-caret-down"></i> <span>{{ trans('back/admin.posts') }}</span> <i class="fa fa-angle-left pull-right"></i>
                      </a>
                      <ul class="treeview-menu">
                        <li><a href="{!! url('blog') !!}">{{ trans('back/admin.see-all-news') }}</a></li>
                       <!-- <li><a href="{!! url('blog/create') !!}">{{ trans('back/admin.add-news') }}</a></li>-->
                      </ul>
                      <!-- /.navbar-collapse -->
                  </section>

                  @endif 
               

                  <!-- /.sidebar -->
                </aside>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                <!-- Content Header (Page header) -->
             
                <!-- Main content -->
                <div id="page-wrapper">
                <div class="container-fluid">
                @yield('main') 
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- /.page-wrapper -->
                </div>
                <!-- /.wrapper -->
           
              </div>

              @yield('scripts')
              <!-- /.content-wrapper -->
              <!-- Main Footer -->
              <footer class="main-footer">
              <!-- To the right -->
              <div class="pull-right hidden-xs">
              <a href="https://github.com/Irocode"></a>VTO <span style="color:#222T32"><b>Admin</b></span> </a>. A Laravel 5 Admin Tool.
              </div>
              <!-- Default to the left -->
              <strong>Copyright &copy; 2015 | <a target="_blank" href="http://www.viennaticketoffice.com/">viennaticketoffice.com</a> | </strong> Created by <a href="https://github.com/Irocode">Bernd Obendorfer</a> | See code at <a href="https://github.com/Irocode">Github</a>
              </footer>
              <!-- Control Sidebar -->
              <aside class="control-sidebar control-sidebar-dark">
              <!-- Create the tabs -->
              <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
              <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
              <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
              <!-- Home tab content -->
              <div class="tab-pane" id="control-sidebar-home-tab">
              <h3 class="control-sidebar-heading"> {{ auth()->user()->username }} - ({{ trans('back/admin.users') }})</h3>
              <ul class="control-sidebar-menu">
              <li>
              <a href="javascript::;">
               <img src="{{ asset('')}}/{{ auth()->user()->imagepath }}/{{ auth()->user()->imagefilename }}" class="img-circle" width="80px;" alt="User Image">
            
            
            
              
              </a>
              </li>
              
              </ul><!-- /.control-sidebar-menu -->
              </div><!-- /.tab-pane -->
              <!-- Stats tab content -->
              <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
              <!-- Settings tab content -->
              <div class="tab-pane" id="control-sidebar-settings-tab">
              <form method="post">
              <h3 class="control-sidebar-heading">{{ trans('back/settings.settings') }}</h3>
              <div class="form-group">
              <label class="control-sidebar-subheading">
              {{ trans('back/settings.language') }}:&nbsp;&nbsp;<a href="{!! url('language') !!}"><img width="17" height="17" alt="en" src="{!! asset('img/' . (session('locale') == 'de' ? 'english' : 'german') . '-flag.png') !!}"></a>
              </label>
              
            
              </form>
              </div><!-- /.tab-pane -->
              </div>
              </aside><!-- /.control-sidebar -->
              <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
              <div class="control-sidebar-bg"></div>
              </div><!-- ./wrapper -->
              <!-- jQuery 2.1.4 -->
              <!--<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>-->
              <!-- Bootstrap 3.3.5 -->
              <script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
              <!-- Slimscroll -->
              <script src="{{ asset('/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
              <!-- FastClick -->
              <script src="{{ asset('/plugins/fastclick/fastclick.min.js') }}"></script>
              <!-- AdminLTE App -->
              <script src="{{ asset('/js/app.min.js') }}"></script>
            </body>
          </html>