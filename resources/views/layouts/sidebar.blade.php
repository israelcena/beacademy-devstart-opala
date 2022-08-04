<div class="col-md-2 -lg h-100 min-vh-100 menu-sidebar-admin shadow-sm"><div class="container-fluid min-vh-100">
    <div class="row d-flex">
        <div class="navbar">  
            <div class="container justify-content-center">
                <ul class="navbar-nav w-100 text-center">
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="/admin/produtos">
                            <span>
                                <i class="bi bi-bag-check-fill"></i>
                            </span>
                            Produtos
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
                        <a class="nav-link" href="{{ route('admin.users') }}">
                            <span>
                                <i class="bi bi-people-fill"></i>
                            </span>
                            Usuários
                        </a>
                    </li>
                    <li class="nav-item border-bottom">
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
</div>