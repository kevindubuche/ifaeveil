
 <div class="col-md-12">
          
    <div class="col-md-12">
   
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class="box-header with-border">
            <h3 class="box-title">Messages</h3>
            <hr>

            @foreach ($messages as $message)
            <div class="user-block">
              
              <img class="img-circle" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
            
            <span class="username"><a href="#">{{$message->user->username}}</a></span>
            <span class="description">Publie le {{$message->created_at->format('d M. Y')}} </span>
            </div>

            <div class="box-body">
              <!-- post text -->
              <strong>{{$message->title}}</strong>
              <p>{{$message->body}}</p>

               @if ($message->created_by == Auth::user()->id  || Auth::user()->role ==1 )
               {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
               <div class='btn-group'>
                   <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                   {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn  btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
               </div>
               {!! Form::close() !!} 
              @endif


            </div>
    
           
              <hr>
            @endforeach
           
            <!-- /.user-block -->
          
            <!-- /.box-tools -->
          </div>
          </div>
</div>
</div>

{{-- <div class="table-responsive">
    <table class="table" id="messages-table">
        <thead>
            <tr>
                <th>Ajoute par</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->user->username }}</td>
            <td>{{ $message->title }}</td>
            <td>{{ $message->body }}</td>
            <td>{{ $message->created_at->format('d M. Y') }}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.show', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}
