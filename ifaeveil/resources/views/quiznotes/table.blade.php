<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
       
        <thead>
            <tr>
                <th>Eleve</th>
                <th>Classe</th>
        <th>Quiz</th>
        <th>Score</th>
        <th>Date</th>
        @if(Auth::user()->role == 1)
                <th >Action</th>
         @endif
            </tr>
        </thead>
        <tbody>
        @foreach($quiznotes as $quiznote)
            <tr>
                <td>{{ $quiznote->eleve($quiznote->id_eleve)->nom }} {{ $quiznote->eleve($quiznote->id_eleve)->prenom }}</td>
            <td>{{ $quiznote->eleve($quiznote->id_eleve)->class->nom  }}</td>
            <td>{{ $quiznote->quiz->titre }}</td>
            <td>{{ $quiznote->score }} %</td>
            <td>{{ $quiznote->created_at->format('d M. Y H:m:s') }}</td>
            @if(Auth::user()->role == 1)
                <td>
                    {!! Form::open(['route' => ['quiznotes.destroy', $quiznote->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                       {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
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