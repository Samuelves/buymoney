<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ITaxes;
use Illuminate\Http\Request;

class TaxesController extends Controller
{
    private $taxeRegister;
    public function __construct(ITaxes $taxeRegister)
    {
        $this->taxeRegister = $taxeRegister;
    }
    public function index()
    {
        $taxes = $this->taxeRegister->getTaxes();
        return view('taxes', compact('taxes'));
    }
    public function save(Request $request)
    {
        $this->taxeRegister->saveTaxes($request);
    }
}
