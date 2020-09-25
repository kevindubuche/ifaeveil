<div class="table-responsive">
    <table class="table" id="exams-table">
        <thead>
            <tr>
                <th>Matiere</th>
        <th>Titre</th>
        <th>Description</th>
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
            <td>{{ $exam->creerPar->username }}</td>
            <td>{{ $exam->created_at->format('d M. Y') }}</td>
            <td>
                <a href="/exam_files/{{$exam->filename}}" target='_blank'>   
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
