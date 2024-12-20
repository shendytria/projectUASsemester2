 <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
     <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
         <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
     </a>
     <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
     </a>
     <form class="d-none d-md-flex ms-4">
         <input class="form-control border-0" type="search" placeholder="Search">
     </form>
     <div class="navbar-nav align-items-center ms-auto">
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-envelope me-lg-2"></i>
                 <span class="d-none d-lg-inline-flex">Message</span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="img/Screenshot 2024-06-17 224328.png" alt=""
                             style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Shely send you a message</h6>
                             <small>2 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="img/Screenshot 2024-06-17 224333.png" alt=""
                             style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Amel send you a message</h6>
                             <small>15 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <img class="rounded-circle" src="img/Screenshot 2024-06-17 224322.png" alt=""
                             style="width: 40px; height: 40px;">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">Farah send you a message</h6>
                             <small>30 minutes ago</small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <a href="#" class="dropdown-item text-center">See all message</a>
             </div>
         </div>
         @auth
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                     <img class="rounded-circle me-lg-2" src="{{ asset('img/meh.jpg')}}" alt=""
                         style="width: 40px; height: 40px;">
                     <span class="d-none d-lg-inline-flex">Hallo, {{ Auth::user()->nama_user }}!</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                     <a href="{{ route('users.edit', Auth::id()) }}" class="dropdown-item">My Profile</a>
                     <a href="{{ route('logout') }}" class="dropdown-item"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         Log Out
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                         @csrf
                     </form>
                 </div>
             </div>
         @endauth
     </div>
 </nav>
