<?php

namespace App\Infra\InternalData;

use App\Application\Interfaces\ITaxes;
use App\Models\Taxes;

class TaxesRepository implements ITaxes
{
    public function findTaxes(Taxes $taxes)
    {
        return $taxes::get()->first();
    }
    public function update(Taxes $taxes)
    {
        return $taxes->save();
    }
    public function save(Taxes $taxes, array $data)
    {
        return $taxes::create($data);
    }
}