<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
      <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="sidebarMenuLabel">Pian Blog</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard')?'text-danger':'text-dark' }}" aria-current="page" href="/dashboard">
                <i class="bi bi-house-fill"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/post*')?'text-danger':'text-dark' }}" href="/dashboard/post"><i class="bi bi-file-earmark-text"></i>
                My Post
              </a>
            </li>
          </ul>
          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Administrator</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
            </a>
          </h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Route::is('dashboard/category*')?'text-danger':'text-dark' }}" href="/dashboard/category"><i class="bi bi-grid"></i>
                
                Kategori 
              </a>
            </li>
          </ul>
          @endcan
          <hr class="my-3">
         
          <ul class="nav flex-column mb-auto">
            <li class="nav-item">
              <a class="nav-link text-dark d-flex align-items-center gap-2" href="#">
                <i class="bi bi-gear-wide-connected"></i>
                Settings
              </a>
            </li>
            <li class="nav-item">
              <form action="/logout" method="post">
                @csrf
                <button class="nav-link text-dark d-flex align-items-center gap-2" type="submit">  <i class="bi bi-door-closed"></i>Logout</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </div>