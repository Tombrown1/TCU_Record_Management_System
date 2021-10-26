<nav id="sidebar" class="sidebar">
			<a class="sidebar-brand" href="index.html">
				<svg>
					<use xlink:href="#ion-ios-pulse-strong"></use>
				</svg>
				<!-- Spark -->
				@yield('user-name')
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
					<img src="img/avatars/avatar.jpg" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
					<div class="fw-bold">Linda Miller</div>
					<small>Front-end Developer</small>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Main
					</li>
					<!-- <li class="sidebar-item active">
						<a href="#" data-bs-target="#dashboards"  data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse show" data-bs-parent="#sidebar">							
						</ul>
					</li> -->

					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('home') }}"><i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span></a>
					</li>

					<li class="sidebar-item">
						<a data-bs-target="#member" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle ion ion-md-people me-2"></i> <span class="align-middle">Members</span>							
						</a>
						<ul id="member" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#member">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('unit_members')}}">Unit Members</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('probation')}}">Probation</a></li>
						</ul>
						
					</li>
					<li class="sidebar-item">
						<a data-bs-target="#subunit" data-bs-toggle="collapse" class="sidebar-link collapsed">
							<i class="align-middle me-2 fas fa-fw fa-sign-in-alt"></i> <span class="align-middle">Subunit</span>
						</a>
						<ul id="subunit" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#subunit">
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('cable_network')}}">Cable Network</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('camera')}}">Camera</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('console')}}">Console</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="{{ route('production_sales')}}">Production/Sales</a></li>
						</ul>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('posting')}}"><i class="ion ion-md-person me-2"></i> <span class="align-middle">Posting</span></a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('add_member')}}"><i class="ion ion-md-person me-2"></i> <span class="align-middle">Add Member</span></a>
					</li>
				
				</ul>
			</div>
		</nav>