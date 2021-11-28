<?php

namespace App\Application\Interfaces;
use App\Models\History;
interface IHistory
{
  public function findAll(History $history);
  public function save(History $history, array $data);
}