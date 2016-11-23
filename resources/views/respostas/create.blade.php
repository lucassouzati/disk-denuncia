@extends('layouts.app')

@section('content')

<div class="container">
<form class="form-horizontal" role="form" method="POST" action="{{ route('entrevistados.store') }}">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Perfil do Avaliador</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('entrevistados.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Faixa Etária</label>
                            <div class="col-md-6">

                                {!! Form::select('faixa_etaria', ['Não Informada' => '',
                                                                'De 10 a 20 anos' =>'De 10 a 20 anos',
                                                                'De 21 a 30 anos' => 'De 21 a 30 anos',
                                                                'De 31 a 40 anos' => 'De 31 a 40 anos',
                                                                'De 41 a 50 anos' => 'De 41 a 50 anos',
                                                                'De 51 a 60 anos' => 'De 51 a 60 anos',
                                                                'Mais de 60 anos' => 'Mais de 60 anos'], null, ['class' => 'form-control',]) !!}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                {!! Form::radio('sexo', 'Masculino', false, ['class', 'form-control']); !!}Masculino
                                {!! Form::radio('sexo', 'Feminino', false, ['class', 'form-control']); !!}Feminino
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('renda_familiar') ? ' has-error' : '' }}">
                            <label for="renda_familiar" class="col-md-4 control-label">Renda Familiar</label>

                            <div class="col-md-6">
                                {!! Form::number('renda_familiar', 0, ['class' => 'form-control', ]) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('raca') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Raça</label>
                            <div class="col-md-6">
                              {!! Form::select('raca', ['Não Informada' => '',
                                                      'Branca' =>'Branca',
                                                      'Preta' => 'Preta',
                                                      'Amarela' => 'Amarela',
                                                      'Parda' => 'Parda',
                                                      'Indígena' => 'Indígena'], null, ['class' => 'form-control',]) !!}
                                @if ($errors->has('raca'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('raca') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cidade_id') ? ' has-error' : '' }}">
                            <label for="cidade_id" class="col-md-4 control-label">Cidade que reside</label>
                            <div class="col-md-6">

                                {!! Form::select('cidade_id', \App\Cidade::doEstado(19)->pluck('nome', 'id'), 6775, ['class' => 'form-control',]) !!}

                                @if ($errors->has('cidade_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cidade_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('conhece_disk_denuncia') ? ' has-error' : '' }}">
                            <label for="conhece_disk_denuncia" class="col-md-4 control-label">Conhece o Disque Denúncia?</label>

                            <div class="col-md-6">
                                {!! Form::radio('conhece_disk_denuncia', '1', false, ['class', 'form-control']); !!}Sim
                                {!! Form::radio('conhece_disk_denuncia', '0', false, ['class', 'form-control']); !!}Não
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('conhece_disk_denuncia') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Presteza</div>
                <div class="panel-body">
                    @forelse(\App\Pergunta::daDimensao(1)->get() as $pergunta)
                        <div class="col-md-12">
                            <div class="col-md-6 col-md-offset-4">
                                <label for="conhece_disk_denuncia" class="col-md-4 control-label">{{$pergunta->descricao}}</label>
                            </div>

                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::radio('pergunta['.$pergunta->id.']', '1', false, ['class', 'form-control', 'required']); !!}1
                                {!! Form::radio('pergunta['.$pergunta->id.']', '2', false, ['class', 'form-control']); !!}2
                                {!! Form::radio('pergunta['.$pergunta->id.']', '3', false, ['class', 'form-control']); !!}3
                                {!! Form::radio('pergunta['.$pergunta->id.']', '4', false, ['class', 'form-control']); !!}4
                                {!! Form::radio('pergunta['.$pergunta->id.']', '5', false, ['class', 'form-control']); !!}5
                                {!! Form::radio('pergunta['.$pergunta->id.']', '0', false, ['class', 'form-control']); !!}Não sei responder
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submeter resposta
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
