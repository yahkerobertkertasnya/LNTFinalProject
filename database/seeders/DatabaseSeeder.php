<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\FactureHeader;
use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use function Illuminate\Events\queueable;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userId = 'US00000';

        $newUser = new User();
        $newUser->id = ("myAdmin");
        $newUser->name = 'Yahkerobertkertasnya';
        $newUser->email = 'obet@gmail.com';
        $newUser->password = bcrypt('bruh');
        $newUser->handphone = '087888888889';
        $newUser->isAdmin = true;
        $newUser->created_at = Carbon::now();
        $newUser->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = '30969' . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = ("myAdmin");
        $factureHeader->address = "Binus University";
        $factureHeader->postalCode = '12312';
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        $newUser = new User();
        $newUser->id = (++$userId);
        $newUser->name = 'Shane Alan Hartono';
        $newUser->email = 'sen@gmail.com';
        $newUser->password = bcrypt('iloveregina');
        $newUser->handphone = '087888888888';
        $newUser->isAdmin = false;
        $newUser->created_at = Carbon::now();
        $newUser->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = substr($userId, 2, 8) . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = $userId;
        $factureHeader->address = "Binus University";
        $factureHeader->postalCode = '12312';
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        $newUser = new User();
        $newUser->id = (++$userId);
        $newUser->name = 'Regina Lo';
        $newUser->email = 'regina@gmail.com';
        $newUser->password = bcrypt('iloveshane');
        $newUser->handphone = '087888888888';
        $newUser->isAdmin = false;
        $newUser->created_at = Carbon::now();
        $newUser->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = substr($userId, 2, 8) . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = $userId;
        $factureHeader->address = "Binus University";
        $factureHeader->postalCode = '12312';
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        $newUser = new User();
        $newUser->id = (++$userId);
        $newUser->name = 'Nobel Shan Setiono';
        $newUser->email = 'SN@gmail.com';
        $newUser->password = bcrypt('ilovetali');
        $newUser->handphone = '087888888888';
        $newUser->isAdmin = false;
        $newUser->created_at = Carbon::now();
        $newUser->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = substr($userId, 2, 8) . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = $userId;
        $factureHeader->address = "Binus University";
        $factureHeader->postalCode = '12312';
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        $newUser = new User();
        $newUser->id = (++$userId);
        $newUser->name = 'Michael Alvin Setiono';
        $newUser->email = 'NO@gmail.com';
        $newUser->password = bcrypt('ilovetidur');
        $newUser->handphone = '087888888888';
        $newUser->isAdmin = false;
        $newUser->created_at = Carbon::now();
        $newUser->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = substr($userId, 2, 8) . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = $userId;
        $factureHeader->address = "Binus";
        $factureHeader->postalCode = '12312';
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        $categoryId = 'CT0000';

        $newCategory = new Category();
        $newCategory->id = (++$categoryId);
        $newCategory->name = 'Vegetables';
        $newCategory->created_at = Carbon::now();
        $newCategory->save();

        $newCategory = new Category();
        $newCategory->id = (++$categoryId);
        $newCategory->name = 'Fruit';
        $newCategory->created_at = Carbon::now();
        $newCategory->save();

        $newCategory = new Category();
        $newCategory->id = (++$categoryId);
        $newCategory->name = 'Candy';
        $newCategory->created_at = Carbon::now();
        $newCategory->save();

        $newCategory = new Category();
        $newCategory->id = (++$categoryId);
        $newCategory->name = 'Seafood';
        $newCategory->created_at = Carbon::now();
        $newCategory->save();

        $newCategory = new Category();
        $newCategory->id = (++$categoryId);
        $newCategory->name = 'Liquor';
        $newCategory->created_at = Carbon::now();
        $newCategory->save();

        $itemId = 'IT0000';

        $newItem = new Item();
        $newItem->id = (++$itemId);
        $newItem->categoryId = 'CT0001';
        $newItem->name = 'Onion';
        $newItem->price = 50000;
        $newItem->stock = 666;
        $newItem->picture = 'onion.png';
        $newItem->created_at = Carbon::now();
        $newItem->save();

        $newItem = new Item();
        $newItem->id = (++$itemId);
        $newItem->categoryId = 'CT0002';
        $newItem->name = 'Berry';
        $newItem->price = 15000;
        $newItem->stock = 12000;
        $newItem->picture = 'berry.png';
        $newItem->created_at = Carbon::now();
        $newItem->save();

        $newItem = new Item();
        $newItem->id = (++$itemId);
        $newItem->categoryId = 'CT0004';
        $newItem->name = 'Glow Squid';
        $newItem->price = 1500;
        $newItem->stock = 8000;
        $newItem->picture = 'glowing-squid.png';
        $newItem->created_at = Carbon::now();
        $newItem->save();

        $newItem = new Item();
        $newItem->id = (++$itemId);
        $newItem->categoryId = 'CT0004';
        $newItem->name = 'Blood Fish';
        $newItem->price = 50002;
        $newItem->stock = 500;
        $newItem->picture = 'blood-fish.png';
        $newItem->created_at = Carbon::now();
        $newItem->save();

        $newItem = new Item();
        $newItem->id = (++$itemId);
        $newItem->categoryId = 'CT0005';
        $newItem->name = 'Bone Vodka';
        $newItem->price = 99999;
        $newItem->stock = 1;
        $newItem->picture = 'bone-vodka.png';
        $newItem->created_at = Carbon::now()->addHour();
        $newItem->save();

    }
}
