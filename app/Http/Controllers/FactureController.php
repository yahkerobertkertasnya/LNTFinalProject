<?php

namespace App\Http\Controllers;

use App\Models\FactureDetail;
use App\Models\FactureHeader;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function view(){
        $facture = FactureHeader::where('userId', '=', session('user')->getAttributes()['id'])->get()->first();
//        dd($facture);
        return view('pages.facture', ['facture' => $facture]);
    }

    public function addFactureItem(Request $request){
        $factureDetail = new FactureDetail();
        $factureDetail->invoiceId = session('invoice');
        $factureDetail->itemId = $request->itemId;
        $factureDetail->quantity = 1;
        $factureDetail->created_at = Carbon::now();
        $factureDetail->save();

        $item = Item::find($request->itemId);
        $item->stock = --$item->stock;
        $item->save();

        return back()->withSuccess('Item added to facture successfully!');
    }

    public function updateFacture(Request $request){

        $request->validate([
            'address'=>'required|min:10|max:100',
            'postalCode'=>'required|regex:/^[0-9]{5}$/'
        ]);

        $factures = FactureHeader::find(session('invoice'));

//        dd($factures);
        if(isset($factures->factureDetail)){
            foreach($factures->factureDetail as $facture){
                $attribute = 'item-' . $facture->itemId;
                if($request->{$attribute} < 0) return back()->withErrors('Quantity must not be less than 0!');
                if($facture->quantity - $request->{$attribute} + $facture->item->stock < 0) return back()->withErrors('Stock is empty!');
                if($request->{$attribute} == 0){
                    $facture->item->stock += $facture->quantity - $request->{$attribute};
                    $facture->quantity = $request->{$attribute};
                    $facture->item->save();
                    FactureDetail::where('itemId', '=', $facture->itemId)->first()->delete();
                }

                $facture->item->stock += $facture->quantity - $request->{$attribute};
                $facture->quantity = $request->{$attribute};
                $facture->save();
                $facture->item->save();
            }
        }

        $factures->address = $request->address;
        $factures->postalCode = $request->postalCode;
        $factures->save();

        return back()->withSuccess('Facture updated successfully!');
    }
}
