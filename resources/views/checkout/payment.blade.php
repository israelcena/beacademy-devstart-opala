<x-app-layout>
    
    @include('layouts.header')

    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        @endif
    </div>

    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center">PAGAMENTO</h1>
                <p class="lead text-center"><small>Cartão de Crédito</small></p>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="card-number">Número do Cartão</label>
                        <input type="text" class=" number_card form-control" id="card-number" name="card-number" placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="form-group">
                        <label for="card-expiry-month">Mês de Validade</label>
                        <input type="text" class="expire_month form-control" id="card-expiry-month" name="card-expiry-month" placeholder="MM">
                    </div>
                    <div class="form-group">
                        <label for="card-expiry-year">Ano de Validade</label>
                        <input type="text" class="expire_year form-control" id="card-expiry-year" name="card-expiry-year" placeholder="YYYY">
                    </div>
                    <div class="form-group">
                        <label for="card-cvc">Código de Segurança</label>
                        <input type="text" class="cvv form-control" id="card-cvc" name="card-cvc" placeholder="CVC">
                    </div>
                    <div class="form-group">
                        <label for="card-name">Nome no Cartão</label>
                        <input type="text" class="name_card form-control" id="card-name" name="card-name" placeholder="Nome no Cartão">
                    </div>
                    <div class="form-group">
                        <label for="total-payement">Total</label>
                        <input type="text" class="total_payement form-control" id="total-payement" name="total-payement" placeholder="Total">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Pagar</button>

                    
                </form>
            </div>


        </div>





</x-app-layout>