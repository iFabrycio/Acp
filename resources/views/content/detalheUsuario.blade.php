@extends('layout.index')

@section('title')

Contas

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/')}}">Principal</a>
        </li>
        <li class="breadcrumb-item "><a href="{{url('/usuarios')}}">Contas</a></li>
        <li class="breadcrumb-item active">Detalhes de {{$us->Nome}}</li>
      </ol>

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif


<table class="table table-bordered" width="100%" cellspacing="0">
    <tr>
    <th>Informações</th>
    <th>Dados</th>
    </tr>

    <tr>
    <th>Nick</th>
    <td>{{$us -> Nome}}</td>
    </tr>
    <tr>
    <th>Pais</th>
    <td>{{$us -> Pais}}</td>
    </tr>
 <tr>
    <th>Ultimo IP</th>
    <td>{{$us -> UltimoIP}}</td>
    </tr>
 <tr>
    <th>Ultimo Login</th>
    <td>{{date("d/m/Y - H:i:s",$us -> UltimoLogin)}}</td>
    </tr>
 <tr>
    <th>Sexo</th>
    <td>@if($us -> Sexo == 1)
     Masculino
     @else
     Feminino
     @endif</td>
    </tr>
 <tr>
    <th>Email</th>
    <td>{{$us -> Email}}</td>
    </tr>
    <tr>
    <th>Level</th>
    <td>{{$us -> Level}}</td>
    </tr>
    <tr>
    <th>Id da Profissão</th>
    <td>{{$us -> Profissao}}</td>
    </tr>
    <tr>
    <th>Skin</th>
    <td>{{$us -> Skin}}</td>
    </tr>
    <tr>
    <th>Punições</th>
    <td>{{$us -> Punido}}/5</td>
    </tr>
    <tr>
    <th>Banimentos</th>
    <td>{{$us -> Banimentos}}/5</td>
    </tr>
    <tr>
    <th>Banido</th>
    <td>
        <div class="option-box btn-group">
        @if($us -> ContaBanida > 0)
       
        <div class="btn btn-outline-danger disabled" style="border-radius:0px">
        Sim
            </div>
        <a href="{{route('main.desban',$us->ID)}}"><div class="btn btn-success" style="border-radius:0px">  
        Desbanir
        </div>
            </a>
        @else 
        <div class="btn btn-outline-success disabled"style="border-radius:0px">
        Não
            </div>
        
            <a class="btn btn-danger" data-toggle="modal" data-target="#banModal" style="border-radius:0px">
                            Banir
                        </a>

                           <div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja banir este jogador?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
              <form class="form-group"action="{{route('main.banOff',$us->ID)}}" method="get">
              <label for="motivo">Digite o motivo do banimento:</label>
              <input  id="motivo"class="form-control" type="text" name="motivo"/>
                 <input type="submit" class="btn btn-danger pull-right" value="Banir!">
              </form>
              
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            
          </div>
        </div>
      </div>
    </div>
        @endif
        </div>
        </td>
    </tr>
   

</table>



@stop
      