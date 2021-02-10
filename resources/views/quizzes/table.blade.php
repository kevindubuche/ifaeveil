<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        
        <thead>
            <tr>
                <th>Titre</th>
        <th>Classe</th>
        {{-- <th>Nombre de questions</th>
        <th>Duree</th>
        <th>Categorie</th>
        <th>Date (minutes)</th> --}}
        <th >Date</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quizzes as $quiz)
            <tr>
                <td>{{ $quiz->titre }}</td>
            <td>{{ $quiz->class->nom}}</td>
            {{-- <td>{{ $quiz->nombre_questions }}</td>
            <td>{{ $quiz->duree }}</td>
            <td>{{ $quiz->categorie }}</td> --}}
            <td>{{ $quiz->created_at->format('d  M. Y')}}</td>
                <td>
                    {!! Form::open(['route' => ['quizzes.destroy', $quiz->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{$quiz->lien}}" class='btn btn-primary btn-xs'>Lancer</a>
                   
                        @if(Auth::user()->role == 1)
                        <a href="{{ route('quizzes.edit', [$quiz->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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