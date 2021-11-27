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
                            <input type="text" name="coinBase" id="coinBase" class="form-control" placeholder="BRL" value="BRL" readonly>
                        </div>
                        <div class="form-group">
                            <label for="coinTo">Moeda Destino</label>
                            <select name="coinTo" id="coinTo" class="form-control">
                                @foreach($coins as $key => $coin)
                                    <option value="{{$key}}">{{$coin}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="valueToConverter">Valor</label>
                            <input type="number" name="value" id="value" value="900" min="900" max="900000" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" id="valueToConverter" />
                        </div>
                        <div class="form-group">
                            <label for="paymentMethod">Forma de Pagamento</label>
                            <select name="paymentMethodSelect" id="paymentMethodSelect" class="form-control">
                                <option value="boleto">Boleto</option>
                                <option value="card">Cartão de Crédito</option>
                            </select>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="button" onClick="sendQuotation()">Comprar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

  const sendQuotation = () => {
        let coinBase = document.querySelector('#coinBase').value;
        let coinTo = document.querySelector('#coinTo').value;
        let value = document.querySelector('#value').value;
        let paymentMethod = document.querySelector('#paymentMethodSelect').value;;
        let _token   = $('meta[name="csrf-token"]').attr('content');

      fetch('/quotation', {
          method: 'POST',
          headers: {
              'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _token
            },
            body: JSON.stringify({
                coinBase,
                coinTo,
                value,
                paymentMethod
            })
        })
        .then(function(response) {
            return response.json();
        })
        .catch(function(error) {
            console.log(error);
        });
  }

     
</script>
@endsection
