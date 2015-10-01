@extends('tasklist.layouts.tasklist')

@section('content')

<div class="well body-hight">
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Headline</th>
            <th>Info</th>
            <th>erstellt</th>
          
           
           
         

        </tr>

    </thead>

    <tbody>
        @foreach ($tasklists as $tasklist)
        <tr>
            <td>{{ $tasklist->headline }}</td>
            <td>{{ $tasklist->info }}</td>           
            <td>{{ $tasklist->updatet_at }}</td>
         
            
            <td><center><a href = "{{ URL::to('tasklist/'.$tasklist->id.'/edit') }}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Bearbeiten&nbsp;&nbsp;</a></center></td>
            <td><center><a href = "{{ action('TasklistController@delete', $tasklist->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Löschen</a></center></td>      
</tr>
</tr>
@endforeach

</tbody>

</table>
  
    </div>

@stop