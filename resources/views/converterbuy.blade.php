@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Converter/Comprar') }}</div>
                <div class="card-body">
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
                    <div class="alert" role="alert" id="alert">
                        <span id="alert-message"></span>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="col-md-8" id="cardResult" style="display: none;">
            <div class="card">
                <div class="card-header">{{ __('Resultado') }}</div>
                <div class="card-body">
                    <div class="text-center">
                    <span>Moeda de origem <p>BRL<p></span>
                    <span>Moeda de destino <p id="result_coin_to"></p></span>
                    Valor para conversão <p id="result_value"></p>
                    Forma de pagamento <p id="payment_method"></p>
                    Valor da "Moeda de destino" usado para conversão <p id="result_price_coin_to"></p>
                    Valor comprado em "Moeda de destino" <p id="result_value_coin_to"></p>
                    Taxa de pagamento <p id="result_value_tax_payment"></p>
                    Taxa de conversão <p id="result_value_tax_q"></p>
                    Valor utilizado para conversão descontando as taxas <p id="result_value_tax"></p>
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
        let paymentMethod = document.querySelector('#paymentMethodSelect').value;
        let _token   = $('meta[name="csrf-token"]').attr('content');
        let cardResult = document.querySelector('#cardResult')
        document.querySelector('#result_coin_to').textContent = coinTo;
        document.querySelector('#result_value').textContent = value;
        document.querySelector('#payment_method').textContent = paymentMethod;
        let result_price_coin_to = document.querySelector('#result_price_coin_to');
        let result_value_coin_to = document.querySelector('#result_value_coin_to');
        let result_value_tax_payment = document.querySelector('#result_value_tax_payment');
        let result_value_tax_q = document.querySelector('#result_value_tax_q');
        let result_value_tax = document.querySelector('#result_value_tax');
        let alert = document.querySelector('#alert')
        let alert_message = document.querySelector('#alert-message')
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
        .then(async function(response) {
            const result = await response.json();
            if (!response.ok) {
                alert.classList.add('alert-danger');
                alert_message.textContent = result.error;
                return;
            }
            cardResult.style.display = 'block';
            alert.style.display = 'none';
            result_price_coin_to.textContent = result.CoinToValue;
            result_value_coin_to.textContent = result.valueTo.toFixed(2);
            result_value_tax_payment.textContent = result.paymentTax.toFixed(2);
            result_value_tax_q.textContent = result.converterTax.toFixed(2);
            result_value_tax.textContent = result.valueWithTaxes.toFixed(2);
        })
        .catch(async function(error) {
            
            alert.classList.add('alert-danger');
            alert_message.textContent = 'Erro ao gerar a cotação!';
        });
  }

     
</script>
@endsection
