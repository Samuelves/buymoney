<?php

namespace App\Application\Interfaces;

interface IQuotation
{
  public function getQuotation($coinBase, $coinTo);
}