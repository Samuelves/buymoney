<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
class ConverterBuyController extends Controller
{
   public function index()
   {
      $payment_methods = PaymentMethod::all();
      return view('converterbuy', compact('payment_methods'));
   }
}
