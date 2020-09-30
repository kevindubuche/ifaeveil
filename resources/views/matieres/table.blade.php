<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
  
        <thead>
            <tr>
                <th></th>
                <th>Nom</th>
        <th>Classe</th>
        <th>Professeur</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($matieres as $matiere)
            <tr>
                <td><img src="{{asset('book.png')}}"
                    alt="livre"
                    width="50" 
                    height="50"
                   /></td>
                <td>{{ $matiere->nom }}</td>
            <td>{{ $matiere->class->nom }}</td>
            <td>{{ $matiere->prof($matiere->prof_id)->nom }} {{ $matiere->prof($matiere->prof_id)->prenom }}</td>
                <td>
                    {!! Form::open(['route' => ['matieres.destroy', $matiere->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('matieres.show', [$matiere->id]) }}" class='btn btn-primary btn-md'><i >Les cours</i></a>
                        @if(Auth::user()->role == 1)
                        <a href="{{ route('matieres.edit', [$matiere->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
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