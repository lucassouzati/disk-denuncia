<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pergunta;
use Illuminate\Http\Request;
use Session;

class PerguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $perguntas = Pergunta::paginate(25);

        return view('perguntas.index', compact('perguntas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('perguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'descricao' => 'max:500|required',
			'dimensao' => 'numeric|required'
		]);
        $requestData = $request->all();
        
        Pergunta::create($requestData);

        Session::flash('flash_message', 'Pergunta added!');

        return redirect('perguntas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pergunta = Pergunta::findOrFail($id);

        return view('perguntas.show', compact('pergunta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pergunta = Pergunta::findOrFail($id);

        return view('perguntas.edit', compact('pergunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'descricao' => 'max:500|required',
			'dimensao' => 'numeric|required'
		]);
        $requestData = $request->all();
        
        $pergunta = Pergunta::findOrFail($id);
        $pergunta->update($requestData);

        Session::flash('flash_message', 'Pergunta updated!');

        return redirect('perguntas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pergunta::destroy($id);

        Session::flash('flash_message', 'Pergunta deleted!');

        return redirect('perguntas');
    }
}
