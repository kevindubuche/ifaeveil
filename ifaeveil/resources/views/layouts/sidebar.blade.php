
<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section 
    {{-- class="sidebar" --}}
    >

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                
                @if (Auth::user()->role !=1)
             
                <img src="{{asset('user_images/'.Auth::user()->GetUser(Auth::user()->role,Auth::user()->id)->image)}}" class="img-circle" alt="User Image">
           
              @else
                <img src="{{asset('user_images/defaultAvatar.png')}}" class="img-circle"
                alt="User Image"> 
           
                @endif
               
            
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>S I S</p>
                @else
                <a href="{{ url('/profile/'.Auth::user()->id)}}"
                    style="color: black; font-weight :bold; font-size:15px;">
                    <p>{{ Auth::user()->first_name}} {{ Auth::user()->last_name}}</p>
                </a>
                @endif
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> En Ligne</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
         
        </form>
        <!-- Sidebar Menu -->
        <hr>

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>