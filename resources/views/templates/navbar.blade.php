<body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">    
        <div class="loader-p"></div>
      </div>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start       -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      
        <!-- Page Sidebar Start-->
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <header class="main-nav">
            <div class="sidebar-user text-center"><a class="setting-primary" href="javascript:void(0)"><i data-feather="settings"></i></a><img class="img-90 rounded-circle" src="../assets/images/dashboard/1.png" alt="">
              <div class="badge-bottom"><span class="badge badge-primary">New</span></div><a href="user-profile.html">
                <h6 class="mt-3 f-14 f-w-600">{{Auth::user()->name}}</h6></a>
              <p class="mb-0 font-roboto">Human Resources Department</p>
              <div style="padding: 10px">
                <hr style="border-top: 3px solid #24695C;border-radius: 5px;">
                <ul class="nav_links">    
                  <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                  <li><a href="{{route('cards')}}">Home</a></li>
                  <li><a href="{{route('projects')}}">All Projects</a></li>
                  <li><a href="{{route('projectcreate')}}">Create New Project</a></li>
                  <li><a href="{{route('cardcreate')}}">Create New Card</a></li>
                  <li><a href="{{route('carditemcreate')}}">Create New Item</a></li>
                  <li><a href="{{route('logout')}}">Logout</a></li>
                </ul> 
              </div>            
            </div>
            <div id="nav_body" style="padding: 10px">
              <hr style="border-top: 3px solid #24695C;border-radius: 5px;"> 
              <p id="Hidden Cards" style="font-weight: bold;display:none;">Hidden Cards</p>
            </div>
          </header>
        </div>
        <!-- Page Sidebar Ends-->
      
    </div>