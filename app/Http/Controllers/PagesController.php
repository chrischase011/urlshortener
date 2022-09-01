<?php

namespace App\Http\Controllers;

use App\Models\Links;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function index($token = null)
    {
        if($token)
        {
            $data = Links::where(['token' => $token])->first();

            if($data)
            {
                return Redirect::to($data->url);
            }
            else{
                return redirect()->intended('/');
            }
            
           
        }
            
        return view('pages.index');
    }

    public function generate(Request $request)
    {
        $url = $request->url;

        if(!$url || $url == "")
            return redirect()->intended('/');

        $token = $this->Token();

        Links::create([
            'url' => $url,
            'token' => $token
        ]);

        
        return view('pages.generate', ['token' => request()->root().'/'.$token]);
    }

    protected function Token()
    {
        $str = $this->RandomString();
        $check = Links::where(['token' => $str])->first();

        if($check)
            $this->Token();

        return $str;
    }

    protected function RandomString(int $length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
