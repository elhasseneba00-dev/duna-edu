<?php

namespace App\Http\Controllers;

use App\Models\Benefice;
use App\Models\Categorie;
use App\Models\Course;
use App\Models\Propo;
use App\Models\Societe;
use App\Models\User;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\Instructeur;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        return redirect()->route('home.index_fr');
    }
    public function index_fr(){
        $societe = Societe::first();
        $propo = Propo::first();



        return view('web.home.index_fr', compact(
            'societe','propo'
        ));
    }



    public function about_fr(){
        $propo=Propo::first();
        $benefices=Benefice::all();
        return view('web.about.index_fr', compact('propo', 'benefices'));
    }

    public function visualisation_fr()
    {
        return view('web.visualisation.index_fr');
    }
}
