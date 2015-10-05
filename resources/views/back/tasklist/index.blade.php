@extends('back.template')
@section('main')
<!--permissions admin oder redac-->
@if(session('statut') == 'admin' || session('statut') == 'redac' ||  session('statut') == 'user')
<!--Breadcrumb-->
@include('back.partials.entete', ['title' => trans('back/tasklist.tasklistname'), 'icone' => 'pencil', 'fil' => trans('back/tasklist.tasklistname')])
<!--MENÜ-->
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#tasklistall' ).addClass( 'active' );   
               $( '#tasklist' ).addClass( 'active' );
               $( '#tasklistadd' ).removeClass( 'active' ); 
   
   });
</script>
<!-- Errors-->
@if(Session::has('flash_message'))
<div class="alert alert-success">
   {{ $errornew =  ucfirst (Session::get('flash_message') ) }}  
</div>
@endif
<!-- DataTables Script-->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script> 
<link rel="stylesheet" href="{{ URL::asset('https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css') }}">
<!--EXPORT TABLE SCRIPTS-->
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/jquery.base64.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/html2canvas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/jspdf/libs/sprintf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/jspdf/jspdf.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/tableExport/jspdf/libs/base64.js') }}"></script>
<!--Footable TABLE SCRIPTS-->
<link href="{{ URL::asset('plugins/FooTable-master/css/footable-0.1.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/FooTable-master/css/footable.sortable-0.1.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('plugins/FooTable-master/css/footable.paginate.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('plugins/FooTable-master/js/footable.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('plugins/FooTable-master/js/footable.sortable.js') }}" type="text/javascript"></script> 
<!--Language Switch-->  
<div style="color:white; font-size:1px">{{ $language= trans('back/admin.table-lang')  }}</div>
<?php 
   $languagetable="/$language.json";   
   
   ?>
<!--Table Data Switch-->
@if(session('statut') == 'admin')
<?php $tablesorter_status="tablesorter_tasklist_json";?>
@elseif(session('statut') == 'redac')
<?php $tablesorter_status="tablesorter_tasklist_json";?>
@elseif(session('statut') == 'user')
<?php $tablesorter_status="tablesorter_tasklist_json_disabled";?>
@elseif(session('statut') == 'guest')
@endif 
<!--Loading Ajax Data-->
<script type="text/javascript">
   $(document).ready(function() {
      $('#multitable').DataTable( {
   
         "bSortable" : false,
    "aTargets" : [ "no-sort" ],
   
        "aoColumnDefs" : [ {
            'bSortable' : false,
            'aTargets' : [ 4,3 ]
        } ],
         "order": [[ 0, "desc" ]],
   
     "language": {
    "url": "{{URL::asset('plugins/TableTools-2.2.1/media') }}/{!! $languagetable !!}"
   }, 
   
     "ajax": "{{ URL::to($tablesorter_status) }}"
   } );
   } );
</script>
<script type="text/javascript">
   $(function() {
   $('#multitable').footable();
   
   });
</script>
<!--Exporter-->
<div class="btn-group">
   <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> {{ trans('back/tasklist.export') }}</button>
   <ul class="dropdown-menu " role="menu">
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON (ignoreColumn)</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'true'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON (with Escape)</a></li>
      <li class="divider"></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'xml',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/xml.png') }}' width='24px'> XML</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'sql'});"> <img src='{{ URL::asset('plugins/tableExport/icons/sql.png') }}' width='24px'> SQL</a></li>
      <li class="divider"></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'csv',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/csv.png') }}' width='24px'> CSV</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'txt',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/txt.png') }}' width='24px'> TXT</a></li>
      <li class="divider"></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'excel',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/xls.png') }}' width='24px'> XLS</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'doc',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/word.png') }}' width='24px'> Word</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'powerpoint',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/ppt.png') }}' width='24px'> PowerPoint</a></li>
      <li class="divider"></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'png',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/png.png') }}' width='24px'> PNG</a></li>
      <li><a href="#" onClick ="$('#multitable').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/pdf.png') }}' width='24px'> PDF</a></li>
   </ul>
</div>
<div class="box box-primary">
   <div class="col-lg-12">
      <br>
      <table data-filter="#filterx" id="multitable" class="display footable table-bordered table-striped" data-filter="#filter" data-page-size="5" cellspacing="0" width="100%">
         <thead>
            <tr>
               <th data-hide="phone,tablet" data-class="expandX" data-sort-initial="true">
                  #ID
               </th>
               <th>
                  {{ trans('back/tasklist.headline') }}
               </th>
               <th data-hide="phone,tablet">
                  {{ trans('back/tasklist.info') }}
               </th>
               <th  data-type="numeric">
               </th>
               <th id="vh">
               </th>
            </tr>
         </thead>
         </tbody>
         <tfoot class="footable-pagination">
            <tr>
               <td colspan="5">
                  <ul id="pagination" class="footable-nav" />
               </td>
            </tr>
         </tfoot>
      </table>
   </div>
</div>
<!-- Main content -->
<!-- page script --> 
<!-- DataTables script and style-->
</div>
@else
@include('back.partials.secure') 
</div>
@endif
@stop