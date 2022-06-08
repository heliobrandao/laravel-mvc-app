<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SeriesController extends Controller
{

    public function index()
    {
      $series = Serie::query()->orderBy('nome')->get();
      //$series = Serie::all(); *** MOSTRA TODOS
      //$series = DB::select('SELECT nome FROM series;'); *** SELECT DIRETAMENTE NO BANCO
      //dd($series);
  
      return view('series.index')->with('series', $series);
    }

    public function create()
    {
      return view('series.create');
    }

    public function store(Request $request)
    {

      Serie::create($request->all());
      // $nomeSerie = $request->nome;
      // $serie = new Serie();
      // $serie->nome = $nomeSerie;
      // $serie->save();

      //DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
      return redirect()->route('series.index');

      //return to_route('series.index'); *** APENAS NO LARAVEL 9

      
    }
}
