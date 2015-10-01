@extends('back.template')
@section('main')
<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script> 
<!-- Menü -->
<script>
   $(function() {     
               $( this ).parent().find( 'li.active' ).removeClass( 'active' );
               //$( this ).addClass( 'user' );
               $( '#tasklistall' ).addClass( 'active' );   
               $( '#tasklist' ).addClass( 'active' );
               $( '#tasklistadd' ).removeClass( 'active' ); 

   });
</script>

<!--Breadcrumb-->

  @include('back.partials.entete', ['title' => trans('back/admin.tasklistname'), 'icone' => 'pencil', 'fil' => trans('back/admin.tasklistname')])


   <!-- Errors-->
   @if(Session::has('flash_message'))
   <div class="alert alert-success">
      {{ $errornew =  ucfirst (Session::get('flash_message') ) }}  
   </div>
   @endif
   <!-- DataTables Styles -->
   <link rel="stylesheet" href="{{ URL::asset('https://cdn.datatables.net/1.10.9/css/dataTables.bootstrap.min.css') }}">
  
   <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/ResponsiveTables.css') }}">
   <!-- DataTables Menu Styles Header-->
   <!--[if !IE]><!-->
   <style>  
      @media
      only screen and (max-width: 760px),
      (min-device-width: 768px) and (max-device-width: 1024px)  {
      table, thead, tbody, th, td, tr {
      display: block;
      }  
      thead tr {
      position: absolute;
      top: -9999px;
      left: -9999px;
      }
      tr { border: 1px solid #ccc; }
      td {
      /* Behave  like a "row" */
      border: none;
      border-bottom: 1px solid #eee;
      position: relative;
      padding-left: 50%;
      }
      td:before {
      /* Now like a table header */
      position: absolute;
      /* Top/left values mimic padding */
      top: 6px;
      left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      }
      /*
      Label the data
      */
      td:nth-of-type(1):before { content: "#ID"; }
      td:nth-of-type(2):before { content: "Headline"; }
      td:nth-of-type(3):before { content: "Info"; }
      td:nth-of-type(4):before { content: ""; }
      td:nth-of-type(5):before { content: ""; }
      }
      /* Smartphones (portrait and landscape) ----------- */
      @media only screen
      and (min-device-width : 320px)
      and (max-device-width : 480px) {
      body {
      padding: 0;
      margin: 0;
      width: 320px; }
      }
      /* iPads (portrait and landscape) ----------- */
      @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
      body {
      width: 495px;
      }
      }
   </style>
   <!--<![endif]-->


      <div class="box box-primary box-header" >
         <!--<h3 class="box-title" <ul="" id="navlist">
         <ul id="navlist">
            <li><a href="#"><span class="glyphicon glyphicon-save"></span> Taskliste</a></li>
            <li><a href="tasklist/create"><span class="glyphicon glyphicon-save"></span> Neuer Task</a></li>
         </ul>
         </h3>
      </div>-->

    <!--Language Switch-->  
   <div style="color:white; font-size:1px">{{ $language= trans('back/admin.table-lang')  }}</div>
      <?php 
   $languagetable="/$language.json";

   if ($language==="german") {
    $print="Drucken";
    $clipboard="Zwischenspeichern";

    } else {
    $print="Print";
    $clipboard="Clipboard";
}
   ?>




      <div class="box-body">
         <table id="example1" class=" table-bordered table-striped" data-filter="#filter">
            <thead>
               <tr>
                  <th data-sort-initial="descending" data-class="expand">
                     #ID
                  </th>
                  <th data-sort-ignore="true">
                     Headline
                  </th>
                  <th data-hide="phone,tablet">
                     Info
                  </th>
                  <th data-hide="phone,tablet" data-type="numeric">
                     
                  </th>
                  <th id="targets" class="targets"></th>
               </tr>
            </thead>
            <tbody>
               </tfoot>
         </table>
      </div>
   </div>
</div>
</div>
</section>
</div>


 



<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>    
<!-- DataTables Script-->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script> 
<!-- page script --> 
<script type="text/javascript">
   $('#example1').dataTable(
   
   {

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
         
                 "sDom": 'T<"clear">lfrtip',
                 "oTableTools": {
                   "sRowSelect": "multi",
                    "sSwfPath": "{{URL::asset('plugins/TableTools-2.2.1/swf/copy_csv_xls_pdf.swf')}}",
                     "aButtons": [         
                        
                         {
                             "sExtends": "copy",
                              "mColumns":[1,2,3],
                             "bFooter": false,    
                             "sButtonText": "{!! $clipboard !!}",
                              "bSelectedOnly": true
                         },
                         {
                             "sExtends": "csv",  
                             "mColumns":[1,2,3],
                             "bFooter": false,    
         
                             "sFileName": "csv.csv",
                              "mColumns":[1,2,3],
                             "bFooter": false,    
                             "sButtonText": "CSV",
                             "bSelectedOnly": true                             
                         },                      
                         {
                             "sExtends": "pdf",
                              "sFileName": "pdf.pdf",
                             "sButtonText": "PDF",
                             "bSelectedOnly": true  
                         },
                          {
                             "sExtends": "print",
                             "sButtonText": "{!! $print !!}"
                         },
                     ]         
                 },    
                 "ajax": "{{ URL::to('tablesorter_tasklist_json') }}",        
         
                 "deferRender": true,
                 "columnDefs": [ {          
         
                 },   
          {
                    
         
                 }
         
         
                  ],
             }
   
       );   
   
</script>
<!-- DataTables script and style-->
<script src="{{ URL::asset('plugins/TableTools-2.2.1/js/dataTables.tableTools.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('plugins/TableTools-2.2.1/css/dataTables.tableTools.css') }}">
</div>

@stop