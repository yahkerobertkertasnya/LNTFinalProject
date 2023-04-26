<?php

namespace App\Http\Controllers;

use App\Models\FactureHeader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginPage(){
        return view('pages.login');
    }
    public function registerPage(){
        return view('pages.register');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password'=>$request->password])){
            $user = Auth::user();
            session(['user' => $user]);
            session(['invoice' => FactureHeader::where('userId', '=', $user->getAttributes()['id'])->first()->getAttributes()['invoiceId']]);
            if($user->isAdmin) return redirect('dashboard-admin');
            else return redirect('dashboard');

        }
        return back();
    }

    public function register(Request $request){


        $request->validate([
            'username'=>'required|min:3|max:40',
            'email'=>'required|regex:/(.*)@gmail\.com/',
            'handphone'=>'required|regex:/^08/|max:12',
            'password'=>'required|min:6|max:12',
            'confirm-password'=>'required|min:6|max:12'
        ]);

        if(str_word_count($request->username) < 3){
            return back()->withErrors('the username field must contain at least 3 words!');
        }

        $latest = User::latest('created_at')->first();

        $id = "";

        if(is_null($latest) or substr($latest->getAttributes()['id'], 0, 2) !== 'US'){
            $id = "US00000";
        }
        else{
            $id = ++$latest->getAttributes()['id'];
        }

        $user = new User();
        $user->id = $id;
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->handphone = $request->handphone;
        $user->created_at = Carbon::now();
        $user->save();

        $year = substr(Carbon::now()->year, 2, 4);
        $orderNo = substr($id, 2, 8) . mt_rand(100, 999);

        $factureHeader = new FactureHeader();
        $factureHeader->invoiceId = '000.309-' . $year . '.' . $orderNo;
        $factureHeader->userId = $id;
        $factureHeader->created_at = Carbon::now();
        $factureHeader->save();

        return back();
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('login')->withSuccess('Logged out successfully!');
    }
}
