<div class="table-responsive">
    <table class="table" id="assignations-table">
        <thead>
            <tr>
                <th>Professeur</th>
        <th>Classe</th>
                <th colspan="3">Action</th>
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
