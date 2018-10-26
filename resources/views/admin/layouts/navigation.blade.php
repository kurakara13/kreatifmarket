<div class="dashboard-nav">
  <div class="dashboard-nav-inner">

    <ul data-submenu-title="Start">
      <li class="{{set_active('admin.dashboard')}}"><a href="{{route('admin.dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
      <li class="#"><a href="{{route('adm.message')}}"><i class="icon-material-outline-question-answer"></i> Messages <span class="nav-tag">2</span></a></li>
      <li><a href="#"><i class="icon-material-outline-star-border"></i> Bookmarks</a></li>
      <li><a href="#"><i class="icon-material-outline-rate-review"></i> Reviews</a></li>
    </ul>

    <ul data-submenu-title="Organize and Manage">
      <li><a href="#"><i class="icon-material-outline-business-center"></i> Jobs</a>
        <ul>
          <li><a href="#">Manage Jobs <span class="nav-tag">3</span></a></li>
          <li><a href="#">Manage Candidates</a></li>
        </ul>
      </li>
      <li class="{{set_active(['adm.task.manage', 'adm.task.bidders', 'adm.task.bids', 'adm.task.post'])}}">
        <a href="#"><i class="icon-material-outline-assignment"></i> Tasks</a>
        <ul>
          <li class="{{set_active('adm.task.manage')}}"><a href="{{route('adm.task.manage')}}">Manage Tasks <span class="nav-tag">2</span></a></li>
          <li class="{{set_active('adm.task.bidders')}}"><a href="{{route('adm.task.bidders')}}">Manage Bidders</a></li>
        </ul>
      </li>
      <li class="{{set_active(['adm.usr.manage', 'adm.usr.reports'])}}">
        <a href="#"><i class="icon-feather-user"></i> Users</a>
        <ul>
          <li class="{{set_active('adm.usr.manage')}}"><a href="{{route('adm.task.manage')}}">Manage Users <span class="nav-tag">2</span></a></li>
          <li class="{{set_active('adm.usr.reports')}}"><a href="{{route('adm.task.bidders')}}">Users Reports</a></li>
        </ul>
      </li>
    </ul>

    <ul data-submenu-title="Account">
      <li><a href="#"><i class="icon-material-outline-settings"></i> Settings</a></li>
      <li><a href="#"><i class="icon-material-outline-power-settings-new"></i> Logout</a></li>
    </ul>

  </div>
</div>
