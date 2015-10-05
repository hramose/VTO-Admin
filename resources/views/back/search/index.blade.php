@extends('back.template')

@section('main')
<br>
  

    <div class="row">

        @foreach($posts as $post)
         <div class="col-lg-12 text-left">
<h2>{{ trans('back/blog.dashboard') }}</h2>
 </div>
                <div class="col-lg-12 text-center">
                <div class="box box-primary textcontent">
                    <h2>{{ $post->title }}                   
                    <small>{{ $post->user->username }} {{ trans('front/blog.on') }} {!! $post->created_at . ($post->created_at != $post->updated_at ? trans('front/blog.updated') . $post->updated_at : '') !!}</small>
                    </h2>
               
            
                    <p>{!! $post->summary !!}</p>
                </div> 
                <div class="col-lg-12 text-center ">
                    {!! link_to('blog/' . $post->slug, trans('front/blog.button'), ['class' => 'btn btn-default btn-lg']) !!}
                    <hr>
                </div>
          </div>
        @endforeach
     




 @foreach($tasks as $task)
   <div class="col-lg-12 text-left">
<h2>{{ trans('back/tasklist.tasklist-comments') }}</h2>
 </div>
                <div class="col-lg-12 text-center">
                <div class="box box-primary textcontent">
     <h2>{{ $task->headline }}                   
                   
                    </h2>
               
            
                    <p>{!! $task->info !!}</p>
                </div> 
                <div class="col-lg-12 text-center ">
                   
                    <hr>
                </div>
          </div>

        @endforeach







        <div class="col-lg-12 text-center">
            {!! $links !!}
        </div>
  
    </div>

@stop

