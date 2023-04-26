<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function addItem(Request $request){

        $request->validate([
            'itemName' => 'required|min:5|max:80|string',
            'itemCategory' => 'required|string',
            'itemPrice' => 'required|integer',
            'itemNumber' => 'required|integer',
            'itemPicture' => 'required|mimes:jpg,png'
        ]);

        $file = $request->file('itemPicture');

        $filename = time() . '-' . $file->getClientOriginalName();
        $path = public_path().'\\pictures\\';

        $file->move($path, $filename);

        $latest = Item::latest('created_at')->first();

        $id = "";
        if(is_null($latest)){
            $id = "IT00000";
        }
        else{
            $id = ++$latest->getAttributes()['id'];
        }

        $newItem = new Item();
        $newItem->id = ($id);
        $newItem->categoryId = $request->itemCategory;
        $newItem->name = $request->itemName;
        $newItem->price = $request->itemPrice;
        $newItem->stock = $request->itemNumber;
        $newItem->picture = $filename;
        $newItem->created_at = Carbon::now();
        $newItem->save();

        return back()->withSuccess('Item added to list successfully!');

    }

    public function deleteItem(String $id){
        $item = Item::find($id);

        File::delete('pictures\\' . $item->picture);

        $item->delete();

        return back()->withSuccess('Item deleted successfully!');
    }

    public function updateItem(Request $request){
        $item = Item::find($request->itemId);
//        @dd($item);

        $request->validate([
            'itemName' => 'required|min:5|max:80|string',
            'itemCategory' => 'required|string',
            'itemPrice' => 'required|integer',
            'itemNumber' => 'required|integer',
            'itemPicture' => 'required|mimes:jpg,png'
        ]);

        File::delete('pictures\\' . $item->picture);

        $file = $request->file('itemPicture');

        $filename = time() . '-' . $file->getClientOriginalName();
        $path = public_path().'\\pictures\\';

        $file->move($path, $filename);


        $item->categoryId = $request->itemCategory;
        $item->name = $request->itemName;
        $item->price = $request->itemPrice;
        $item->stock = $request->itemNumber;
        $item->picture = $filename;
        $item->updated_at = Carbon::now();
        $item->save();

        return back()->withSuccess('Item updated successfully!');
    }
}
