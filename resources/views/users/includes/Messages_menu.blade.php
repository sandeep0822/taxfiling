
<li class="nav-item">
    <a href="{{ url('/Messages/inbox') }}" class="nav-link  @if (Request::is('Messages/inbox')) active @endif">
        <i class="far fa-envelope nav-icon"></i>
        <p>Inbox</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('/Messages/compose') }}" class="nav-link @if (Request::is('Messages/compose')) active @else @endif">
        <i class="nav-icon fas fa-truck"></i>
        <p>
            Compose
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('/Messages/sent') }}" class="nav-link @if (Request::is('Messages/sent')) active @else @endif">
        <i class="nav-icon fas fa-at"></i>
        <p>
            Sent Items
        </p>
    </a>
</li>
