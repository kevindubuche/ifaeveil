<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
    
        <thead>
            <tr>
                <th>Matiere</th>
        <th>Titre</th>
        <th>Classe</th>
        <th>Ajouté par</th>
        <th>Date de création</th>
        <th>Document</th>
        @if (Auth::user()->role == 1)
        <th >Publié</th>
        @endif
        <th >Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
                <td>{{ $exam->matiere->nom }}</td>
            <td>{{ $exam->title }}</td>
            <td>{{ $exam->matiere->class->nom }}</td>
            <td>{{ $exam->creerPar->username }}</td>
            <td>{{ $exam->created_at->format('d M. Y') }}</td>
            <td>
                @if($exam->filename !='')
                <a href="{{asset('/exam_files/').'/'.$exam->filename}}" target='_blank'>   
                    <button  >Afficher</button>
                </a>
                @else
                Pas de document
                @endif
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
          
            <td>
                {!! Form::open(['route' => ['exams.destroy', $exam->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
            
                    <a href="{{ route('exams.show', [$exam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
            @if(Auth::user()->role != 3)
                     <a href="{{ route('exams.edit', [$exam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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