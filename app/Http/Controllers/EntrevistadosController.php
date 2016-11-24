<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entrevistado;
use App\Resposta;
use App\Pergunta;
use Carbon\Carbon;

class EntrevistadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(\App\Pergunta::daDimensao(1)->get());
        return view('respostas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $entrevistado = Entrevistado::create($dados);
        if (!empty($dados['pergunta'])){
        foreach ($dados['pergunta'] as $pergunta => $resposta) {
            $resposta = Resposta::create(['valor' => $resposta,
//                                    'resposta_texto' => '',
                                    'pergunta_id' => $pergunta,
                                    'entrevistado_id' => $entrevistado->id,
                                    'data_hora' => Carbon::now()]);
        }
      }
        \Session::flash('flash_message',[
            'msg'=>"Resposta cadastrada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('entrevistados.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
