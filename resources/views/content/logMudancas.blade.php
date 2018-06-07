@extends('layout.index')

@section('title')

Alterações de Nicks

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item ">Usuários</li>
        <li class="breadcrumb-item active">Alterações de nicks</li>
      </ol>

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
      {{$mn->links()}}
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                  <tr>
                  <th>
                      ID
                      </th>
                      <th>
                      ID da conta
                      </th>
                      <th>
                      Tipo de mudança
                      </th>
                      <th>
                      Nome Anterior
                      </th>
                      <th>
                      Nome Novo
                      </th>
                      <th>
                      Administrador Responsável
                      </th>
                      <th>
                      Timestamp
                      </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($mn as $mn)
                <tr>
                    <td>{{$mn ->MudancaID}}</td>
                    <td>{{$mn ->ContaID}}</td>
                    <td>{{$mn ->MudancaTipo}}</td>
                    <td>{{$mn ->NomeAnterior}}</td>
                    <td>{{$mn ->NomeNovo}}</td>
                    <td>{{$mn ->NomeADM}}</td>
                    <td>{{date("d/m/Y", $mn ->Timestamp)}} - {{ date("H:i:s",$mn ->Timestamp)}}</td>
                    </tr>
                    @endforeach
                
                </tbody>
</table>

                @stop