<?php

namespace App\Application\Taxes;

use App\Http\Interfaces\ITaxes;
use App\Infra\InternalData\TaxesRepository;
use App\Models\Taxes as TaxesModel;
use Illuminate\Http\Request;

class Taxes implements ITaxes
{
  private $taxeRepository;
  public function __construct(TaxesRepository $taxeRepository)
  {
    $this->taxeRepository = $taxeRepository;
  }
  public function getTaxes(){
    return $this->taxeRepository->findTaxes(new TaxesModel);
  }
  public function saveTaxes(Request $request){
    $taxeModel = new TaxesModel;
    $taxe = $this->taxeRepository->findTaxes($taxeModel);
    if(!empty($exists)){
      return $this->taxeRepository->save($taxeModel, $request->all());
    }
    $taxe->tax_boleto = $request['tax_boleto'];
    $taxe->tax_card = $request['tax_card'];
    return $this->taxeRepository->update($taxe);
  }
}