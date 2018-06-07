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
      </ol>

@if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
      
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th>
                    ID
                    </th>
                    <th>
                    Hostname
                    </th>
                    <th>
                    Opções
                    </th>
                </tr>
              </thead>
              <tfoot>
                  @foreach($host as $h)
                  
                  <tr>
                  <td>
                      <p> {{$h -> a_id}}</p>
                      </td>
                      <td>
                {{$h -> a_a}}
                      </td>
                      <td>
                      <div class="btn-group">
                          
                          <div class="btn btn-success"> 
                                   <a href="{{action('mainController@editarHostname',$h->a_id)}}" style="color:white; text-decoration:none;">
                         <i class="fa fa-edit"></i><div class=""> Editar</div>
                              </a>
                          </div>
                          <div class="btn btn-danger" data-toggle="modal" data-target="#confirm">
                              <i class="fa fa-trash"></i> <div class="">Remover</div>
                          </div>
                          <!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover hostname</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja remover este hostname?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, voltar</button>
          <a href="{{action('mainController@removerHostname',$h->a_id)}}"><button type="button" class="btn btn-primary">Sim, remover</button></a>
      </div>
    </div>
  </div>
</div>
                          </div>
                      </td>
                  </tr>
                   
                  @endforeach
                </tfoot>
              </table>

@stop