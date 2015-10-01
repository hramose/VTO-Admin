@extends('back.template')
@section('main')


<!--Breadcrumb-->

  @include('back.partials.entete', ['title' => trans('back/admin.tasklistname'), 'icone' => 'pencil', 'fil' => trans('back/admin.tasklistname')])


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>

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







<!--Loading Ajax Data-->
<script type="text/javascript">
    $(document).ready(function() {
    $('#multitable').DataTable( {
        "ajax": "{{ URL::to('tablesorter_tasklist_json') }}"
    } );
} );
</script>


<script type="text/javascript">
    $(function() {
    $('#multitable').footable();
  
    });
  </script>






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





<!--Exporter-->
<div class="btn-group">
 <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
  <ul class="dropdown-menu " role="menu">
    <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON</a></li>
    <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON (ignoreColumn)</a></li>
    <li><a href="#" onClick ="$('#multitable').tableExport({type:'json',escape:'true'});"> <img src='{{ URL::asset('plugins/tableExport/icons/json.png') }}' width='24px'> JSON (with Escape)</a></li>
    <li class="divider"></li>
    <li><a href="#" onClick ="$('#multitable').tableExport({type:'xml',escape:'false'});"> <img src='{{ URL::asset('plugins/tableExport/icons/xml.png') }}' width='24px'> XML</a></li>
    <li><a href="#" onClick ="$('#multitable').tableExport({type:'sql'});"> <img src='icons/sql.png' width='24px'> SQL</a></li>
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






  <table data-filter="#filterx" id="multitable" class="display footable table-bordered table-striped" data-filter="#filter" data-page-size="5" cellspacing="0" width="100%">


        <thead>
            <tr>
            <th data-class="expand" data-sort-initial="true">
           #ID
          </th>
          <th>
            Headline
          </th>
          <th data-hide="phone,tablet">
            Info
          </th>
          <th data-hide="phone,tablet" data-type="numeric">
            
          </th>
          <th data-hide="phone">
            
          </th>
               
            </tr>
        </thead>
 
        </tbody>
      <tfoot class="footable-pagination">
        <tr>
          <td colspan="5"><ul id="pagination" class="footable-nav" /></td>
        </tr>
      </tfoot>
    </table>   

























<!-- Main content -->



 



<!-- jQuery 2.1.4 -->

<!-- DataTables Script-->
<script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }}"></script> 
<!-- page script --> 




















<!--



<script type="text/javascript">
    $(function() {
    $('#scriptfortable').footable();
    
    //THIS IS THE WRONG WAY TO DO IT
    //$('.bind-to-me').click(function() {
    //  alert('you clicked me!');
    //});     
    
    //RATHER BIND USING ON
    $('#scriptfortable').on('click', '.bind-to-me', function() {
      alert('you clicked me!');
    });
    });
  </script>









    <table data-filter="#filterx" id="scriptfortable" class="footable" data-page-size="5">
      <thead>
        <tr>
          <th data-class="expandX" data-sort-initial="true">
            First Name
          </th>
          <th>
            Last Name
          </th>
          <th data-hide="phone,tablet">
            Job Title
          </th>
          <th data-hide="phone,tablet" data-type="numeric">
            DOB
          </th>
          <th data-hide="phone">
            Status
          </th>
        </tr>
      </thead>
      <tbody>




        <tr><td>Isidra</td><td><a target="_blank" href="http://www.google.com">Boudreaux</a></td><td>Traffic Court Referee</td><td data-value="78025368997">22 Jun 1972</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>


        <tr><td>Maria</td><td>Nicley</td><td>Meat Packager</td><td data-value="-100297281571">28 Oct 1966</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
        <tr><td>Shona</td><td>Woldt</td><td><a target="_blank" href="http://www.google.com">Airline Transport Pilot</a></td><td data-value="370961043292">3 Oct 1981</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
        <tr><td>Granville</td><td>Leonardo</td><td>Business Services Sales Representative</td><td data-value="-22133780420">19 Apr 1969</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
        <tr><td>Easer</td><td>Dragoo</td><td>Drywall Stripper</td><td data-value="250833505574">13 Dec 1977</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
        <tr><td>Maple</td><td>Halladay</td><td>Aviation Tactical Readiness Officer</td><td data-value="694116650726">30 Dec 1991</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
        <tr><td>Maxine</td><td>Woldt</td><td>Business Services Sales Representative</td><td data-value="561440464855">17 Oct 1987</td><td>
                <a href="#" class="bind-to-me">click me</a>
            </td></tr>
      </tbody>
      <tfoot class="footable-pagination">
        <tr>
          <td colspan="5"><ul id="pagination" class="footable-nav" /></td>
        </tr>
      </tfoot>
    </table>    







<!--Loading Ajax Data-->
<script type="text/javascript">
    $(document).ready(function() {
    $('#test').DataTable( {
        "ajax": "{{ URL::to('tablesorter_tasklist_json') }}"
    } );
} );


    $('.get_data').click(function() {
    $.ajax({
        url : '{{ URL::to('tablesorter_tasklist_json') }}',
        success : function(data) {
            $('table tbody').append(data).trigger('footable_redraw');
        }
    });
});



</script>

<script type="text/javascript">
    $(function() {
      $('#test').footable();
    });


    $('#test').footable({
  breakpoints: {
    mamaBear: 1200,
    babyBear: 600
  }
});
</script>





<table class="footable" id="test" data-filter="#filter">
  <thead>
    <tr>
      <th data-sort-initial="descending" data-class="expand">
        First Name
      </th>
      <th data-sort-ignore="true">
        Last Name
      </th>
      <th data-hide="phone,tablet">
        Job Title
      </th>
      <th data-hide="phone,tablet" data-type="numeric">
        DOB
      </th>
      <th data-hide="phone" data-type="numeric">
        Status
      </th>
    </tr>
  </thead>
</table>

-->






<!-- DataTables script and style-->

<link rel="stylesheet" href="{{ URL::asset('plugins/TableTools-2.2.1/css/dataTables.tableTools.css') }}">
</div>













@stop