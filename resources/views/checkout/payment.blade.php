<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
    @section('scripts')
    <script type="text/javascript"
        src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
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
                console.log(hash);
            });

            let numeroCartao = $(this).val();
            $('.bandeira').val('');
            if (numeroCartao.length > 6) {
                let prefixCartao = numeroCartao.substr(0, 6);
                PagSeguroDirectPayment.getBrand({
                    cardBin: prefixCartao,
                    success: function(response) {
                        $('.bandeira').val(response.brand.name);
                    },
                    error: function(response) {
                        alert('Erro ao identificar bandeira do cartão.');
                        $('.bandeira').val('');
                    }
                });
            }
        });

        $(".nparcela").on('blur', function() {
            var bandeira = $('.bandeira').val();
            if (bandeira == "") {
                alert('Por favor, preencha o número do cartão válido.');
            }

            var totalParcelas = $(this).val();

            PagSeguroDirectPayment.getInstallments({
                amount: $(".valortotal").val(),
                maxInstallmentNoInterest: 2,
                brand: bandeira,
                success: function(response) {
                    console.log(response);
                    let status = response.error;
                    if (status) {
                        alert('Erro ao calcular parcelas');
                        return;
                    }
                    let indice = totalParcelas - 1;
                    let totalapagar = response.installments[bandeira][indice].totalAmount;
                    let valorTotalParcela = response.installments[bandeira][indice]
                        .installmentAmount;

                    $(".totalparcela").val(valorTotalParcela);
                    $(".totalapagar").val(totalapagar);
                },
            })
        });

        $(".pagar").on('click', function() {

            var numeroCartao = $('.number_card').val();
            var inicioCartao = numeroCartao.substr(0, 6);
            var cvv = $('.cvv').val();
            var expire_month = $('.expire_month').val();
            var expire_year = $('.expire_year').val();
            // var nomeCartao = $('.nome_card').val();
            var hash = $('.hashseller').val();
            var bandeira = $('.bandeira').val();


            PagSeguroDirectPayment.createCardToken({
                cardNumber: numeroCartao,
                brand: bandeira,
                cvv: cvv,
                expirationMonth: expire_month,
                expirationYear: expire_year,
                success: function(response) {
                    $.post("{{ route('order.checkoutstore') }}", {
                        hashseller: hash,
                        cardtoken : response.card.token,
                        nparcela: $('.nparcela').val(),
                        totalapagar: $('.totalapagar').val(),
                        totalparcela: $('.totalparcela').val(),
                        // console.log(response);
                    }, function(result) {
                        alert(result);
                    });
                    console.log(response);
                    console.log(response.card.token);
                    console.log(PagSeguroDirectPayment);

                },
                error: function(err) {
                    alert('Erro ao criar token do cartão. Verifique os dados.');
                    console.log(err);
                }
            });
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
        <form action="{{ route('order.checkoutstore') }}" method="POST">
            @csrf
            @method('POST')
            <div class="row col-md-12">

                <div class="col-md-5">
                    <h3 class="text-center text-secondary fs-3">Dados para pagamento</h3>
                    <p class="lead text-center text-secondary"><small>Cartão de Crédito</small></p>
                    <input type="hidden" name="hashseller" class="hashseller">
                    <input type="hidden" name="bandeira" class="bandeira">
                    <div class="form-group mb-3 col-md-12">
                        <label for="payment">Método de pagamento</label>
                        <select class="form-control" id="payment" name="payment" required>
                            <option value="">Selecione</option>
                            <option value="CreditCard">Cartão de Crédito</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-number">Número do Cartão</label>
                        <input type="text" class="number_card form-control" id="card-number" name="card-number"
                            placeholder="0000 0000 0000 0000">
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-expiry-month">Mês de Validade</label>
                        <input type="text" class="expire_month form-control" id="card-expiry-month"
                            name="card-expiry-month" placeholder="MM">
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-expiry-year">Ano de Validade</label>
                        <input type="text" class="expire_year form-control" id="card-expiry-year"
                            name="card-expiry-year" placeholder="YYYY">
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-cvc">Código de Segurança</label>
                        <input type="text" class="cvv form-control" id="card-cvc" name="card-cvc" placeholder="CVC">
                    </div>
                    <div class="form-group mb-3">
                        <label for="card-name">Nome no Cartão</label>
                        <input type="text" class="name_card form-control" id="card-name" name="card-name"
                            placeholder="Nome no Cartão">
                    </div>
                    <div class="form-group mb-3">
                        <label for="nparcela">Número de parcelas</label>
                        <input type="text" class="nparcela form-control" id="nparcela" name="nparcela"
                            placeholder="Quantidade de parcelas">
                    </div>
                    <div class="form-group mb-3">
                        <label for="valortotal">Total</label>
                        <input type="text" class="valortotal form-control" id="valortotal" name="valortotal"
                            placeholder="Total" value="{{ $total }}" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="totalparcela">Valor das parcelas</label>
                        <input type="text" class="totalparcela form-control" id="totalparcela" name="totalparcela"
                            placeholder="" readonly>
                    </div>
                    <div class="form-group mb-3">
                        <label for="totalapagar">Total a Pagar</label>
                        <input type="text" class="totalapagar form-control" id="totalapagar" name="totalapagar"
                            placeholder="" readonly>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block mt-3 pagar" value="Comprar">
                </div>

                <div class="col-md-5 mx-auto">
                    <h3 class="text-center text-secondary fs-3 mb-5">Resumo da compra</h1>
                    <table class="table text-center table-warning">
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
                                <td>R$ @money(($item['quantity']) * ($item['price']))</td>
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