<?php

namespace App\Application\Interfaces;
use App\Models\Taxes;
interface ITaxes
{
    public function findTaxes(Taxes $taxes);
    public function update(Taxes $taxes);
    public function save(Taxes $taxes, array $data);
}