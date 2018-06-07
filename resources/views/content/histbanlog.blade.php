@extends('layout.index')

@section('title')

Banimentos

@endsection
@section('content')
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{url('/')}}">Principal</a>
        </li>
        <li class="breadcrumb-item "><a href="{{url('/Bans/historico')}}">Banimentos</a></li>
        <li class="breadcrumb-item active">Detalhes</li>
      </ol>

<div class="card">
  <div class="card-header">
    Log de banimento
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      @if($bl->BanidorTipo == 1)
              
              [{{$bl->DataBan}} - {{$bl->HoraBan}}]O(a) jogador {{$bl -> BanidoNome}} foi banido pelo ANTI-CHEAT (Motivo:{{$bl->MotivoBan}}).
              
              @elseif($bl->BanidorTipo == 2)
              
               [{{$bl->DataBan}} - {{$bl->HoraBan}}]O(a) jogador {{$bl -> BanidoNome}} foi automáticamente (Motivo:{{$bl->MotivoBan}}).
              
              @elseif($bl->BanidorTipo == 4)
               [{{$bl->DataBan}} - {{$bl->HoraBan}}]O(a) moderador(a) {{$bl->Banidor}} baniu o(a) jogador(a) {{$bl -> BanidoNome}} (Motivo:{{$bl->MotivoBan}}).
              @else 
              [{{$bl->DataBan}} - {{$bl->HoraBan}}]O(a) adminsitrador(a) {{$bl->Banidor}} baniu o(a) jogador(a) {{$bl -> BanidoNome}} (Motivo:{{$bl->MotivoBan}}).
              @endif
              
    </blockquote>
  </div>
</div>
@stop