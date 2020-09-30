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
          Professeur
      
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
              

            @if ($prof->image)
           src="{{asset('user_images/'.$prof->image)}}" 
              @else
           src="{{asset('user_images/defaultAvatar.png')}}" 
          
            @endif
         
            width="50" height="50"
            style="border-radius: 50%;
            width:150px; height:150px;
            vertical-align:middle;"
            alt="User profile picture">

            <h3 class="profile-username text-center">{{$prof->nom}} {{$prof->prenom}}</h3>
                       <p class="text-muted text-center">
             
                Professeur(e)
              
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Nom d'utilisateur</b> <a class="pull-right">{{$prof->username}}</a>
                </li>
                <li class="list-group-item">
                  <b>Telephone</b> <a class="pull-right">{{$prof->tel}}</a>
                </li>
                <li class="list-group-item">
                  <b>Date d'entree en service</b> <a class="pull-right"> 
    {{ $prof->date_entree_en_service }}
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
              <strong><i class="fa fa-user margin-r-5"></i>Statut matrimonial</strong>

              <p class="text-muted">
              {{ $prof->statusmatrimonial}}
            
               
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

              <p class="text-muted">{{$prof->adresse}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Identifiant</strong>

              <p>
                <span class="label label-success">{{$prof->user_id}}</span>
                

              <hr>

              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date de naissance</strong>

            <p>{{$prof->datenaissance}}</p>
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
              <div class="active tab-pane" id="timeline">
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
                                     
                                        value="{{$prof->nom}} {{$prof->prenom}}"
                                readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName"
                                    class="col-sm-3 control-label">Nom d'utilisateur</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control"
                                            id="inputName"
                                            value="{{$prof->username}}"
                                    readonly>
                                    </div>
                                </div>
                                
                                <div class="form-group ">
                                
                                  <label for="inputName"
                                  class="col-sm-3 control-label">Classes </label>
                                <div class="col-sm-9">
                                  @foreach ($prof->classes($prof->user_id) as $classe)
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
                                        class="col-sm-3 control-label">Sexe</label>
                                      <div class="col-sm-9 ">
                                        <input type="text"
                                        class="form-control"
                                        id="inputName"
                                      value="{{$prof->sexe}}"  
                                        
                                        
                                readonly>
                                            
                                      </div>
                                  
                                </div>

                                <div class="form-group ">
                                
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Statut matrimonial</label>
                                      <div class="col-sm-9">
                                        <input type="email"
                                        class="form-control"
                                        id="inputName"
                                      value="{{$prof->statusmatrimonial}}"
                                       
                                      
                                        
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
                                                value="{{$prof->datenaissance}}"
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
                                                    value="{{$prof->tel}}"
                                            readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName"
                                                class="col-sm-3 control-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <input 
                                                        class="form-control"
                                                        id="inputExperience"
                                                        readonly
                                                        value="{{$prof->religion}}"
                                                        >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                              <label for="inputName"
                                                  class="col-sm-3 control-label">Option</label>
                                                  <div class="col-sm-9">
                                                      <input 
                                                          class="form-control"
                                                          id="inputExperience"
                                                          readonly
                                                          value="{{$prof->option}}"
                                                          >
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
                                                          value="{{$prof->adresse}}"
                                                          >
                                                  </div>
                                              </div>

                                            <div class="form-group">
                                                <label for="inputName"
                                                    class="col-sm-3 control-label">Date d'entree en service</label>
                                                    <div class="col-sm-9">
                                                        <input type="email"
                                                            class="form-control"
                                                            id="inputName"
                                                            value="{{$prof->date_entree_en_service}}"
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
