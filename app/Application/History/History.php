<?php

namespace App\Application\History;

use App\Http\Interfaces\IHistory;
use App\Infra\InternalData\HistoryRepository;
use Illuminate\Http\Request;
use App\Models\History as HistoryModel;
class History implements IHistory
{
    private $historyRepository;
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }
    public function getAllHistory()
    {
        return $this->historyRepository->findAll(new HistoryModel());
    }
}