<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactureHeader extends Model
{
    protected $table = 'facture_header';
    protected $primaryKey = 'invoiceId';
    public $incrementing = false;
    use HasFactory;

    public function factureDetail(){
        return $this->hasMany(FactureDetail::class, 'invoiceId', 'invoiceId');
    }

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'id');
    }
}
