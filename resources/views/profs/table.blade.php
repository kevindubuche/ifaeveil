<div class="table-responsive">
    <table class="table" id="profs-table">
      
        <tbody>
     

            <div class="container">
                <!-- /.col -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- Application buttons -->
                        <div class="box">
                            
                            <div class="box-body">
                            
                                @foreach($profs as $prof)
                                <div class="btn  col-md-3" >
                                <a href="{{ route('profs.show', [$prof->id]) }}" target="_blank"  >
                                    <img src="{{asset('user_images/'.$prof->image)}}"
                                    alt="prof image"
                                    class="rounded-circle"
                                    width="100" 
                                    height="100"
                                    style="border-radius:50%"/>
                                    <hr>
                                 <p>    {{ $prof->nom }} {{ $prof->prenom }} </p>
                                </a>
                                @if(Auth::user()->role == 1)
                                    
                                    {!! Form::open(['route' => ['profs.destroy', $prof->id], 'method' => 'delete']) !!}
                            
                                    {{-- <a href="{{ route('profs.show', [$prof->prof_id]) }}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                                    <a href="{{ route('profs.edit', [$prof->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Confirmer?')"]) !!}
                                
                                    {!! Form::close() !!}
                                @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    
        </tbody>
    </table>
</div>
