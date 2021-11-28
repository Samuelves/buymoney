<?php

namespace App\Http\Interfaces;
use Illuminate\Http\Request;

interface IQuotation
{
  public function getQuotation(Request $request);
}