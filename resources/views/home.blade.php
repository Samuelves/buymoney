@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Taxes') }}</div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('converterbuy') }}" class="list-group-item list-group-item-action">
                            Converter/Comprar
                        </a>
                        <a href="{{ route('history') }}" class="list-group-item list-group-item-action">Histórico</a>
                        <a href="#" class="{{ route('taxes') }}">Taxas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
