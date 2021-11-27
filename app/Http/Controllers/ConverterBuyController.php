<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ConverterBuyController extends Controller
{
   public function index()
   {
      $coinsRequest = Http::get('https://economia.awesomeapi.com.br/json/available/uniq');
      $coins = $coinsRequest->json();
     
      return view('converterbuy', compact('coins'));
   }
   public function quotation(Request $request)
   {
      if($request['paymentMethod'] == 'boleto'){
         $payment_tax = (1.37 / 100) * $request['value'];
      }
      if($request['paymentMethod'] == 'card'){
         $payment_tax = (7.73 / 100) * $request['value'];
      }
      $converter_tax = 0;
      if($request['value'] < 2700){
         $converter_tax = (2 / 100) * $request['value'];
      }
      if($request['value'] > 4000){
         $converter_tax = (1 / 100) * $request['value'];
      }
      $valueToConverter = $request['value'] - $payment_tax - $converter_tax;

      $response = Http::get('https://economia.awesomeapi.com.br/json/last/'.$request['coinTo'].'-'.$request['coinBase']);

      $response = $response->json($request['coinTo'] . $request['coinBase']);
     
      $valueNew = $valueToConverter / $response['bid'];
      
      return response()->json([
         'valueToConverter' => $valueToConverter,
         'valueNew' => $valueNew,
         'payment_tax' => $payment_tax,
         'converter_tax' => $converter_tax,
         'destination_coin_value' => $response['bid'],
         'value' => $request['value']
      ]);

   }
}
