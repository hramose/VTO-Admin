{
  "data": [   
@foreach ($tasklists as $index => $tasklist)
[ 
   "{{{ $tasklist->id }}}",
   "{{{ $tasklist->headline }}}",
"{{{ $tasklist->info }}}",
"<div style=\"text-align: center\"><a class=\"btn btn-primary btn-sm\" href=\" {{ URL::to('tasklist/'.$tasklist->id.'/edit') }}  \"><i class=\"fa fa-edit\"></i> {{$language= trans('back/tasklist.edit')}} </a></div> ",

   "<div style=\"text-align: center\"><a  class=\"btn btn-danger btn-sm disabled\" ><i class=\"fa fa-remove\"></i> {{$language= trans('back/tasklist.destroy')}} </a></div>"
@if ($index == -1)
@elseif ($index+1 == count($tasklists))
  ] ]}
  @else
  ], 
@endif
@endforeach