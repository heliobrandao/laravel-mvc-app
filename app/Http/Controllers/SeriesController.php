<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SeriesController extends Controller
{

  public function index(Request $request)
  {
    $series = Serie::all();
    // $series = Serie::query()->orderBy('nome')->get(); ** CRIADO QBUILDER NA MODEL
    $mensagemSucesso = session('mensagem.sucesso');

    //$request->session()->forget('mensagem.sucesso'); AO UTILIZAR O flash() NAO HA NECESSIDADE DO forget()

    //$series = Serie::all(); *** MOSTRA TODOS
    //$series = DB::select('SELECT nome FROM series;'); *** SELECT DIRETAMENTE NO BANCO
    //dd($series);

    return view('series.index')->with('series', $series)
      ->with('mensagemSucesso', $mensagemSucesso);
  }

  public function create()
  {
    return view('series.create');
  }

  public function store(SeriesFormRequest $request)
  {
    $serie = Serie::create($request->all());
    //$request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' incluída com sucesso");

    // $nomeSerie = $request->nome;
    // $serie = new Serie();
    // $serie->nome = $nomeSerie;
    // $serie->save();

    //DB::insert('INSERT INTO series (nome) VALUES (?)', [$nomeSerie]);
    return redirect()->route('series.index')
      ->with('mensagem.sucesso', "Série '{$serie->nome}' incluída com sucesso");

    //return to_route('series.index'); *** APENAS NO LARAVEL 9


  }

  public function destroy(Serie $series)
  {
    //Serie::destroy($request->series);
    $series->delete();
    //$request->session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");

    return redirect()->route('series.index')
      ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
  }

  public function edit(Serie $series)
  {
    dd($series->temporadas);
    return view('series.edit')->with('serie', $series);
  }

  public function update(Serie $series, SeriesFormRequest $request)
  {
    //$series->nome = $request->nome;
    $series->fill($request->all());
    $series->save();

    return redirect()->route('series.index')
      ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso!");
  }
}
