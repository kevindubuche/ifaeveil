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
          @if(Auth::user()->role == 1)
          Administrateur
         @elseif(Auth::user()->role == 2)
          Professeur(e)
         @elseif(Auth::user()->role == 3)
         Etudiant(e)
         @endif
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
        <li class="active">Profile de l'utilisateur</li>
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
              

            @if (Auth::user()->role !=1)
           src="{{asset('user_images/'.Auth::user()->GetUser(Auth::user()->role,Auth::user()->id)->image)}}" 
              @else
           src="{{asset('user_images/defaultAvatar.png')}}" 
          
            @endif
         
            width="50" height="50"
            style="border-radius: 50%;
            width:150px; height:150px;
            vertical-align:middle;"
            alt="User profile picture">

            <h3 class="profile-username text-center">{{$user->nom}} {{$user->prenom}}</h3>
           

              <p class="text-muted text-center">
               @if(Auth::user()->role == 1)
                Administrateur
               @elseif(Auth::user()->role == 2)
                Professeur(e)
               @elseif(Auth::user()->role == 3)
               Etudiant(e)
               @endif
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Nom d'utilisateur</b> <a class="pull-right">{{$user->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>Telephone</b> <a class="pull-right">{{$user->tel}}</a>
                </li>
                <li class="list-group-item">
                  <b>Ajoute en</b> <a class="pull-right"> 
               {{$user->created_at->format('M. Y') }}
                   
                     </a>
                </li>
              </ul>

              <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b>Plus</b></a>
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
              <strong><i class="fa fa-user margin-r-5"></i>Statut matrimonial</strong>

              <p class="text-muted">
                @if ($user->statusmatrimonial==0)
                Célibataire
                    @elseif($user->statusmatrimonial==1)
                     Fiancé(e) 
                    @elseif($user->statusmatrimonial==2)
                     Marié(e)  
                    @elseif($user->statusmatrimonial==3)
                     Divorcé(e)  
                    @elseif($user->statusmatrimonial==4)
                     Veuf(ve) 
                    @endif
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

              <p class="text-muted">{{$user->adresse}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Identifiant</strong>

              <p><br>
                <span class="label label-success">{{Auth::user()->id}}</span>
                

              <hr>

              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date de naissance</strong>

            <p>{{$user->dob}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {{-- <li class="active"><a href="#activity" data-toggle="tab">Cours</a></li> --}}
              <li><a href="#timeline" data-toggle="tab">Details</a></li>
              <li><a href="#settings" data-toggle="tab">Reglages</a></li>
            </ul>
            <div class="tab-content">
            
              <div class="tab-pane" id="settings">
                  <section class="content-header">
                    <h1>
                        Changer mot de passe
                    </h1>
                </section>
                <div class="content">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body"><br><br>

                        <form action="{{url('/userUpdatePassword')}}"
                        method="post"
                        class="form-horizontal">
                        @csrf
                  <div class="form-group">
                  <input type="hidden" name="email" id="" 
                  value="{{$user->username}}"
                  >
                  <input type="hidden" name="user_id" id="" 
                  value="{{Auth::user()->id}}"
                  >
                  <input type="hidden" name="user_role" id="" 
                  value="{{Auth::user()->role}}"
                  >
                    <label for="inputName" class="col-sm-2 control-label">Ancien mot de passe</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="old_password" id="oldpassword" required placeholder="Entrer ancien mot de passe">
                      <i class="input-icon" id="messageError"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nouveau mot de passe</label>

                    <div class="col-sm-10">
                      <input type="text " class="form-control" name="new_password"id="newpassword" required placeholder="Entrer nouveau mot de passe">
                    </div>
                  </div>
         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Changer mot de passe</button>
                    </div>
                  </div>
                </form>
                </div>
                </div>
            </div>
        </div>
              <!-- /.tab-pane -->
              <div class="active tab-pane" id="timeline">
                <!-- The timeline -->
                {{-- ALL THE DETAILS ABOUT THE student --}}
                    <section class="content-header">
                      <h1>
                         Profile
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
                                      
                                        value="{{$user->nom}} {{$user->prenom}}"
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
                                            value="{{$user->username}}"
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
                                              value="{{$user->created_at->format('d M. Y')}}"
                                      readonly>
                                      </div>
                                  </div>
                                
                                @if(Auth::user()->role != 1)
                                <div class="form-group ">
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Sexe</label>
                                      <div class="col-sm-9 ">
                                        <input type="email"
                                        class="form-control"
                                        id="inputName"
                                        value="{{$user->sexe}}"  
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
                                              value="{{$user->adresse}}"
                                              >
                                      </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputName"
                                        class="col-sm-3 control-label">Telephone</label>
                                        <div class="col-sm-9">
                                            <input type="email"
                                                class="form-control"
                                                id="inputName"
                                                value="{{$user->tel}}"
                                        readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="inputName"
                                          class="col-sm-3 control-label">Religion</label>
                                          <div class="col-sm-9">
                                              <input type="text"
                                                  class="form-control"
                                                  id="inputName"
                                                  value="{{$user->religion}}"
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
                                                    @if(Auth::user()->role == 2)
                                                    value="{{$user->datenaissance}}"
                                                    @endif
                                                    @if(Auth::user()->role == 3)
                                                    value="{{$user->date_naissance}}"
                                                    @endif
                                            readonly>
                                            </div>
                                        </div>
                                @endif
                                @if(Auth::user()->role == 3)
                                <div class="form-group ">
                                  <label for="inputName"
                                  class="col-sm-3 control-label">Classe</label>
                                <div class="col-sm-9">
                                  <input type="email"
                                  class="form-control"
                                  id="inputName"
                                      value=" {{$user->class->nom}}"    
                               readonly>   
                                </div>

                                <div class="form-group ">
                                  <label for="inputName"
                                  class="col-sm-3 control-label">Nom du pere</label>
                                <div class="col-sm-9">
                                  <input type="email"
                                  class="form-control"
                                  id="inputName"
                                      value=" {{$user->nom_pere}}"    
                               readonly>   
                                </div>
                          </div>

                          <div class="form-group ">
                            <label for="inputName"
                            class="col-sm-3 control-label">Telephone du pere</label>
                          <div class="col-sm-9">
                            <input type="email"
                            class="form-control"
                            id="inputName"
                                value=" {{$user->tel_pere}}"    
                         readonly>   
                          </div>
                    </div>

                    <div class="form-group ">
                      <label for="inputName"
                      class="col-sm-3 control-label">Nom de la mere</label>
                    <div class="col-sm-9">
                      <input type="email"
                      class="form-control"
                      id="inputName"
                          value=" {{$user->nom_mere}}"    
                   readonly>   
                    </div>
              </div>

              <div class="form-group ">
                <label for="inputName"
                class="col-sm-3 control-label">Telephone de la mere</label>
              <div class="col-sm-9">
                <input type="email"
                class="form-control"
                id="inputName"
                    value=" {{$user->tel_mere}}"    
             readonly>   
              </div>
        </div>

        <div class="form-group ">
          <label for="inputName"
          class="col-sm-3 control-label">Nom autre personne reponsable</label>
        <div class="col-sm-9">
          <input type="email"
          class="form-control"
          id="inputName"
              value=" {{$user->nom_responsable}}"    
       readonly>   
        </div>
  </div>

  <div class="form-group ">
    <label for="inputName"
    class="col-sm-3 control-label">Telephone autre personne reponsable</label>
  <div class="col-sm-9">
    <input type="email"
    class="form-control"
    id="inputName"
        value=" {{$user->tel_responsable}}"    
 readonly>   
  </div>
</div>

<div class="form-group ">
  <label for="inputName"
  class="col-sm-3 control-label">Date d'admission</label>
<div class="col-sm-9">
  <input type="email"
  class="form-control"
  id="inputName"
      value=" {{$user->date_admission}}"    
readonly>   
</div>
</div>
                                  @endif
                                  @if(Auth::user()->role == 2)
                                  <div class="form-group ">
                                
                                    <label for="inputName"
                                    class="col-sm-3 control-label">Classes </label>
                                  <div class="col-sm-9">
                                    @foreach ($user->classes($user->user_id) as $classe)
                                    <input type="email"
                                    class="form-control"
                                    id="inputName"
                                  value="{{$classe->nom}}"
                                   readonly>  
                                    @endforeach
                                     
                                  </div>
                                  </div>

                                <div class="form-group ">
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Statut matrimonial</label>
                                      <div class="col-sm-9">
                                        <input type="email"
                                        class="form-control"
                                        id="inputName"
                                            value=" {{$user->statusmatrimonial}}"    
                                     readonly>   
                                      </div>
                                </div>

                                <div class="form-group ">
                                      <label for="inputName"
                                      class="col-sm-3 control-label">Niveau</label>
                                    <div class="col-sm-9">
                                      <input type="email"
                                      class="form-control"
                                      id="inputName"
                                          value=" {{$user->niveau}}"    
                                  readonly>   
                                    </div>
                              </div>

                              <div class="form-group ">
                                <label for="inputName"
                                class="col-sm-3 control-label">Option</label>
                              <div class="col-sm-9">
                                <input type="email"
                                class="form-control"
                                id="inputName"
                                    value=" {{$user->option}}"    
                             readonly>   
                              </div>
                        </div>

                        <div class="form-group ">
                          <label for="inputName"
                          class="col-sm-3 control-label">Date d'entree en service</label>
                        <div class="col-sm-9">
                          <input type="email"
                          class="form-control"
                          id="inputName"
                              value=" {{$user->date_entree_en_service}}"    
                       readonly>   
                        </div>
                  </div>
                                @endif

                              

                                   

                                       


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
