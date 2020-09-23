<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{{ route('admins.index') }}"><i class="fa fa-user"></i><span>Administrateurs</span></a>
</li>


<li class="treeview">
    <a href="#">
        <i class=" fa fa-dashboard"></i><span>Général</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">
    <li class="{{ Request::is('classes*') ? 'active' : '' }}">
        <a href="{{ route('classes.index') }}"><i class="fa fa-graduation-cap"></i><span>Classes</span></a>
    </li>
    <li class="{{ Request::is('annees*') ? 'active' : '' }}">
        <a href="{{ route('annees.index') }}"><i class="fa fa-edit"></i><span>Années académiques</span></a>
    </li>    
    <li class="{{ Request::is('etapes*') ? 'active' : '' }}">
        <a href="{{ route('etapes.index') }}"><i class="fa fa-calendar-times-o"></i><span>Etapes</span></a>
    </li>
    <li class="{{ Request::is('assignations*') ? 'active' : '' }}">
        <a href="{{ route('assignations.index') }}"><i class="fa fa-exchange"></i><span>Assignations</span></a>
    </li>
    

</ul>
</li>


<li class="{{ Request::is('profs*') ? 'active' : '' }}">
    <a href="{{ route('profs.index') }}"><i class="fa fa-user-circle"></i><span>Professeurs</span></a>
</li>
<li class="{{ Request::is('eleves*') ? 'active' : '' }}">
    <a href="{{ route('eleves.index') }}"><i class="fa fa-user"></i><span>Elèves</span></a>
</li>

