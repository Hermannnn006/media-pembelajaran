<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function index(){
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' Pada ' . $category->name;
        }

        return view('materi.index', [
            "title" => "Semua Materi". $title,
            "materis" => Materi::latest()->filter(request(['category']))->paginate(6)->withQueryString()
            //'materis' => Materi::all()
        ]);
    }

    public function show(Materi $materi){
        return view('materi.materi', [
            "materi" => $materi
        ]);
    }
}
