<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">My App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ Request::is('materi*')  ? 'active' : '' }}" href="/materi">Materi</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="/category">Categories</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ Request::is('chalengge*') ? 'active' : '' }}" href="/chalengge">Chalengges</a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{ Request::is('scoreboard') ? 'active' : '' }}" href="/scoreboard">Scoreboards</a>
        </li>
  </ul>
  <ul class="navbar-nav ms-auto">
  @auth
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      Welcome, {{ auth()->user()->name }}
    </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> 
            My Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
          </form>
          </li>
      </ul>
    </li>
  @else
  <li class="nav-item">
      <a href="/login" class="nav-link {{ Request::is('login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> 
      Login</a>
  </li>
  @endauth
</ul>
    </div>
  </div>
</nav>