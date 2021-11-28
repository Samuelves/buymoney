<?php

namespace App\Application\Quotation;

use App\Http\Interfaces\IQuotation;
use App\Infra\ExternalData\QuotationRepository;
use Illuminate\Http\Request;

class Quotation  implements IQuotation
{
  private $quotationRepository;
  public function __construct(QuotationRepository $quotationRepository)
  {
    $this->quotationRepository = $quotationRepository;
  }
  public function getQuotation(Request $request)
  {
    try{
        $payment_tax = $this->verifyPaymentMethod($request['paymentMethod'], $request['value']);
    }catch(\Exception $e){
        return [
          'data' => ['error' => $e->getMessage()],
          'status' => 400
        ];
    }
    $converter_tax = $this->getValueWithTaxes($request['value']);
    $value_with_taxes = $this->calculateTaxes($request['value'],$payment_tax, $converter_tax);
    try{
        $quotation = $this->quotationRepository->getQuotation($request['coinBase'],$request['coinTo']);
        $valueNew = $this->getNewValue($value_with_taxes, $quotation['bid']);
    }catch(\Exception $e){
        return [
          'data' => ['error' => 'Não foi possível converter para moeda selecionada'],
          'status' => 400
        ];
    }
    return [
      'data' => [
        'coinBase' => $request['coinBase'],
        'coinTo' => $request['coinTo'],
        'value' => $request['value'],
        'paymentMethod' => $request['paymentMethod'],
        'CoinToValue' => $quotation['bid'],
        'valueTo' => $valueNew,
        'paymentTax' => $payment_tax,
        'converterTax' => $converter_tax,
        'valueWithTaxes' => $value_with_taxes
    ],
      'status' => 200
    ];
  }
  private function verifyPaymentMethod(string $paymentMethod, $price)
  {
    if($paymentMethod != 'boleto' && $paymentMethod != 'card'){
      throw new \Exception('Payment method not found');
    }
    if($paymentMethod == 'boleto'){
      return (1.37 / 100) * $price;
    }
    if($paymentMethod == 'card'){
      return (7.73 / 100) * $price;
    }
  }
  private function getValueWithTaxes($price)
  {
    if($price < 2700){
        return (2 / 100) * $price;
    }
    if($price > 4000){
        return (1 / 100) * $price;
    }
  }
  private function calculateTaxes($price, $payment_tax,$converter_tax )
  {
    return $price - $payment_tax - $converter_tax;
  }
  private function getNewValue($value_with_taxes, $bid )
  {
    return $value_with_taxes / $bid;
  }
}