<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\click;
use App\sayfa;
use DB;

class islem extends Controller
{
    function kaydet($sid,$i,$j,$value)
    {

        $a=DB::select('SELECT * FROM click WHERE sid=:sid AND satir=:i AND sutun=:j',['sid'=>$sid,'i'=>$i, 'j'=>$j]);

            if ($a) {
                if (! $value)
                    click::where(["sid" => $sid, "satir" => $i, "sutun" => $j])->delete();
                else
                    click::where(["sid" => $sid, "satir" => $i, "sutun" => $j])->update(["veri" => "$value"]);
            } else
                click::insert(["sid" => $sid, "veri" => "$value", "satir" => $i, "sutun" => $j]);

    }
    function sayfagoster($sid){
       $a = click::where(["sid"=>$sid])->get();
        return View("anasayfa",compact("a"));
    }

    function goster(){
        $a = click::where(["sid"=>1])->get();
        return View("anasayfa",compact("a"));
    }

    function sayfaekle($sid,$did,$sname){
        sayfa::insert(["sid"=>$sid, "did" => $did, "sname" => "$sname"]);

    }

}
