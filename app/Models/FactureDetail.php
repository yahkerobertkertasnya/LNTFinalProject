<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureDetail extends Model
{
    protected $table = 'facture_detail';

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('itemId', '=', $this->getAttribute('itemId'))
            ->where('invoiceId', '=', $this->getAttribute('invoiceId'));

        return $query;
    }

    use HasFactory;

    public function item(){
        return $this->belongsTo(Item::class, 'itemId', 'id');
    }
    public function factureHeader(){
        return $this->belongsTo(FactureHeader::class, 'invoiceId', 'invoiceId');
    }
}
