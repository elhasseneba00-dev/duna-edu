<?php

namespace App\Http\Controllers;

use App\Models\Benefice;
use App\Models\Categorie;
use App\Models\Course;
use App\Models\Propo;
use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return redirect()->route('home.index_fr');
    }
    public function index_fr(){
        $societe=Societe::first();
        $propo=Propo::first();
        $categories=Categorie::all();
        return view('web.home.index_fr', compact('societe', 'propo', 'categories'));
    }



    public function about_fr(){
        $propo=Propo::first();
        $benefices=Benefice::all();
        return view('web.about.index_fr', compact('propo', 'benefices'));
    }
}
