<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
    @section('scripts')
    <script type="text/javascript" src=
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        function carregar() {
            PagSeguroDirectPayment.setSessionId('{{ $sessionID }}');
        }
        $(function() {
            carregar();

            $('.number_card').on('blur', function() {
                PagSeguroDirectPayment.onSenderHashReady(function(response) {
                    if (response.status == 'error') {
                        console.log(response.message);
                    } 
                    
                    var hash = response.senderHash;
                    $('.hashseller').val(hash);
                    
                    }
                );
            });

            $(".nparcela").on('blur', function() {
                var bandeira = 'visa';
                var totalParcelas = $(this).val();

                PagSeguroDirectPayment.getInstallments({
                    amount: $(".valortotal").val(),
                    maxInstallmentNoInterest: 2,
                    brand: bandeira,
                    success: function(response) {
                        console.log(response);
                        let status = response.error;
                        if(status){
                            alert('Erro ao calcular parcelas');
                            return;
                        }
                        let indice = totalParcelas - 1;
                        let totalapagar = response.installments[bandeira][indice].totalAmount;
                        let valorTotalParcela = response.installments[bandeira][indice].installmentAmount;

                        $(".totalparcela").val(valorTotalParcela);
                        $(".totalapagar").val(totalapagar);
                    }
                })
            });

        });

    </script>
    @endsection

    <div class="container">
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            
        @endif
    </div>

    <div class="container mt-5 mb-3">
        <form action="" method="post">
        <div class="row col-md-12">
                @csrf

                <div class="col-md-5">
                    <h1 class="text-center">PAGAMENTO</h1>
                    <p class="lead text-center"><small>Cartão de Crédito</small></p>
                        <input type="text" name="hashseller" class="hashseller">
                        <div class="form-group">
                            <label for="card-number">Número do Cartão</label>
                            <input type="text" class="number_card form-control" id="card-number" name="card-number" placeholder="0000 0000 0000 0000">
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
                            <label for="nparcela">Número de parcelas</label>
                            <input type="text" class="nparcela form-control" id="nparcela" name="nparcela" placeholder="Quantidade de parcelas">
                        </div>
                        <div class="form-group">
                            <label for="valortotal">Total</label>
                            <input type="text" class="valortotal form-control" id="valortotal" name="valortotal" placeholder="Total" value="{{ $total }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalparcela">Valor das parcelas</label>
                            <input type="text" class="totalparcela form-control" id="totalparcela" name="totalparcela" placeholder="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="totalapagar">Total a Pagar</label>
                            <input type="text" class="totalapagar form-control" id="totalapagar" name="totalapagar" placeholder="" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Pagar</button>
                </div>

                <div class="col-md-5 mx-auto"> 
                    <h1 class="text-center mb-5">Resumo da compra</h1>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (@empty($cart))
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum produto no carrinho</td>
                                </tr>
                            
                                @else
                            @foreach($cart as $key => $item)

                                <tr class="text-center align-middle">
                                    <td class="d-flex align-items-center">{{ $item['name'] }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>R$ @money($item['price'])</td>
                                    <td>R$  @money(($item['quantity']) * ($item['price']))</td>     
                                </tr>
                            @endforeach
                            @endif
                            @if (@!empty($cart))
                                <tr>
                                    @php
                                    $total = 0;
                                    foreach($cart as $item) {
                                        $total += ($item['quantity'] * $item['price']);
                                    }
                                    @endphp
                                    <td colspan="3" class="text-right fw-bold">Total dos produtos</td>
                                    <td class="fw-bold">R$ @money($total)</td>
                                    <td></td>
                                </tr>
                            @endif
                    </table>
                </div>
                        
            </form>
        </div>

    </div>





</x-app-layout>