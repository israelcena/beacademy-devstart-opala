<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
            <i class="bi bi-x-diamond"></i>
        </a>

        <ul class="nav col-12 px-2 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-dark">Produtos</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Sobre</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="col-12 col-lg-auto d-flex justify-content-center justify-content-lg-end">
          <ul class="nav me-1">
            @if (Auth::check())
              @if (Auth::user()->is_admin == 1)
                <li>
                  <a href="{{ route('admin.index') }}" class="nav-link px-2 link-dark me-1">Dashboard</a>
                </li>
              @endif
          </ul>
          <div class="dropdown">
            <a class="btn btn-outline-dark dropdown-toggle" href="#" role="button" id="menuconta" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu" aria-labelledby="menuconta">
              <li class="dropdown-item text-dark text-decoration-none">
                <a class="text-dark text-decoration-none" href="/usuarios/{{Auth::user()->id}}">Minha conta</a>
              </li>
              <li class="dropdown-item text-dark text-decoration-none">
                <a class="text-dark text-decoration-none" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
            </div>
            @else
            <ul class="nav">  
              <li class="nav-link text-dark text-decoration-none"><a href="{{ route('login') }}" class="dropdown-item">Entrar</a></li>
              <li class="nav-link text-dark text-decoration-none"><a href="{{ route('register') }}" class="dropdown-item">Cadastrar</a></li>
            </ul>
              @endif
          </ul>
        </div>
               
      </div>
    
    </div>
  </header>