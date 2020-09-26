@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
    <section class="content-header">
        <h1>
            Quiz
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                {{-- <div class="row" style="padding-left: 20px">
                    @include('quizzes.show_fields')
                    <a href="{{ route('quizzes.index') }}" class="btn btn-default">Back</a>
                </div> --}}
                
            <input type="hidden" id="quiz_id" value="{{$quiz->id }}">
            {{-- <input type="hidden" id="categorie" value="{{$quiz->categorie }}">--}}
            <input type="hidden" id="nombre" value="{{$quiz->nombre_questions }}"> 
            <input type="hidden" id="duree" value="{{$quiz->duree }}"> 
            @if(Auth::user()->role == 3)
            <input type="hidden" id="student_id" value="{{Auth::user()->id }}"> 
            @endif

                <div class="col-lg-offset-1 col-md-offset-1  col-lg-7 col-md-7 col-sm-12 col-xs-12 jumbotron" >

                    <div >
                          @csrf<!-- {{csrf_field()}} -->
                          
                              <h3>ATTENTION !</h3>
                              <p>Il est demandé à l'élève de ne soumettre que des travaux personnels comme s'il était en salle de classe pour
                                  un examen!
                              </p>
           
                             
                              <div class="form-group has-feedback">            
                                 <div class="row">
                                 <button class='btn btn-primary brn-lg openModal' data-toggle="modal" data-target="#myModal" type=" button">Commencer</button>                   
                                </div>
           
                         </div>
           
                         <div class="modal" id="myModal">
                               <div class="modal-dialog">
                                   <div class="modal-content">
           
                                           <div class="modal-header">
                                               <h5 >Temps restant <div id="demo"></div></h5>
                                               <h2  class="close" id="score">Score: </h2>
                                           </div>
           
                                           <div class="modal-body">
                                           
           
           
           
                                           <div id="table"></div>
           
           
           
           
                                           </div>
           
                                           <div class="modal-footer">
                                            @if(Auth::user()->role == 3)
                                                <button type="button" class="btn btn-primary" id="soumettre" >Soumettre</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sortir</button>
                                                </div>
                                           @endif
                                   
                                   </div>
                               </div>
                         </div>
           
                   </div>
                </div>




            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    
<script type="text/javascript">

    $(document).on('click','.openModal', function(){
    
    var quiz_id=$('#quiz_id').val();
    // var categorie=$('#categorie').val();
     var nombre=$('#nombre').val(); //sa sed pou nombre de question quiz la genyen au total
    // console.log(nombre_question);
    var score=0;
     $('#soumettre').attr("disabled",false);
     $('#score').empty();
   
     var DEJA_SOUMMIS = 0;
    
    
     $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
            });
    
        $.ajax({
                url:'/startQuiz',
                type:'POST',
                data:{'quiz_id':quiz_id,
                     },
                success:function(resultat)
                {   console.log(resultat);
                    
                    for(var i in resultat.question){
                        console.log(resultat.question[i].proposition[0].content_prop);
                    }
                       
    
                    var text=' <div class=\'container table-responsive\' >';
                     text+=' <table id=\'list\' class=\' display   table   table-condensed\'>'
                        text+='      <thead>'
                            text+='      <tr>'
                            text+='              <th>QUIZ</th>'         
                            text+='         </tr>'
                        text+='      </thead>'
    
                   text+='      <tbody>' 
                   for(var i in resultat.question)
                               { 
                                text+='<tr  style="cursor:pointer;">'
                                text+='   <td > <p>' + resultat.question[i].content +'</p><fieldset id="'+resultat.question[i].id_question.toString()+'"> '
                                for(var j in resultat.question[i].proposition) {
                                    text+= '<label id="'+resultat.question[i].proposition[j].content_prop+resultat.question[i].id_question +'"><input type="checkbox" name="'+j+ resultat.question[i].id_question.toString() +'"  value="'+resultat.question[i].proposition[j].content_prop+'"/>' + resultat.question[i].proposition[j].content_prop +' </label> </br>'    
                               console.log('iportant valeur text : '+resultat.question[i].proposition[j].content_prop+resultat.question[i].id_question )
                                }  
                                text+='</fieldset> '  
                            
                              } 
    
    
                              text+='   </tr>'
                         text+='   </tbody>'
                text+='   </table>'
           text+=' </div>'
    
                    $("#table").empty();
                    $("#table").append($(text));
                 
                   
                   
                   
                   
    
    
        var table=  $('#list').DataTable({  searching:false,
                                    info:false,
                                    "pageLength":1,
                                    bLengthChange:false,
                                    "ordering":false,
                                    "sScrollY":"200px",
                                    select:true,
                                    "language": {
                                    "lengthMenu": "Montre _MENU_ resultats par page",
                                    "zeroRecords": "Aucune information - desole",
                                    "info": "Montre _PAGE_ de _PAGES_",
                                    "infoEmpty": "Aucun resultat trouve",
                                    "infoFiltered": "(filtre de _MAX_ total resultats)",
                                    "search": "Recherche",
                                    "paginate":{
                                    "previous":"Precedent",
                                    "next":"Prochain"
                                    }
                                    },
                                    buttons:['selectRows']
                                    }
    
                    );  
                    $('#table').on('page.dt', function(){
        console.log('page gange--------------------------');
        
    });
    
    
                    $(document).on('click','#soumettre',function(){
                        DEJA_SOUMMIS = 1;
                        $('#soumettre').attr("disabled",true);
        console.log('SOUMETTRE:');
        var lesID=[];
        for(i in resultat.question){    
            lesID[i]=resultat.question[i].id_question;      
        }
        console.log(lesID);
        $.ajax({
                url:'/endQuiz',
                type:'POST',
                data:{'lesID':lesID
                     },
                success:function(lesReponses)
                {   console.log(lesReponses);
                var canAdd=0;
               fatal=0;
                     lesID.forEach( function(unID,index){
                        fatal=0;
                        console.log('new question: ');  
                          
                      //  table.$('#'+unID).each(function(value){
    
                            for(var i=0;i<table.$('#'+unID).find('input').length;i++)
                  { 
                    if(fatal==1){ //si youn koche e li pa nan bonne rep yo, to pase a yon lot kestion
                             fatal=0;
                             break;
                         }
                  // console.log(table.$('#'+unID).find('input')[i].value);
                  //console.log(table.$('#'+unID).find('input')[i]);
                
                    if(table.$('#'+unID).find('input')[i].checked ==true){
                       // console.log(table.$('#'+unID).find('input')[i]);
                       for(var j=0;j<lesReponses[index].length;j++){
                            console.log('bonee rep:  '+lesReponses[index][j].explication);
                            if (  lesReponses[index][j].explication== table.$('#'+unID).find('input')[i].value  ){
                              ///  console.log('LES BONNES REPONSES cochees:  ');
                               console.log(table.$('#'+unID).find('input')[i]);
                                canAdd=1;break; 
                            }
                            else if(j==lesReponses[index].length-1 && !(lesReponses[index][j].explication==  table.$('#'+unID).find('input')[i].value ))
                           { fatal=1; canAdd=0;}
                      }
                    }
                    if(table.$('#'+unID).find('input')[i].checked ==false){
                       // console.log(table.$('#'+unID).find('input')[i]);
                       for(var j=0;j<lesReponses[index].length;j++){
                           /// console.log('bonee rep:  '+lesReponses[index][j].explication);
                            if (  lesReponses[index][j].explication== table.$('#'+unID).find('input')[i].value ){
                              ///  console.log('LES BONNES REPONSES NON cochees:  ');
                              ///  console.log(table.$('#'+unID).find('input')[i]);
                                canAdd=0; fatal=1; break;
                            }
                           
                      }
                    }
                    
                    
                  }
    
    
                  // nap kolore en vert bonne reponses yo
    
    
    
                  for(var i=0;i<table.$('#'+unID).find('input').length;i++)
                  { 
                       for(var j=0;j<lesReponses[index].length;j++){         
                            if (  lesReponses[index][j].explication==table.$('#'+unID).find('input')[i].value ){
                                ///console.log('si repons sa:  '+lesReponses[index][j].explication+'coresponn a sa: '+table.$('#'+unID).find('input')[i].value);
                                ///console.log('men valeur id a :  '+ table.$('#'+unID).find('input')[i].value);
                                console.log('MWEN EN VERT CAUSE: INPUT MW GEN VALER:'+table.$('#'+unID).find('input')[i].value+' E BONNE REP LA SE: '+lesReponses[index][j].explication)
                                    table.$('#'+lesReponses[index][j].explication+lesReponses[index][j].id_question).css('color','green');
                                    console.log('men ki ID text map eseye met en vert la: '+lesReponses[index][j].explication+lesReponses[index][j].id_question)
                             break; 
                            }
                           
                      }
                    
                  }
    
    
                     if(canAdd==1)
                     {score++;
                     canAdd=0;}
                     console.log('VOTRE SCORE: '+score);   
           
                             
                       // })      
                       
                    })
                    $('#score').empty();
                    $('#score').append((score*100/nombre).toFixed(2)+'%') 



                    //STOCKER LA NOTE DANS LA DB
                    var student_id=$('#student_id').val();
                    var quiz_id=$('#quiz_id').val();
                    $.ajax({
                        url:'/noteQuizzes.store',
                        type:'POST',
                        data:{'student_id':student_id,'quiz_id':quiz_id,'score':(score*100/nombre).toFixed(2)
                            },
                        success:function(lesReponses)
                        {   console.log(lesReponses);
                        },
                        error:function(error){
                            console.log(error);
                        }
                       })
                    //FIN STOCKER LA NOTE DANS LA DB
                },
                error:function(error){
                    console.log(error);
                }
        });
     
    })
    
                },
                error:function(error){
                    console.log(error);
                }
            });
    });


    var duree = $('#duree').val();
    var ok = countDown(duree);
  function countDown(duree){
      // Set the date we're counting down to
var countDownDate = new Date().getTime()+(duree*60*1000);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = hours + ": "
  + minutes + ": " + seconds + " ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "TERMINE";
    if(DEJA_SOUMMIS == 0){
         $('#soumettre').click()
    }
   
  }
}, 1000);
  }
    
    
    </script>
@endpush