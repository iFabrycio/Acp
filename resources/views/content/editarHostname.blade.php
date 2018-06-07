@extends('layout.index')

@section('title')

Hostnames

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item active">Hostnames</li>
        <li class="breadcrumb-item active">Editar hostname</li>
      </ol>

<div>
<form method="post" action="{{action('mainController@editaHostname')}}" class="form form-group">
{{csrf_field()}}
    <input type="hidden" name="a_id" value="{{$host->a_id}}">

    
    <label class="btn btn-info">Nome atual: <b>{{$host->a_a}}</b> </label><br/>
    <label for="nome">Novo hostname:</label>
    <br/>
    <input type="text" class=" form-control col-lg-3" name="a_a" placeholder="Novo Hostname">
    <br/>
    <input type="submit" class="btn btn-success" value="Atualizar hostname">
    
    
    
</form>
</div>
@stop