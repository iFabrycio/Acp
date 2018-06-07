@extends('layout.index')

@section('title')

Banir IP

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/')}}">Principal</a>
        </li>
        <li class="breadcrumb-item "><a href="{{url('/Bans/historico')}}">Banimentos</a></li>
        <li class="breadcrumb-item active">banir IP</li>
      </ol>

<div class="card">
  <div class="card-header">
    Banir IP
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
        
        <form  action="{{route('main.banirIP')}}" method="get" class="form form-inline">
        <label for="ip">
            Insira o IP:
            </label>
            &nbsp;
            <input type="text" class="form-control col-3" id="ip" name="ip" placeholder="Ex. 255.255.255.255"/>
            &nbsp;
            <input type="submit" class="btn btn-outline-danger" value="Banir!"/>
            
        </form>
      </blockquote>
    </div>
</div>

        
        @stop