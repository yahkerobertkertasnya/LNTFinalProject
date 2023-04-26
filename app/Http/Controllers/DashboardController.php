<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){

        $items = Item::orderBy('created_at', 'desc')->paginate(5);
        $category = Category::all();

        return view('pages.dashboard', [
            'items' => $items,
            'category' => $category
        ]);
    }

    public function dashboardAdmin(){

        $items = Item::orderBy('created_at', 'desc')->paginate(5);
        $category = Category::all();

        return view('pages.admin-dashboard', [
            'items' => $items,
            'category' => $category
        ]);
    }
}
