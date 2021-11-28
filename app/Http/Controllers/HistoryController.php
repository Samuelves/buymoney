<?php

namespace App\Http\Controllers;
use App\Http\Interfaces\IHistory;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    private $historyRegister;
    public function __construct(IHistory $historyRegister)
    {
        $this->historyRegister = $historyRegister;
    }
    public function index()
    {
        $history = $this->historyRegister->getAllHistory();
        return view('history', compact('history'));
    }
}
