<?php

namespace App\Http\Interfaces;
use Illuminate\Http\Request;

interface ITaxes
{
  public function getTaxes();
  public function saveTaxes(Request $request);
}