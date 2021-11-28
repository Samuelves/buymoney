<?php

namespace App\Infra\InternalData;

use App\Application\Interfaces\IHistory;
use App\Models\History;

class HistoryRepository implements IHistory
{
    public function findAll(History $history)
    {
        return $history::paginate(10);
    }
    public function save(History $history, array $data)
    {
        return $history::create($data);
    }
}