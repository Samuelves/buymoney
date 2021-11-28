<?php

namespace App\Infra\ExternalData;

use App\Application\Interfaces\ICoins;
use Illuminate\Support\Facades\Http;
class CoinsRepository implements ICoins
{
  public function getCoins()
  {
    $coinsRequest = Http::get('https://economia.awesomeapi.com.br/json/available/uniq');
    return $coinsRequest->json();
  }
}