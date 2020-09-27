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
<hr>
     <div  id='cont_bonneRep'>
        @foreach($reponses as $reponse)
             <div class="form-group has-feedback">
                  <label for="telephone">Bonnes Reponses :</label>
                  <input type="text" class="form-control" value="{{ $reponse->explication}}" id="explication"name="explication"   required="required" style="border-radius:50px;">
              </div>
        @endforeach
        </div>
        <div class="row">
          <label >Ajouter d'autres bonnes reponses:</label>
          <button class='btn btn-primary' type="button" id='ajout_rep'style='border-radius:50px;' >+</button>  
          <a id="remRep"class=" btn btn-danger"  type="button" style='border-radius:50px;' >-</a>                 
         
      </div>
     

       <hr>
       <div id='cont_prop'>
        @foreach($propos as $propo)
             <div class="form-group has-feedback">
                  <label for="telephone">Proposition :</label>
                  <input type="text" class="form-control" value="{{ $propo->content_prop}}" id="proposition"name="proposition"  required="required" style="border-radius:50px;">
              </div>
        
        @endforeach
     </div>
        <div class="row">
          <label >Ajouter plus de propositions de reponse:</label>
          <button class='btn btn-primary' type="button" id='ajout_prop'style='border-radius:50px;' >+</button>  
          <a id="rem"class=" btn btn-danger"  type="button" style='border-radius:50px;' >-</a>                 
         
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
     
    var text='<div class="form-group has-feedback">';
           text+=' <label >Proposition :</label>';
          text+='<input type="text" class="form-control"  id="propositionB"name="propositionB"  required="required" style="border-radius:50px;">';
                  text+='</div>';
   $("#ajout_prop").click(function(){

    $("#cont_prop").append($(text));
});

$('#rem').click(function(){
     if($('#cont_prop').find('input').length > 2){
    $("#cont_prop").find('div').last().remove();
     }

});


var text2='<div class="form-group has-feedback">';
           text2+=' <label >Reponse :</label>';
          text2+='      <input type="text"  class="form-control"  id="explication" name="explication" placeholder="Expliquer la reponse" required="required" style="border-radius:50px;"> ';
                  text2+='</div>';
   $("#ajout_rep").click(function(){

    $("#cont_bonneRep").append($(text2));
});

$('#remRep').click(function(){
     if($('#cont_bonneRep').find('input').length > 1){
    $("#cont_bonneRep").find('div').last().remove();
     }

});

$('#soumettre').click(function(){
 console.log('soumettre');
 var listPropo=[];
         var j=0;
        for(var i=0;i<$('#cont_prop').find('input').length;i++)
        {
         listPropo[i]=$('#cont_prop').find('input')[i].value;
       j++;
          
        }

     //    listPropo[j]=($('#propositionA').val());
     //    listPropo[j+1]=($('#propositionB').val());              
        $('#listPropo').val(listPropo);
        console.log($('#listPropo').val());

        var listBonnesReponses=[];
         var j=0;
        for(var i=0;i<$('#cont_bonneRep').find('input').length;i++)
        {
         listBonnesReponses[i]=$('#cont_bonneRep').find('input')[i].value;
       j++;
          
        }

     //    listBonnesReponses[j]=($('#explication').val());            
        $('#listRep').val(listBonnesReponses);
        console.log($('#listRep').val());
        

});
</script>

    
@endpush