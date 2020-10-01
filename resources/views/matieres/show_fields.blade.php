<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
  
        <thead>
            <tr>
                <th></th>
        <th>Nom du cours</th>
        
        <th>Description</th>
        <th>Date de création</th>
        <th>Ajouté par</th>
        <th>Document</th>
        <th>Vidéo</th>
        @if (Auth::user()->role == 1)
            <th >Publié</th>
        @endif
        @if (Auth::user()->role != 3)
            <th >Actions</th>
        @endif
   
            </tr>
        </thead>
        <tbody>
        @foreach($lecons as $lecon)
            <tr  >
             <td>
                <a href="{{ route('lecons.show', [$lecon->id]) }}"  >
                <img   style="height:55px; width:70px;;" src="{{asset('book.png')}}" > 
                </a>
            </td>
            <td>{{ $lecon->nom }}</td>
            <td>{{ $lecon->description }}</td>
            <td>{{ $lecon->created_at->format('d M. Y') }}</td>
            <td>{{ $lecon->GetUser($lecon->creer_par)->nom }} {{ $lecon->GetUser($lecon->creer_par)->prenom }}</td>
           
            <td>
                
                @if($lecon->filename !='')
            
                <a href="/lecon_files/{{$lecon->filename}}" target='_blank'>   
                    <button  >Afficher</button>
               </a> 
                @else
               Pas de document
                @endif
            </td>
            @if( $lecon->videoLink)
            <td type="button"  data-toggle="modal" data-target="#{{ $lecon->id}}"><button class="btn btn-primary"> Regarder</button></td>
                
            @else
            <td > Pas de vidéo</td>
            @endif
            @if (Auth::user()->role == 1)
            <td >
                @if($lecon->publier == 1)
                <span class=" btn btn-success btn-sm glyphicon glyphicon-ok" ></span>
                @else
                <span class=" btn btn-danger btn-sm glyphicon glyphicon-remove" ></span>
                @endif
                 </td>
            @endif
            <td>
                {!! Form::open(['route' => ['lecons.destroy', $lecon->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('lecons.show', [$lecon->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if(Auth::user()->role != 3)
                    <a href="{{ route('lecons.edit', [$lecon->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!} 
            </td>
            {{-- @endif --}}
               
            </tr>
           <div class="modal fade" id="{{ $lecon->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">
                                  <p><code>Institution Frere Andre _ Foyer Eveil</code> I.F.A</p>
                                </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="460" src="https://www.youtube.com/embed/{{$lecon->videoLink}}" frameborder="0" allowfullscreen></iframe> 
                            </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          </div>
                     </div>
                 </div>
                </div>
        @endforeach
        </tbody>
    </table>
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