@extends('front.template')

@section('main')
<br>
    <div class="row">

        <div class="col-lg-12">
            {!! Form::open(['url' => 'blog/search', 'method' => 'get', 'role' => 'form', 'class' => 'pull-right']) !!}  
                {!! Form::control('text', 12, 'search', $errors, null, null, null, trans('front/blog.search')) !!}
            {!! Form::close() !!}
        </div>

    </div>

    <div class="row">

        @foreach($posts as $post)

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
     
        <div class="col-lg-12 text-center">
            {!! $links !!}
        </div>
  
    </div>

@stop

