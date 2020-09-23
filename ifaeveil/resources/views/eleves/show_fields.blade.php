

 @extends('layouts.app')
 <style>
     input[readonly], textarea{
         background: white !important;
         border: none;
       
     }
 </style>
 @section('content')
     <section class="content-header">
         <h1>
           Etudiant(e)
       
         </h1>
     </section>
     <div class="content">
         <div class="box box-primary">
             <div class="box-body">
               
   <!-- Content Wrapper. Contains page content -->
   {{-- <div class="content-wrapper"> --}}
     <!-- Content Header (Page header) -->
     <section class="content-header">
       <h1>
         @include('flash::message')
         @include('adminlte-templates::common.errors')
         Profil de l'utilisateur
       </h1>
       <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
         <li class="active">Profil de l'utilisateur</li>
       </ol>
     </section>
 
     <!-- Main content -->
     <section class="content">
 
       <div class="row">
         <div class="col-md-3">
 
           <!-- Profile Image -->
           <div class="box box-primary">
             <div class="box-body box-profile">
               <img class="profile-user-img img-responsive img-circle" 
               
 
             @if ($eleve->image)
            src="{{asset('user_images/'.$eleve->image)}}" 
               @else
            src="{{asset('user_images/defaultAvatar.png')}}" 
           
             @endif
          
             width="50" height="50"
             style="border-radius: 50%;
             width:150px; height:150px;
             vertical-align:middle;"
             alt="User profile picture">
 
             <h3 class="profile-username text-center">{{$eleve->nom}} {{$eleve->prenom}}</h3>
                        <p class="text-muted text-center">
              
                         Élève
               
               </p>
 
               <ul class="list-group list-group-unbordered">
                 <li class="list-group-item">
                 <b>Nom d'utilisateur</b> <a class="pull-right">{{$eleve->username}}</a>
                 </li>
                 <li class="list-group-item">
                   <b>Telephone</b> <a class="pull-right">{{$eleve->tel}}</a>
                 </li>
                 <li class="list-group-item">
                   <b>Membre depuis</b> <a class="pull-right"> 
     {{ date('Y')-$eleve->created_at->format('Y') }}
                     ans
                      </a>
                 </li>
               </ul>
 
               <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b> </b></a>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
 
           <!-- About Me Box -->
           <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">A propos</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              
               <hr>
 
               <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>
 
               <p class="text-muted">{{$eleve->adresse}}</p>
 
               <hr>
 
               <strong><i class="fa fa-pencil margin-r-5"></i> Identifiant</strong>
 
               <p>
                 <span class="label label-success">{{$eleve->user_id}}</span>
                 
 
               <hr>
 
               <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date de naissance</strong>
 
             <p>{{$eleve->date_naissance}}</p>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
               <li><a href="#timeline" data-toggle="tab">Details</a></li>
               {{-- <li><a href="#settings" data-toggle="tab">Reglages</a></li> --}}
             </ul>
             <div class="tab-content">
              
         
               <!-- /.tab-pane -->
               <div class=" active tab-pane" id="timeline">
                 <!-- The timeline -->
                 {{-- ALL THE DETAILS ABOUT THE student --}}
                     <section class="content-header">
                       <h1>
                          Profil
                       </h1>
                   </section>
                   <div class="content">
                       @include('adminlte-templates::common.errors')
                       <div class="box box-primary">
                           <div class="box-body"><br><br>
                     <form class="form-horizontal">
                         <div class="form-group">
                             <label for="inputName"
                                 class="col-sm-3 control-label">Nom complet</label>
                                 <div class="col-sm-9">
                                     <input type="email"
                                         class="form-control"
                                         id="inputName"
                                      
                                         value="{{$eleve->nom}} {{$eleve->prenom}}"
                                 readonly>
                                 </div>
                             </div>
 
                             <div class="form-group">
                                 <label for="inputName"
                                     class="col-sm-3 control-label">Nom d'utilisateur</label>
                                     <div class="col-sm-9">
                                         <input type="email"
                                             class="form-control"
                                             id="inputName"
                                             value="{{$eleve->username}}"
                                     readonly>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                   <label for="inputName"
                                       class="col-sm-3 control-label">Classe</label>
                                       <div class="col-sm-9">
                                           <input type="classe"
                                               class="form-control"
                                               id="inputName"
                                               value="{{$eleve->Class->nom }}"
                                       readonly>
                                       </div>
                                   </div>
                                   
 
                                 <div class="form-group ">
                                     
                                         <label for="inputName"
                                         class="col-sm-3 control-label">Sexe</label>
                                       <div class="col-sm-9 ">
                                         <input type="email"
                                         class="form-control"
                                         id="inputName"
                                       value="{{$eleve->sex}}" 
                                        
                                 readonly>
                                             
                                       </div>
                                   
                                 </div>
 
         
 
                                 <div class="form-group">
                                     <label for="inputName"
                                         class="col-sm-3 control-label">Date de naissance</label>
                                         <div class="col-sm-9">
                                             <input type="email"
                                                 class="form-control"
                                                 id="inputName"
                                                 value="{{$eleve->date_naissance}}"
                                         readonly>
                                         </div>
                                     </div>
 
                                     <div class="form-group">
                                         <label for="inputName"
                                             class="col-sm-3 control-label">Telephone</label>
                                             <div class="col-sm-9">
                                                 <input type="email"
                                                     class="form-control"
                                                     id="inputName"
                                                     value="{{$eleve->tel}}"
                                             readonly>
                                             </div>
                                         </div>
 
 
                                         <div class="form-group">
                                           <label for="inputName"
                                               class="col-sm-3 control-label">Religion</label>
                                               <div class="col-sm-9">
                                                   <input type="email"
                                                       class="form-control"
                                                       id="inputName"
                                                       value="{{$eleve->religion}}"
                                               readonly>
                                               </div>
                                           </div>
 
                                         <div class="form-group">
                                             <label for="inputName"
                                                 class="col-sm-3 control-label">Adresse</label>
                                                 <div class="col-sm-9">
                                                     <input 
                                                         class="form-control"
                                                         id="inputExperience"
                                                         readonly
                                                         value="{{$eleve->adresse}}"
                                                         >
                                                   
                                                    
                                                 </div>
                                             </div>
                                             <div class="form-group">
                                                 <label for="inputName"
                                                     class="col-sm-3 control-label">Nom du pere</label>
                                                     <div class="col-sm-9">
                                                         <input 
                                                             class="form-control"
                                                             id="inputExperience"
                                                             readonly
                                                             value="{{$eleve->nom_pere}}"
                                                             >
                                                     </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <label for="inputName"
                                                         class="col-sm-3 control-label">Tephone du pere</label>
                                                         <div class="col-sm-9">
                                                             <input 
                                                                 class="form-control"
                                                                 id="inputExperience"
                                                                 readonly
                                                                 value="{{$eleve->tel_pere}}"
                                                                 >
                                                         </div>
                                                     </div>
 
                                                     <div class="form-group">
                                                         <label for="inputName"
                                                             class="col-sm-3 control-label">Nom de la mere</label>
                                                             <div class="col-sm-9">
                                                                 <input 
                                                                     class="form-control"
                                                                     id="inputExperience"
                                                                     readonly
                                                                     value="{{$eleve->nom_mere}}"
                                                                     >
                                                             </div>
                                                         </div>
                                                         <div class="form-group">
                                                             <label for="inputName"
                                                                 class="col-sm-3 control-label">Tephone de la mere</label>
                                                                 <div class="col-sm-9">
                                                                     <input 
                                                                         class="form-control"
                                                                         id="inputExperience"
                                                                         readonly
                                                                         value="{{$eleve->tel_mere}}"
                                                                         >
                                                                 </div>
                                                             </div>
 
                                                             
                                                     <div class="form-group">
                                                       <label for="inputName"
                                                           class="col-sm-3 control-label">Autre personne reponsable (Nom)</label>
                                                           <div class="col-sm-9">
                                                               <input 
                                                                   class="form-control"
                                                                   id="responsable_nom"
                                                                   readonly
                                                                   value="{{$eleve->nom_reponsable}}"
                                                                   >
                                                           </div>
                                                       </div>
                                                       <div class="form-group">
                                                           <label for="inputName"
                                                               class="col-sm-3 control-label">Autre personne reponsable (Téléphone)</label>
                                                               <div class="col-sm-9">
                                                                   <input 
                                                                       class="form-control"
                                                                       id="responsable_phone"
                                                                       readonly
                                                                       value="{{$eleve->tel_responsable}}"
                                                                       >
                                                               </div>
                                                           </div>
           
             
     
 
                                             <div class="form-group">
                                                 <label for="inputName"
                                                     class="col-sm-3 control-label">Date d'admission</label>
                                                     <div class="col-sm-9">
                                                         <input type="email"
                                                             class="form-control"
                                                             id="inputName"
                                                             value="{{
                                                         $eleve->date_admission}}"
                                                     readonly>
                                                     </div>
                                                 </div>

                                                 <div class="form-group">
                                                    <label for="inputName"
                                                        class="col-sm-3 control-label">Date d'enregistrement</label>
                                                        <div class="col-sm-9">
                                                            <input type="email"
                                                                class="form-control"
                                                                id="inputName"
                                                                value="{{
                                                            $eleve->created_at}}"
                                                        readonly>
                                                        </div>
                                                    </div>
 
                         </div>
 
                 </form>
               </div>
             </div>
           </div>
         </div>
               <!-- /.tab-pane -->
 
              
               <!-- /.tab-pane -->
             </div>
             <!-- /.tab-content -->
           </div>
           <!-- /.nav-tabs-custom -->
         </div>
         <!-- /.col -->
       </div>
       <!-- /.row -->
 
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
             {{-- </div> --}}
         </div>
     </div>
 @endsection
 