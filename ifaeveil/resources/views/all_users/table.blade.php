<div class="table-responsive">
    <table class="table" id="allUsers-table">
        <thead>
            <tr>
                <th>Nom d'utilisateur</th>
        <th>Role</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($allUsers as $allUser)
            <tr>
                <td>{{ $allUser->username }}</td>
            <td>
                @switch($allUser->role)
                @case(1)
                    <h5>Administrateur</h5>
                    @break
                @case(2)
                     <h5>Professeur</h5>
                    @break
                    @case(3)
                    <h5>Élève</h5>
                   @break
                   <h5>Élève</h5>
                @default
                    
            @endswitch
            </td>
                <td>
                    {!! Form::open(['route' => ['allUsers.destroy', $allUser->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('allUsers.edit', [$allUser->id]) }}" class='btn btn-primary btn-xs'><i >Changer</i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
