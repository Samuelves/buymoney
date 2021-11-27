@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Converter/Comprar') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="text-center">
                        <form class="form-signin">
                        <div class="form-group">
                            <label for="coinBase">Moeda Base</label>
                            <input type="text" id="coinBase" class="form-control" placeholder="BRL" value="BRL" readonly>
                        </div>
                        <div class="form-group">
                            <label for="coinTo">Moeda Destino</label>
                            <input type="text" id="coinTo" class="form-control" placeholder="USD" required>
                        </div>
                        <div class="form-group">
                            <label for="valueToConverter">Valor</label>
                            <input type="number" value="900" min="900" max="900000" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" id="valueToConverter" />
                        </div>
                        <div class="form-group">
                            <label for="paymentMethod">Forma de Pagamento</label>
                            <select id="paymentMethod" class="form-control">
                                @foreach ($payment_methods as $payment_method)
                                    <option value="{{ $payment_method->id }}">{{ $payment_method->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
