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
                            <input type="text" id="valueToConverter" class="form-control" placeholder="12,90" required>
                        </div>
                        <div class="form-group">
                            <label for="paymentMethod">Forma de Pagamento</label>
                            <select id="paymentMethod" class="form-control">
                                <option>Select padrão</option>
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
