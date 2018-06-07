@extends('layout.index')

@section('title')
Servidor
@endsection
@section('content')

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif

@if(!is_array($aPlayers) || count($aPlayers) == 0)
	<div class="container col-3 pull-left">
		<fieldset class="form-group">
            <legend>Jogadores online</legend>
		<i>Nenhum jogador online</i>
        </fieldset>
</div>

	
	@else
	<div class="container col-6 pull-left">
		<fieldset class="form-group">
            <legend>Jogadores online</legend>
		<table class="table table-striped">
			<tr>
				<td><b>Player ID</b></td>
				<td><b>Nickname</b></td>
				<td><b>Score</b></td>
				<td><b>Ping</b></td>
                <td><b>Opções</b></td>
			</tr>
		
		@foreach($aPlayers as $sValue)
		
			
			<tr>
				<td><?= $sValue['playerid'] ?></td>
				<td><?= htmlentities($sValue['nickname']) ?></td>
				<td><?= $sValue['score'] ?></td>
				<td><?= $sValue['ping'] ?></td>
                <td>
                    <div class="btn-group" role="group">
                <a href="{{route('main.kick',$sValue['playerid'])}}"><div class="btn btn-warning kick" style="border-radius:0px">Kickar</div></a>
                
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
              <form class="form-group"action="{{route('main.ban',[$sValue['playerid'],$sValue['nickname']])}}" method="get">
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
                        
                        
            
                        </div>
                </td>
			</tr>
			
	@endforeach
		</table>
            </fieldset>
	</div>
@endif



        


@stop