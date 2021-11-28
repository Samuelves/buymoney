@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Taxas') }}</div>
                <div class="card-body">
                    <div class="text-center">
                        <form class="form-signin">
                        <div class="form-group">
                            <label for="tax_boleto">Taxa do Boleto</label>
                            <input type="number" name="tax_boleto" id="tax_boleto" value="{{ $taxes->tax_boleto ?? '1.37'}}" min="0" max="100" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tax_card">Taxa do Cartão</label>
                            <input type="number" name="tax_card" id="tax_card" value="{{ $taxes->tax_card ?? '7.73'}}" min="0" max="100" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" />
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="button" onClick="sendTaxes()">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

  const sendTaxes = () => {
        let tax_boleto = document.querySelector('#tax_boleto').value;
        let tax_card = document.querySelector('#tax_card').value;
        let _token   = $('meta[name="csrf-token"]').attr('content');

      fetch('/taxes/save', {
          method: 'POST',
          headers: {
              'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _token
            },
            body: JSON.stringify({
                tax_boleto,
                tax_card
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
