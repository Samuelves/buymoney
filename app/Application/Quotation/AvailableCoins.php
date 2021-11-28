<?php

namespace App\Application\Quotation;

use App\Http\Interfaces\ICoins;
use App\Infra\ExternalData\CoinsRepository;


class AvailableCoins  implements ICoins
{
  private $coinsRepository;
  public function __construct(CoinsRepository $coinsRepository)
  {
    $this->coinsRepository = $coinsRepository;
  }
  public function getCoins()
  {
    $coins = $this->coinsRepository->getCoins();
    return $coins;
  }
}