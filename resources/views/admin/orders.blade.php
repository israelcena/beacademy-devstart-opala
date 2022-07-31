<x-app-layout>
    <div>
        @include('layouts.navbar')
    </div>
   
    <div class="row">

        <div class="col-md-2 shadow-lg bg-light min-h-100">
            @include('layouts.sidebar')
        </div>
        <div class="col-md-10 mt-5">
            <div class="container">
                <div class="container">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <h1 class="mb-3">Lista dos pedidos</h1>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Data do pedido</th>
                                    <th>Cliente</th>
                                    <th>Status</th>
                                    {{-- <th>Valor</th> --}}
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listOrders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                        <td>{{$order->user->name}}</td>
                                        <td>{{$order->status}}</td>
                                        {{-- <td>{{$order->total}}</td> --}}
                                        <td>
                                            <a href="{{route('admin.orders.show', $order->id)}}" class="btn btn-sm btn-primary">Ver</a>
                                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach


</x-app-layout>