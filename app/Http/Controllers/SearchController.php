<?php

namespace App\Http\Controllers;

use App\Models\Meaning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return'hai';
    }
    public function search(Request $request)
    {
        $posts=Meaning::where('english_word',$request->keywords)->get();
       /* $curriculum = DB::select("SELECT * FROM `meanings` LIMIT 10");*/
        /*$curriculum = DB::select(DB::raw("SELECT * FROM `meanings` LIMIT 10"));*/
      /*  $posts=collect($curriculum);*/
        return response()->json($posts);
    }
}
