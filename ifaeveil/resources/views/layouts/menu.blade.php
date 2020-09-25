<li class="{{ Request::is('messages*') ? 'active' : '' }}">
    <a href="{{ route('messages.index') }}"><i class="fa fa-envelope"></i><span>Messages</span></a>
</li>
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
    <li class="{{ Request::is('annees*') ? 'active' : '' }}">
        <a href="{{ route('annees.index') }}"><i class="fa fa-edit"></i><span>Années académiques</span></a>
    </li>    
    <li class="{{ Request::is('classes*') ? 'active' : '' }}">
        <a href="{{ route('classes.index') }}"><i class="fa fa-graduation-cap"></i><span>Classes</span></a>
    </li>
    <li class="{{ Request::is('etapes*') ? 'active' : '' }}">
        <a href="{{ route('etapes.index') }}"><i class="fa fa-calendar-times-o"></i><span>Etapes</span></a>
    </li>
    <li class="{{ Request::is('assignations*') ? 'active' : '' }}">
        <a href="{{ route('assignations.index') }}"><i class="fa fa-exchange"></i><span>Assignations</span></a>
    </li>
    

</ul>
</li>

<li class="{{ Request::is('matieres*') ? 'active' : '' }}">
    <a href="{{ route('matieres.index') }}"><i class="fa fa-book"></i><span>Matieres</span></a>
</li>
<li class="{{ Request::is('profs*') ? 'active' : '' }}">
    <a href="{{ route('profs.index') }}"><i class="fa fa-user-circle"></i><span>Professeurs</span></a>
</li>
<li class="{{ Request::is('eleves*') ? 'active' : '' }}">
    <a href="{{ route('eleves.index') }}"><i class="fa fa-user"></i><span>Elèves</span></a>
</li>

<li class="{{ Request::is('allUsers*') ? 'active' : '' }}">
    <a href="{{ route('allUsers.index') }}"><i class="fa fa-edit"></i><span>Changer mot de passe</span></a>
</li>


{{-- 
<li class="{{ Request::is('lecons*') ? 'active' : '' }}">
    <a href="{{ route('lecons.index') }}"><i class="fa fa-edit"></i><span>Lecons</span></a>
</li> --}}
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{{ url('/profile/'.Auth::user()->id)}}"><i class="fa fa-user-circle"></i><span>Mon profil</span></a>
</li>

<li class="treeview">
    <a href="#">
        <i class=" fa fa-briefcase"></i><span>Examens</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('exams*') ? 'active' : '' }}">
            <a href="{{ route('exams.index') }}"><i class="fa fa-briefcase"></i><span>Examens</span></a>
        </li>
        <li class="{{ Request::is('soumissions*') ? 'active' : '' }}">
            <a href="{{ route('soumissions.index') }}"><i class="fa fa-book"></i><span>Soumissions</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('quizQuestions*') ? 'active' : '' }}">
    <a href="{{ route('quizQuestions.index') }}"><i class="fa fa-edit"></i><span>Quiz Questions</span></a>
</li>

{{-- <li class="{{ Request::is('quizReponses*') ? 'active' : '' }}">
    <a href="{{ route('quizReponses.index') }}"><i class="fa fa-edit"></i><span>Quiz Reponses</span></a>
</li>

<li class="{{ Request::is('quizPropositions*') ? 'active' : '' }}">
    <a href="{{ route('quizPropositions.index') }}"><i class="fa fa-edit"></i><span>Quiz Propositions</span></a>
</li>
 --}}
<li class="{{ Request::is('quizzes*') ? 'active' : '' }}">
    <a href="{{ route('quizzes.index') }}"><i class="fa fa-edit"></i><span>Quizzes</span></a>
</li>

