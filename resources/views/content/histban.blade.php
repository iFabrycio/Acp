@extends('layout.index')

@section('title')

Historico de banimentos
@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/')}}">Principal</a>
        </li>
        <li class="breadcrumb-item ">Historico de banimentos</li>
        
      </ol>

<table class="table table-striped">
<thead>
    {{$usb->links()}}
    </thead>

    <tr>
    <th> 
        ID
        </th>    
    <th>
        Nickname(ID)
        </th>    
    <th>
        Banidor
        </th>    
    <th>
        Motivo
        </th>    
    <th>
        Data-Hora
        </th>    
    <th>
        Modo
        </th>    
    </tr>
    
    @foreach($usb as $u)
    
    <tr>
    <td>
        {{$u->BanID}}
        </td>
    <td>
        {{$u->BanidoNome}}(ID:{{$u->ContaID}})
        </td>
    <td>
        {{$u->Banidor}}
        </td>
    <td>
        {{$u->MotivoBan}}
        </td>
   <td>
        {{$u->DataBan}} - {{$u->HoraBan}}
        </td>
   <td>
       <a href="{{route('main.banLog',$u->BanID)}}" style="border-radius:0px">
       <div class="btn btn-secondary">
        Ver log
           </div>
       </a>

                
        </td>
    
    </tr>
  
 
@endforeach
</table>
    {{$usb->links()}}

@stop