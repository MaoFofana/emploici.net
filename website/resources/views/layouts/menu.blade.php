
<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }} }}">
    <a class="nav-link" href="{{ url('/profile') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Profile</span>
    </a>
</li>

<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }} }}">
    <a class="nav-link" href="{{ url('/users') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Utilisateurs</span>
    </a>
</li>

<li class="nav-item {{ Request::is('entreprises*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('entreprises.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Entreprises</span>
    </a>
</li>
<li class="nav-item {{ Request::is('jobs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('jobs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Jobs</span>
    </a>
</li>
<li class="nav-item {{ Request::is('messages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('messages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Messages</span>
    </a>
</li>
<li class="nav-item {{ Request::is('newLetters*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('newLetters.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>New Letters</span>
    </a>
</li>
<li class="nav-item {{ Request::is('postulers*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('postulers.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Postulers</span>
    </a>
</li>
<li class="nav-item {{ Request::is('postulers*') ? 'active' : '' }}">
    <a class="nav-link" href="{!! url('/logout') !!}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon icon-cursor"></i><span>Deconnexion</span>
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
