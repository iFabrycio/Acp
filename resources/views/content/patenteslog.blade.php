@extends('layout.index')

@section('title')

Banimentos

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/')}}">Principal</a>
        </li>
        
        <li class="breadcrumb-item active">Patentes</li>
      </ol>


<table class="table table-striped">

<thead>
    {{$pt->links()}}
    
    </thead>
    <tbody>
    <tr>
        
        <th>
        ID
        </th>
        <th>
        Data
        </th>
        <th>Resp. pela promoção</th>
        <th>Promovido</th>
        <th>Antes / Depois</th>
        </tr>
        @foreach($pt as $p)
        <tr>
        <td>
         {{$p->p_id}}
            </td>
            <td>
            {{date("d/m/Y", $p ->p_date)}} - {{ date("H:i:s",$p ->p_date)}}
            </td>
            <td>
            {{$p->p_cnick}}(ID:{{$p->p_cid}})
            </td>
            <td>
            {{$p->p_pnick}}(ID:{{$p->p_pid}})
            </td>
            <td>
            @if($p->p_pan == 0)
                Soldado(SD)
            @elseif($p->p_pan == 1)
                Sargento(SGT)
            @elseif($p->p_pan == 2)
                Major(MAJ)
            @elseif($p->p_pan == 3)
                General(GEN)
                @endif
                /
                @if($p->p_pa == 0)
                Soldado(SD)
            @elseif($p->p_pa == 1)
                Sargento(SGT)
            @elseif($p->p_pa == 2)
                Major(MAJ)
            @elseif($p->p_pa == 3)
                General(GEN)
                @endif
                
            </td>
            
        </tr>
    @endforeach
    </tbody>

</table>



@stop