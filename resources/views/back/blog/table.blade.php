          @foreach ($posts as $post)
            <tr {!! !$post->seen && session('statut') == 'admin'? 'class="warning"' : '' !!}>
              <td class="text-primary"><strong>{{ $post->title }}</strong></td>
                  @if(session('statut') == 'admin' || session('statut') == 'redac' )  
              <td>{{ $post->created_at }}</td> 
              <td>{!! Form::checkbox('active', $post->id, $post->active) !!}</td>
                          
                <td>{{ $post->username }}</td>
                <td>{!! Form::checkbox('seen', $post->id, $post->seen) !!}</td>
              @endif
              <td>{!! link_to('blog/' . $post->slug, trans('back/blog.see'), ['class' => 'btn btn-success btn-block btn']) !!}</td>
               @if(session('statut') == 'admin' || session('statut') == 'redac' )  
              <td>{!! link_to_route('blog.edit', trans('back/blog.edit'), [$post->id], ['class' => 'btn btn-warning btn-block']) !!}</td>
              <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['blog.destroy', $post->id]]) !!}
                {!! Form::destroy(trans('back/blog.destroy'), trans('back/blog.destroy-warning')) !!}
                    @endif
              {!! Form::close() !!}
              </td>
            </tr>
          @endforeach