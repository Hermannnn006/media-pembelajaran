<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\Chalengge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChalenggeController extends Controller
{
    public function index(){

        return view('chalengge.index', [
            "title" => "Chalengges",
            //"chalengges" => Chalengge::with('category_chalengge')->get()
            "categories" => Category::with('category_chalengges')->get()
        ]);
    }

    public function show(Chalengge $chalengge){
        return view('chalengge.chalengge', [
            "chalengge" => $chalengge
        ]);
    }

    public function checkAnswer(Chalengge $chalengge) {

      if(User::where('id', auth()->user()->id)->whereRelation('chalengges', 'chalengge_id', $chalengge->id)->doesntExist() && 
            $chalengge->answer == request('answer')){

              $nilai = auth()->user()->nilai + $chalengge->point;

              User::where('username', auth()->user()->username)->update(['nilai' => $nilai]);

              DB::table('chalengge_user')->insert([
                  'user_id' => auth()->user()->id,
                  'chalengge_id' => $chalengge->id,
                  "created_at" => Carbon::now(),
                  "updated_at" => Carbon::now()
              ]);
              return back()->with('success', 'Selamat Jawaban Anda Benar');
      } 
      elseif(User::where('id', auth()->user()->id)->whereRelation('chalengges', 'chalengge_id', $chalengge->id)->exists()) {  
              return back()->with('finished', 'Anda Sudah Mengerjakan Chalengge ini!');
      } 
      else {
              return back()->with('wrong', 'Jawaban Salah!');
      }
    }

    public static function finished($id) {
        if(User::where('id', auth()->user()->id)->whereRelation('chalengges', 'chalengge_id', $id)->exists()){
            return true;
        }
        return false;
    }
}
