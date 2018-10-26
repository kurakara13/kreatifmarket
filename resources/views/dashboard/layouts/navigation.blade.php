<div class="dashboard-nav">
  <div class="dashboard-nav-inner">

    <ul data-submenu-title="Start">
      <li class="{{set_active('usr.dashboard')}}"><a href="{{route('usr.dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
      <li class="#"><a href="{{route('usr.message')}}"><i class="icon-material-outline-question-answer"></i> Messages (belum)<span class="nav-tag">2</span></a></li>
      <li><a href="#"><i class="icon-material-outline-star-border"></i> Bookmarks (belum)</a></li>
      <li><a href="#"><i class="icon-material-outline-rate-review"></i> Reviews (belum)</a></li>
    </ul>

    <ul data-submenu-title="Organize and Manage">
      <li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>
        <ul>
          <li><a href="#">Manage Jobs (belum) <span class="nav-tag">3</span></a></li>
          <li><a href="#">Manage Candidates (belum)</a></li>
          <li><a href="#">Post a Job (belum)</a></li>
        </ul>
      </li>
      <li class="{{set_active(['usr.task.manage', 'usr.task.my_active_bids', 'usr.task.post', 'usr.task.conversation', 'usr.task.manage.bidders'])}}">
        <a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
        <ul>
          <li class="{{set_active(['usr.task.manage', 'usr.task.manage.bidders'])}}"><a href="{{route('usr.task.manage')}}">Manage Tasks <span class="nav-tag">2</span></a></li>
          <li class="{{set_active('usr.task.my_active_bids')}}"><a href="{{route('usr.task.my_active_bids')}}">My Active Bids <span class="nav-tag">4</span></a></li>
          <li class="{{set_active('usr.task.post')}}"><a href="{{route('usr.task.post')}}">Post a Task</a></li>
        </ul>
      </li>
    </ul>

    <ul data-submenu-title="Account">
      <li><a href="#"><i class="icon-material-outline-settings"></i> Settings (belum)</a></li>
      <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="icon-material-outline-power-settings-new"></i> Logout
        </a>
      </li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </ul>

  </div>
</div>
