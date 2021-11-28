<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $fillable = ['coin_base', 'coin_to', 'value', 'value_with_taxes', 'payment_tax', 'converter_tax', 'destination_coin_value', 'value_new'];
}
