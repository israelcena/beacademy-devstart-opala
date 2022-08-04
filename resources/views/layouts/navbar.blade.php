<div class="row">
  <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-start justify-content-lg-start">
        <div class="">
          <a href="/" class="align-items-center mb-lg-0 text-dark text-decoration-none">
            <img src="{{ asset('storage/logo/logo.png') }}" alt="Logo da loja E Ai Docinho" class="img-fluid" style="width: 20%">
          </a>
        </div>

        <div class="col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">

            <div class="input-group">

              <input type="search" class="busca" placeholder="Busca" aria-label="Search">

              <span class="input-group-text" id="basic-addon1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </span>

            </div>

          </form>

        </div>
  
          <div class="col-12 col-lg-auto d-flex justify-content-center justify-content-lg-end align-items-center">
            
            <ul class="nav me-1">
              @if (Auth::check())
                @if (Auth::user()->is_admin == 1)
                  <li>
                    <a href="{{ route('admin.index') }}" class="btn btn-brown-open me-2">Painel</a>
                  </li>
                @endif
            </ul>
            <div class="dropdown">
              <a class="btn btn-brown-open dropdown-toggle" href="#" role="button" id="menuconta" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
              <ul class="dropdown-menu" aria-labelledby="menuconta">
                <li class="">
                  <a class="dropdown-item fs-4" href="/perfil/{{ Auth::user()->id }}">Minha conta</a>
                </li>
                <li>
                  <a class="dropdown-item fs-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sair</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
              @else
              
              <ul class="nav">
                <li class="nav-link text-dark text-decoration-none"><a class="btn btn-simple" href="{{ route('login') }}" class="dropdown-item me-2">Entrar</a></li>
                <li class="nav-link text-dark text-decoration-none"><a class="btn btn-brown-open" href="{{ route('register') }}" class="dropdown-item">Cadastrar</a></li>
              </ul>
              <li class="nav-link text-decoration-none">
                <a href="{{ route('cart.index') }}" class="">
                  <span><i class="bi bi-cart me-5"></i></span>
                </a>
              </li>
                @endif
            </ul>
  
          </div>
  
      </div>
  
  </div>

</div>