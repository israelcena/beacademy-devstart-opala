<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-start justify-content-lg-start">
      <div class="">
        <a href="/" class="align-items-center mb-lg-0 text-dark text-decoration-none">
          <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo da loja E Ai Docinho" class="img-fluid" style="width: 20%">
        </a>
      </div>
      <div class="col-12 px-2 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <div class="input-group">
            <input type="search" class="form-control" placeholder="Busca..." aria-label="Search">
            <span class="input-group-text bg-white" id="basic-addon1">
              <i class="bi bi-search"></i>
            </span>
          </div>
        </form>
      </div>

        <div class="col-12 col-lg-auto d-flex justify-content-center justify-content-lg-end align-items-center">
          <ul class="nav me-1">
            @if (Auth::check())
              @if (Auth::user()->is_admin == 1)
                <li>
                  <a href="{{ route('admin.index') }}" class="btn btn-brown-open">Painel</a>
                </li>
              @endif
          </ul>
          <div class="dropdown">
            <a class="btn btn-brown-open dropdown-toggle" href="#" role="button" id="menuconta" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
            <ul class="dropdown-menu" aria-labelledby="menuconta">
              <li class="">
                <a class="dropdown-item" href="/perfil/{{ Auth::user()->id }}">Minha conta</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
            @else
            
            <ul class="nav">
              <li class="nav-link text-decoration-none">
                <a href="{{ route('cart.index') }}" class="">
                  <span><i class="bi bi-cart"></i></span>
                </a>
              </li>
              <li class="nav-link text-dark text-decoration-none"><a class="btn btn-simple" href="{{ route('login') }}" class="dropdown-item">Entrar</a></li>
              <li class="nav-link text-dark text-decoration-none"><a class="btn btn-brown-open" href="{{ route('register') }}" class="dropdown-item">Cadastrar</a></li>
            </ul>
              @endif
          </ul>

        </div>

    </div>

</div>