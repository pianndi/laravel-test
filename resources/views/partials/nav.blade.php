    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Pian Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Route::is('') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('post') ? 'active' : '' }}" href="/post">Post</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
        </li>
        @auth
        <li class="nav-item dropdown ms-auto">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
            <ul><hr class="dropdown-divider"></ul>
            <li>
              <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-in-left"></i>Logout</button>
              </form>
              </li>
          </ul>
        </li>
        @else
        <li class="nav-item ms-auto">
          <a class="nav-link d-flex gap-2 fs-12" href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>