@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pergunta {{ $pergunta->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('perguntas/' . $pergunta->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pergunta"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['perguntas', $pergunta->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Pergunta',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pergunta->id }}</td>
                                    </tr>
                                    <tr><th> Descricao </th><td> {{ $pergunta->descricao }} </td></tr><tr><th> Dimensao </th><td> {{ $pergunta->dimensao }} </td></tr><tr><th> Status </th><td> {{ $pergunta->status }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection