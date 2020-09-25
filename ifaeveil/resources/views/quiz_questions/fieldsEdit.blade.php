<div class="row"  >
    <section class="col-lg-offset-4 col-md-offset-4   col-lg-4 col-md-4 col-sm-10 col-xs-10" >
      
    <h1>Edit Question</h1>
                      {!! Form::model($aQuestion, ['route' => ['quizQuestions.update', $aQuestion->id], 'method' => 'patch']) !!}
     {{csrf_field()}}
 
          {{-- <div class="form-group has-feedback">
               <label>Selectionner classe</label>
    <select class="form-control" name="class_id" id="" required style="border-radius: 25px">
    <option value="0" selected="true" disabled="true"> Selectionner classe</option>
      @foreach($allClasses as $class)
      <option value="{{$class->class_id}}">{{$class->class_name}}</option>
      @endforeach
  </select>
          </div> --}}

        <div class="form-group has-feedback">
             <label for="theme">Categorie :</label>
             <input type="text" class="form-control" value="{{$aQuestion->categorie}}" id="categorie" name="categorie"  placeholder="Mettre le theme" required="required" style="border-radius:50px;">
        </div>

        <div class="form-group has-feedback">
             <label for="email_user">Question :</label>
             <input type="texte" class="form-control" value="{{ $aQuestion->content}}" name="content" id="content"  required="required" style="border-radius:50px;">
        </div>

        <div id='cont_rep'>
        @foreach($reponses as $reponse)
             <div class="form-group has-feedback">
                  <label for="telephone">Bonnes Reponses :</label>
                  <input type="text" class="form-control" value="{{ $reponse->explication}}" id="explication"name="explication"   required="required" style="border-radius:50px;">
              </div>
        @endforeach
        </div>

        <div id='cont_prop'>
        @foreach($propos as $propo)
             <div class="form-group has-feedback">
                  <label for="telephone">Proposition :</label>
                  <input type="text" class="form-control" value="{{ $propo->content_prop}}" id="proposition"name="proposition"  required="required" style="border-radius:50px;">
              </div>
        
        @endforeach
        </div>


                        
       <div class="form-group has-feedback">
       <input type='hidden'  id='listPropo' name='listPropo' value='' >
       <input type='hidden'  id='listRep' name='listRep' value='' >
              <input type="hidden" name="id" value="{{$aQuestion->id}}">
             <div class="row">
             <button class='btn btn-primary' id="soumettre" type=" button" style='float:right;border-radius:50px;margin-right:20px;'>Valider</button>                   
             </div>
        </div>


       {!! Form::close() !!}
   
    </section>     
 </div>
@push('scripts')
<script>
  

    $('#soumettre').click(function(){
       console.log('soumettre');
       var listPropo=[];
              for(var i=0;i<$('#cont_prop').find('input').length;i++)
              {
               listPropo[i]=$('#cont_prop').find('input')[i].value;
                
              }             
              $('#listPropo').val(listPropo);
              console.log($('#listPropo').val());

              var listRep=[];
              for(var i=0;i<$('#cont_rep').find('input').length;i++)
              {
               listRep[i]=$('#cont_rep').find('input')[i].value;
                
              }             
              $('#listRep').val(listRep);
              console.log($('#listRep').val());
              

    });
</script>
       
@endpush