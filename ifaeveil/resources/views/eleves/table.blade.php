<div class="table-responsive">
    <table class="table" id="eleves-table">
        <thead>
            <tr><th></th>
                <th>Nom</th>
        <th>Prenom</th>
        <th>Classe</th>
        <th>Sexe</th>
        <th>Tel</th>
        <th>Religion</th>
        <th>Date Naissance</th>
        <th>Date Admission</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($eleves as $eleve)
            <tr>
                <td><img src="{{asset('user_images/'.$eleve->image)}}"
                    alt="prof image"
                    class="rounded-circle"
                    width="50" 
                    height="50"
                    style="border-radius:50%"/></td>
                <td>{{ $eleve->nom }}</td>
            <td>{{ $eleve->prenom }}</td>
            <td>{{ $eleve->Class->nom  }}</td>
            <td>{{ $eleve->sexe }}</td>
            <td>{{ $eleve->tel }}</td>
            <td>{{ $eleve->religion }}</td>
            <td>{{ $eleve->date_naissance }}</td>
            <td>{{ $eleve->date_admission }}</td>
                <td>
                    {!! Form::open(['route' => ['eleves.destroy', $eleve->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('eleves.show', [$eleve->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('eleves.edit', [$eleve->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
