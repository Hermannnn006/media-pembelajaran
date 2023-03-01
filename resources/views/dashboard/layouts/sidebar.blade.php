<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/chalengge">
            <i class="bi bi-bug"></i>
              Chalengge
            </a>
          </li>
          @can('admin')
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mb-1 mt-4 text-muted">
            <span>Administrator</span>
          </h6>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/materi*') ? 'active' : '' }}" href="/dashboard/materi">
            <i class="bi bi-book"></i>
              Materi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/chalengge*') ? 'active' : '' }}" href="/dashboard/chalengge">
            <i class="bi bi-bug"></i>
              Chalengge
            </a>
          </li>
          @endcan
        </ul>
      </div>
    </nav>