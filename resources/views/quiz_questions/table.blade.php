<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
     
        <thead>
            <tr>
                <th>Content</th>
        <th>Categorie</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizQuestions as $quizQuestion)
            <tr>
                <td>{{ $quizQuestion->content }}</td>
            <td>{{ $quizQuestion->categorie }}</td>
                <td>
                    {!! Form::open(['route' => ['quizQuestions.destroy', $quizQuestion->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('quizQuestions.show', [$quizQuestion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('quizQuestions.edit', [$quizQuestion->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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