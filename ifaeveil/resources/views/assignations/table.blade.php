<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
       
        <thead>
            <tr>
                <th>Professeur</th>
        <th>Classe</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($assignations as $assignations)
            <tr>
                
            <td>{{ $assignations->InfoTeacher($assignations->prof_id)->nom }} 
                {{ $assignations->InfoTeacher($assignations->prof_id)->prenom }} </td>
              <td>{{ $assignations->InfoClass->nom }}</td>
            
                <td>
                    {!! Form::open(['route' => ['assignations.destroy', $assignations->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                       
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
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