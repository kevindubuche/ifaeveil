<div class="row">
    <div class="col-md-2">
        <img src="{{asset('book.png')}}"
        alt="prof image"
        width="130" 
        height="100"/>
    </div>
    <div class="col-md-10">
        <!-- Description Field -->
        <div class="form-group">
            <h1>{{ $lecon->nom }}</h1>
            <span>
                Description: <strong>{{ $lecon->description }}</strong>
            </span><br>
            <span>
                Ajouté le: <strong>{{ $lecon->created_at->format('d M. Y') }}</strong>
                par : <strong>{{$lecon->GetUser($lecon->creer_par)->nom}} 
                 {{$lecon->GetUser($lecon->creer_par)->prenom}}</strong>
            </span>
        </div>
    
    
    </div>
        <hr>
    </div>
    <div class="col-md-1">
    </div>
    <!-- Contenu Field -->
    <div class="col-md-10">
        {{-- {!! Form::label('contenu', 'Contenu:') !!} --}}
        {!! $lecon->contenu !!}
    </div>
    
    @if($lecon->filename)
    <div class="col-md-10">
        <hr>
    <a href="/lecon_files/{{$lecon->filename}}" target='_blank'>   
        Support document
    </a>
    <hr>
    </div>
    @endif
    @if($lecon->videoLink)
    <div class="col-md-10">
        <iframe width="100%" height="460" src="https://www.youtube.com/embed/{{$lecon->videoLink}}" frameborder="0" allowfullscreen></iframe> 
    </div>
    @endif
    