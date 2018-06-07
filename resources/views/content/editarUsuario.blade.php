@extends('layout.index')

@section('title')

ACP - Editar dados de {{$us->Nome}}

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item">Contas</li>
        <li class="breadcrumb-item active">Editar conta</li>
      </ol>


@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
@if(Session::has('messageErr'))
<p class="alert alert-danger">{{ Session::get('messageErr') }}</p>
@endif


<fieldset style="width:50%;">
<legend>Alterar informações de {{$us->Nome}}</legend>
        <h4>Alterar nick</h4>
    <form class="form-inline" action="{{route('edit.nick',$us->ID)}} " method="get">
    <label for="nick">Digite o novo nick para {{$us->Nome}}:</label>
        &nbsp;
    <input type="text" class="form-control" name="nick" id="nick"/>
        &nbsp;
        <input type="submit"  class="btn btn-success" value="Mudar"/>
    </form>
    <hr/>
        <h4>Retirar banimentos acumulados</h4>
    <form class="form-inline" 
     action="{{route('edit.ban',$us->ID)}} " method="get">
    <label for="ban">Escolha a quantidade de bans a ser removidos:</label>
        &nbsp;
    <input type="number" class="form-control" id="ban" max="5" min="0" name="banAcu"/>
        &nbsp;
    <input class="btn btn-success" type="submit" value="Retirar"/>
    </form>
    <hr>
    <h4>Alterar skin</h4>
    <form class="form-inline" action="{{route('edit.skin',$us->ID)}} " method="get">
    <label for="skin">Digite o ID da nova skin de {{$us->Nome}}:</label>
        &nbsp;
    <input type="number" class="form-control" min="-1" name="skin" id="skin"/>
        &nbsp;
    <input type="submit" value="Mudar" class="btn btn-success"/>
    
    </form>
    <hr>
    <h4>Alterar quantidade de casas</h4>
    <form class="form-inline">
        <label for="casa">Insira a quantidade de casas:</label>
        &nbsp;
        <input type="number" min="0" class="form-control" name="casa" id="casa">
        &nbsp;
        <input type="submit" class="btn btn-success" />
    
    </form>
    <hr>
    <h4>Alterar apartamento</h4>
    <form class="form-inline" action="{{route('edit.ape',$us->ID)}} " method="get">
        <label for="ap">Insira o ID do apartamento:</label>
        &nbsp;
        <input type="number" min="0" class="form-control" name="ap" id="ap">
        &nbsp;
        <input type="submit" class="btn btn-success" />
    
    </form>
</fieldset>


@stop