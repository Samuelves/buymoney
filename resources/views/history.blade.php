@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('History') }}</div>
                <div class="card-body">
                    <div class="container mt-5">
                        <table class="table table-bordered mb-5">
                            <thead>
                                <tr class="table-success">
                                    <th scope="col">#</th>
                                    <th scope="col">Moeda Base</th>
                                    <th scope="col">Moeda Destino</th>
                                    <th scope="col">Valor Base</th>
                                    <th scope="col">Valor Base (Com Taxas)</th>
                                    <th scope="col">Taxa de Pagamento</th>
                                    <th scope="col">Taxa de Conversão</th>
                                    <th scope="col">Valor da Moeda Destino</th>
                                    <th scope="col">Valor Convertido</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $data)
                                    <tr>
                                        <th scope="row">{{$data->id}}</th>
                                        <td>{{$data->coin_base}}</td>
                                        <td>{{$data->coin_to}}</td>
                                        <td>{{ number_format($data->value, 2, ',', '.')}}</td>
                                        <td>{{ number_format($data->value_with_taxes, 2, ',', '.')}}</td>
                                        <td>{{ number_format($data->payment_tax, 2, ',', '.')}}</td>
                                        <td>{{ number_format($data->converter_tax, 2, ',', '.')}}</td>
                                        <td>{{ number_format($data->destination_coin_value, 2, ',', '.')}}</td>
                                        <td>{{ number_format($data->value_new, 2, ',', '.')}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $history->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
