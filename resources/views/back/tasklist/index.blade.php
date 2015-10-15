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










<table class="tablesorter">
    <thead>
        <tr>
            <th>AlphaNumeric</th>
            <th>Numeric</th>
            <th>Animals</th>
            <th>Sites</th>
        </tr>
    </thead>
    <tbody>
        <tr><td>abc 123</td><td>10</td><td>Koala</td><td>http://www.google.com</td></tr>
        <tr><td>abc 1</td><td>234</td><td>Ox</td><td>http://www.yahoo.com</td></tr>
        <tr><td>abc 9</td><td>10</td><td>Girafee</td><td>http://www.facebook.com</td></tr>
        <tr><td>zyx 24</td><td>767</td><td>Bison</td><td>http://www.whitehouse.gov/</td></tr>
        <tr><td>abc 11</td><td>3</td><td>Chimp</td><td>http://www.ucla.edu/</td></tr>
        <tr><td>abc 2</td><td>56</td><td>Elephant</td><td>http://www.wikipedia.org/</td></tr>
        <tr><td>abc 9</td><td>155</td><td>Lion</td><td>http://www.nytimes.com/</td></tr>
        <tr><td>ABC 10</td><td>87</td><td>Zebra</td><td>http://www.google.com</td></tr>
        <tr><td>zyx 1</td><td>999</td><td>Koala</td><td>http://www.mit.edu/</td></tr>
        <tr><td>zyx 12</td><td>0</td><td>Llama</td><td>http://www.nasa.gov/</td></tr>
    </tbody>
</table>



   <script src="http://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>

   <script src="http://mottie.github.io/tablesorter/js/jquery.tablesorter.widgets.js"></script>


<script type="text/javascript">
   
  $('table')
    .bind('filterInit', function() {
        // check that storage ulility is loaded
        if ($.tablesorter.storage) {
            // get saved filters
            var f = $.tablesorter.storage(this, 'tablesorter-filters') || [];
            $(this).trigger('search', [f]);
        }
    })
    .bind('filterEnd', function(){
        if ($.tablesorter.storage) {
            // save current filters
            var f = $(this).find('.tablesorter-filter').map(function(){
                return $(this).val() || '';
            }).get();
            $.tablesorter.storage(this, 'tablesorter-filters', f);
        }
    });


$('table').tablesorter({

    // *** APPEARANCE ***
    // Add a theme - try 'blackice', 'blue', 'dark', 'default'
    theme: 'blue',

    // fix the column widths
    widthFixed: true,

    // include zebra and any other widgets, options:
    // 'columns', 'filter', 'stickyHeaders' & 'resizable'
    // 'uitheme' is another widget, but requires loading
    // a different skin and a jQuery UI theme.
    widgets: ['zebra', 'filter'],

    widgetOptions: {

        // zebra widget: adding zebra striping, using content and
        // default styles - the ui css removes the background
        // from default even and odd class names included for this
        // demo to allow switching themes
        // [ "even", "odd" ]
        zebra: [
            "ui-widget-content even",
            "ui-state-default odd"
            ],

        // uitheme widget: * Updated! in tablesorter v2.4 **
        // Instead of the array of icon class names, this option now
        // contains the name of the theme. Currently jQuery UI ("jui")
        // and Bootstrap ("bootstrap") themes are supported. To modify
        // the class names used, extend from the themes variable
        // look for the "$.extend($.tablesorter.themes.jui" code below
        uitheme: 'jui',

        // columns widget: change the default column class names
        // primary is the 1st column sorted, secondary is the 2nd, etc
        columns: [
            "primary",
            "secondary",
            "tertiary"
            ],

        // columns widget: If true, the class names from the columns
        // option will also be added to the table tfoot.
        columns_tfoot: true,

        // columns widget: If true, the class names from the columns
        // option will also be added to the table thead.
        columns_thead: true,

        // filter widget: If there are child rows in the table (rows with
        // class name from "cssChildRow" option) and this option is true
        // and a match is found anywhere in the child row, then it will make
        // that row visible; default is false
        filter_childRows: false,

        // filter widget: If true, a filter will be added to the top of
        // each table column.
        filter_columnFilters: true,

        // filter widget: css class applied to the table row containing the
        // filters & the inputs within that row
        filter_cssFilter: "tablesorter-filter",

        // filter widget: Customize the filter widget by adding a select
        // dropdown with content, custom options or custom filter functions
        // see http://goo.gl/HQQLW for more details
        filter_functions: null,

        // filter widget: Set this option to true to hide the filter row
        // initially. The rows is revealed by hovering over the filter
        // row or giving any filter input/select focus.
        filter_hideFilters: false,

        // filter widget: Set this option to false to keep the searches
        // case sensitive
        filter_ignoreCase: true,

        // filter widget: jQuery selector string of an element used to
        // reset the filters. 
        filter_reset: null,

        // Delay in milliseconds before the filter widget starts searching;
        // This option prevents searching for every character while typing
        // and should make searching large tables faster.
        filter_searchDelay: 300,

        // filter widget: Set this option to true to use the filter to find
        // text from the start of the column. So typing in "a" will find
        // "albert" but not "frank", both have a's; default is false
        filter_startsWith: false,

        // filter widget: If true, ALL filter searches will only use parsed
        // data. To only use parsed data in specific columns, set this option
        // to false and add class name "filter-parsed" to the header
        filter_useParsedData: false,

        // Resizable widget: If this option is set to false, resized column
        // widths will not be saved. Previous saved values will be restored
        // on page reload
        resizable: true,

        // saveSort widget: If this option is set to false, new sorts will
        // not be saved. Any previous saved sort will be restored on page
        // reload.
        saveSort: true,

        // stickyHeaders widget: css class name applied to the sticky header
        stickyHeaders: "tablesorter-stickyHeader"

    }

});
</script>









@else
@include('back.partials.secure') 
</div>
@endif
@stop