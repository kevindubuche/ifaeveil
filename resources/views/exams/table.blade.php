<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
    
        <thead>
            <tr>
                <th>Matiere</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Classe</th>
        <th>Ajouté par</th>
        <th>Date de création</th>
        <th>Document</th>
        @if (Auth::user()->role == 1)
        <th >Publié</th>
        @endif
        @if(Auth::user()->role != 3)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->matiere->nom }}</td>
            <td>{{ $exam->title }}</td>
            <td>{{ $exam->description }}</td>
            <td>{{ $exam->matiere->class->nom }}</td>
            <td>{{ $exam->creerPar->username }}</td>
            <td>{{ $exam->created_at->format('d M. Y') }}</td>
            <td>
                <a href="{{asset('/exam_files/').'/'.$exam->filename}}" target='_blank'>   
                        <button  >Afficher</button>
                </a>
            </td>
            @if (Auth::user()->role == 1)
            <td >
                @if($exam->publier == 1)
                <span class=" btn btn-success btn-sm glyphicon glyphicon-ok" ></span>
                @else
                <span class=" btn btn-danger btn-sm glyphicon glyphicon-remove" ></span>
                @endif
                 </td>
            @endif      
            @if(Auth::user()->role != 3)
            <td>
                {!! Form::open(['route' => ['exams.destroy', $exam->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('exams.show', [$exam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                     <a href="{{ route('exams.edit', [$exam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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