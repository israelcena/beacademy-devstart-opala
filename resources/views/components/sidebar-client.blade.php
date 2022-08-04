<div class="container-fluid">
    <div class="row align-middle">
        <h2 class=" text-center mt-3">Minha conta</h2>
    </div>
    <hr>
    <div class="row d-flex">
        <div class="navbar">  
            <div class="container justify-content-center">
                <ul class="navbar-nav w-100 text-center">
                    <li class="nav-item  border-bottom">
                        <a class="nav-link" href="{{ route('users.showDetails', $selectUser->id) }}">
                            <span>
                                <i class="bi bi-bag-check-fill"></i>
                            </span>
                            Meu Perfil
                        </a>
                    </li>
                    <li class="nav-item  border-bottom">
                        <a class="nav-link" href="{{ route('orders.historic', $selectUser->id) }}">
                            <span>
                                <i class="bi bi-people-fill"></i>
                            </span>
                            Meus pedidos
                        </a>
                    </li>
                </ul>
            </div>
         </div>
    </div>
</div>