@extends('layout.index')

@section('title')

Contas

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Principal</a>
        </li>
        <li class="breadcrumb-item active">Contas</li>
      </ol>

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
@if(Session::has('messageErr'))
<p class="alert alert-danger">{{ Session::get('messageErr') }}</p>
@endif

{{$us->links()}}
<table class="table table-sm table-bordered" width="80%" cellspacing="0">
    <tr>
    <th>ID</th>
    <th>Nick</th>
    <th>Level</th>
    <th>Opções</th>
    </tr>
@foreach($us as $us)
    @if($us->ContaBanida > 0)
    <tr class="table-danger">
    @else
    <tr class="table-success">
    @endif
    <td>{{$us->ID}}</td>
    <td>{{$us->Nome}}</td>
    <td>{{$us->Level}}</td>
    <td>
        <div class="btn-group">
        <a href="{{action('mainController@detalheUsuario',$us->ID)}}" >
            <div class="btn btn-info" style="border-radius:0px">
                <i class="fa fa-search"></i>
                Detalhes
            </div>
            </a>
            <a href="{{route('main.editUsuarios',$us->ID)}}" >
            <div class="btn btn-dark" style="border-radius:0px">
                <i class="fa fa-edit"></i>
                Opções
            </div>
            </a>
            @if($us -> ContaBanida > 0)
            <a href="{{route('main.desban',$us->ID)}}"><div class="btn btn-success" style="border-radius:0px">  
        Desbanir
        </div>
            </a>
            @else
           <a data-toggle="modal" data-target="#banModal" >
               <div class="btn btn-danger" style="border-radius:0px">
                            Banir
                   </div>
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
                  <br/>
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
    
    
@endforeach    

</table>



@stop
      