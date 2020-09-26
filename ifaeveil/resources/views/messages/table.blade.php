
 <div class="col-md-12">
          
    <div class="col-md-12">
   
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class="box-header with-border">
            <h3 class="box-title">Messages</h3>
            <hr>
            <div class=" table-responsive">
                <table id='myTable' class=' display   table table-bordered  table-condensed'>
                    <thead>
                        <tr>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
            @foreach ($messages as $message)
            <tr>  
                <td>
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
             </td>
                </tr>
            @endforeach
                   
        </tbody>
    </table>
</div>
          </div>
          </div>
</div>
</div>
@push('scripts')
<script>
    $(document).ready(function()
    {
        
        $('#myTable').DataTable({  
            // alert('okokok');
            select:true,
            "language": {
            "lengthMenu": "Voir _MENU_ lignes par page",
            "zeroRecords": "Aucune information",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat trouvé",
            "infoFiltered": "(filtre de _MAX_ total résultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Précedent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush