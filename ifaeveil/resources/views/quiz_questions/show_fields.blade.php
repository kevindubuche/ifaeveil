<div class="row"  >
    <section class="col-lg-offset-4 col-md-offset-4   col-lg-4 col-md-4 col-sm-10 col-xs-10" >
      
    <h1>Question</h1>
    
   

        <div class="form-group has-feedback">
             <label for="theme">Categorie :</label>
             <input type="text" class="form-control" value="{{$aQuestion->categorie}}" id="categorie" name="categorie"  readonly placeholder="Mettre le theme" required="required" style="border-radius:50px;">
        </div>

        <div class="form-group has-feedback">
             <label for="email_user">Question :</label>
             <input type="texte" class="form-control" value="{{ $aQuestion->content}}" name="content" id="content" readonly required="required" style="border-radius:50px;">
        </div>
<hr>
        <div id='cont_rep'>
        @foreach($reponses as $reponse)
             <div class="form-group has-feedback">
                  <label for="telephone">Bonnes Reponses :</label>
                  <input type="text" class="form-control" value="{{ $reponse->explication}}" id="explication"name="explication"  readonly required="required" style="border-radius:50px;">
              </div>
        @endforeach
        </div>
<hr>
        <div id='cont_prop'>
        @foreach($propos as $propo)
             <div class="form-group has-feedback">
                  <label for="telephone">Proposition :</label>
                  <input type="text" class="form-control" value="{{ $propo->content_prop}}" id="proposition"name="proposition" readonly required="required" style="border-radius:50px;">
              </div>
        
        @endforeach
        </div>


                        
       
   
    </section>     
 </div>