<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Interfaces\ICoins;
use App\Http\Interfaces\IQuotation;
class ConverterBuyController extends Controller
{
   private $coinsRegister;
   private $quotationRegister;
   public function __construct(ICoins $coinsRegister, IQuotation $quotationRegister)
   {
      $this->coinsRegister = $coinsRegister;
      $this->quotationRegister = $quotationRegister;
   }
   public function index()
   {
      $coins = $this->coinsRegister->getCoins();
      return view('converterbuy', compact('coins'));
   }
   public function quotation(Request $request)
   {
      $quotation = $this->quotationRegister->getQuotation($request);
      return response()->json($quotation['data'], $quotation['status']);
   }
}
