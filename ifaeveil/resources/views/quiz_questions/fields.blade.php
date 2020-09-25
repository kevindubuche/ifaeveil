
<div class="row">
       

    <div class="col-lg-offset-1 col-md-offset-1  col-lg-7 col-md-7 col-sm-12 col-xs-12 jumbotron" >
       <h3>Ajouter une question aux quiz</h3>
    <form action="{{url('quizQuestions.store')}}" method="POST">
          @csrf<!-- {{csrf_field()}} -->

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
                    <label for="nom_user">Categorie :</label>
                    <input type="text" class="form-control"  id="categorie"name="categorie"  placeholder="Mettre la categorie" required="required" style="border-radius:50px;">
               </div>

               <div class="form-group has-feedback">
                    <label for="email_user">Question :</label>
                    <input type="text" class="form-control" name="content" id="content" placeholder="Entrer la question" required="required" style="border-radius:50px;">
               </div>

              

               <div class="form-group has-feedback">
                    <label >Proposition A :</label>
                    <input type="text" class="form-control"  id="propositionA"name="propositionA"   required="required" style="border-radius:50px;">
              </div>
               <div class="form-group has-feedback">
                    <label >Proposition B :</label>
                    <input type="text" class="form-control"  id="propositionB"name="propositionB"   required="required" style="border-radius:50px;">
              </div>
              <div  id='cont_prop'>
              
              </div >
                   
                 <div class="row">
                 <label >Ajouter plus de propositions de reponse:</label>
                 <button class='btn btn-primary' type="button" id='ajout_prop'style='border-radius:50px;' >+</button>  
                 <a id="rem"class=" btn btn-danger"  type="button" style='border-radius:50px;' >-</a>                 
                
             </div>
              

               <div class="form-group has-feedback">
                    <label >Reponse :</label>
                    <input type="text"  class="form-control"  id="explication" name="explication" placeholder="Expliquer la reponse" required="required" style="border-radius:50px;">  
               </div>

               <div  id='cont_bonneRep'>
              
              </div >
                   
                 <div class="row">
                 <label >Ajouter d'autres bonnes reponses:</label>
                 <button class='btn btn-primary' type="button" id='ajout_rep'style='border-radius:50px;' >+</button>  
                 <a id="remRep"class=" btn btn-danger"  type="button" style='border-radius:50px;' >-</a>                 
                
             </div>
               
               <div class="form-group has-feedback">
                 <input type='hidden'  id='listPropo' name='listPropo' value='' >
                 <input type='hidden'  id='listRep' name='listRep' value='' >
               </div>

               

             
              <div class="form-group has-feedback">            
                 <div class="row">
                 <button class='btn btn-primary' id='soumettre'type=" button" style='border-radius:50px;'>Soumettre</button>                   
                </div>
             </div>

         </form>

   </div>
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
    $("#cont_prop").find('div').last().remove();

});


var text2='<div class="form-group has-feedback">';
           text2+=' <label >Reponse :</label>';
          text2+='      <input type="text"  class="form-control"  id="explication" name="explication" placeholder="Expliquer la reponse" required="required" style="border-radius:50px;"> ';
                  text2+='</div>';
   $("#ajout_rep").click(function(){

    $("#cont_bonneRep").append($(text2));
});

$('#remRep').click(function(){
    $("#cont_bonneRep").find('div').last().remove();

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

        listPropo[j]=($('#propositionA').val());
        listPropo[j+1]=($('#propositionB').val());              
        $('#listPropo').val(listPropo);
        console.log($('#listPropo').val());

        var listBonnesReponses=[];
         var j=0;
        for(var i=0;i<$('#cont_bonneRep').find('input').length;i++)
        {
         listBonnesReponses[i]=$('#cont_bonneRep').find('input')[i].value;
       j++;
          
        }

        listBonnesReponses[j]=($('#explication').val());            
        $('#listRep').val(listBonnesReponses);
        console.log($('#listRep').val());
        

});
</script>

    
@endpush