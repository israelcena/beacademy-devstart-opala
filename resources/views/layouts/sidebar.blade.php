<div class="container-fluid min-vh-100">
    <div class="row align-middle">
        <h2 class="fs-5 text-center mt-3">Painel de controle</h2>
    </div>
    <hr>
    <div class="row d-flex">
        <div class="navbar">  
            <div class="container justify-content-center">
                <ul class="navbar-nav w-100 text-center">
                    <li class="nav-item fs-5 border-bottom">
                        <a class="nav-link" href="/admin/produtos">
                            <span>
                                <i class="bi bi-bag-check-fill"></i>
                            </span>
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item fs-5 border-bottom">
                        <a class="nav-link" href="{{ route('admin.users') }}">
                            <span>
                                <i class="bi bi-people-fill"></i>
                            </span>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item fs-5 border-bottom">
                        <a class="nav-link" href="{{ route('admin.orders') }}">
                            <span>
                                <i class="bi bi-cart-check-fill"></i>
                            </span>
                            Pedidos
                        </a>
                    </li>
                </ul>
            </div>
         </div>
    </div>
  </div>