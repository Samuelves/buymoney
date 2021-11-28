<?php

namespace App\Infra\ExternalData;

use App\Application\Interfaces\IQuotation;
use Illuminate\Support\Facades\Http;

class QuotationRepository implements IQuotation
{
  public function getQuotation($coinBase, $coinTo)
  {
    $response = Http::get('https://economia.awesomeapi.com.br/json/last/'.$coinTo.'-'.$coinBase);
    return $response->json($coinTo . $coinBase);
  }
}