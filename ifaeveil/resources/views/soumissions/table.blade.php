<div class="table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
            <th>Examen</th>
        <th>Commentaire</th>
        <th>Date de création</th>
        <th>Document</th>
        <th>Ajouté par</th>
        @if(Auth::user()->role== 1)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($soumissions as $soumission)
        {{-- si se elev --}}
     
                <tr>
                    <td>{{ $soumission->exam->title }}</td>
                <td>{{ $soumission->description }}</td> 
                <td>{{ $soumission->created_at->format('D. m Y') }}</td>
                <td>
                    <a href="/soumission_files/{{$soumission->filename}}" target='_blank'>   
                            <button  >Afficher</button>
                    </a>
                </td>
                <td>{{ $soumission->eleve($soumission->eleve_id)->nom }} {{ $soumission->eleve($soumission->eleve_id)->prenom }}</td>
                @if(Auth::user()->role == 1)   
                <td>
                        {!! Form::open(['route' => ['soumissions.destroy', $soumission->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                           {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                    @endif
                </tr>
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
            "infoFiltered": "(filtre de _MAX_ total resultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Précédent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush