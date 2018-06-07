<?php

namespace App\Http\Controllers;


include 'SampQueryAPI.php';
include 'SampRconAPI.php';
include '../config/config.php';

//$GLOBALS['variable'] = 'localhost';
//Variaveis paraa conexão do servidor
$GLOBALS['ipservidor'] = '127.0.0.1'; 
$GLOBALS['portaservidor'] = '7777'; 
$GLOBALS['rconservidor'] = 'root'; 


use App\MudancaNick;
use App\hostname;
use App\Usuarios;
use App\Banimento;
use App\Patentes;

use Session;
use Request;
use Carbon\Carbon;

class mainController extends Controller
{
    public function __construct(){
        //Ativação do Middleware de autenticação e checagem de nivel do usuário
        $this->middleware('auth');
    }
    
  public function index(){
      
      return view('content.principal');
      
  }
    
public function usuarios(){
    
    
    $us = Usuarios::orderBy('ID','ASC')->paginate(15);
    return view('content.usuarios',['us' => $us]);
    
    
}
public function detalheUsuario($ID){
    
    $us = Usuarios::where('ID',$ID)->get()->first();
    return view('content.detalheUsuario',['us'=>$us]);
    
}
  
public function editUsuario($ID){
    
     $us = Usuarios::where('ID',$ID)->get()->first();
    return view('content.editarUsuario',['us'=>$us]);
    
    
}
    
public function editUserNick($ID){

//    $nick = new Usuarios;
// $nick = Usuarios::select('Nome')->where('ID',$ID)->get()->first();   
//    $nick = Request::input('nick')
     Usuarios::where('ID',$ID)
         ->update(['Nome'=>Request::input('nick')]);

     Session::flash('message','Nickname alterado com sucesso.') ;
        return redirect()->action('mainController@usuarios');
        

}    
public function editUserSkin($ID){

//    $nick = new Usuarios;
// $nick = Usuarios::select('Nome')->where('ID',$ID)->get()->first();   
//    $nick = Request::input('nick')
     Usuarios::where('ID',$ID)
         ->update(['Skin'=>Request::input('skin')]);

     Session::flash('message','Skin alterada com sucesso.') ;
        return redirect()->action('mainController@usuarios');
        

}    
public function editUserApe($ID){

//    $nick = new Usuarios;
// $nick = Usuarios::select('Nome')->where('ID',$ID)->get()->first();   
//    $nick = Request::input('nick')
     Usuarios::where('ID',$ID)
         ->update(['Apartamento'=>Request::input('ap')]);

     Session::flash('message','Apartamento alterado com sucesso.') ;
        return redirect()->action('mainController@usuarios');
        

}
    public function editUserBan($ID){

//    $nick = new Usuarios;
// $nick = Usuarios::select('Nome')->where('ID',$ID)->get()->first();   
//    $nick = Request::input('nick')
//     Usuarios::where('ID',$ID)
//         ->update(['Nome'=>Request::input('nick')]);
//
//     Session::flash('message','Nickname alterado com sucesso.') ;
//        return redirect()->action('mainController@usuarios');
        
        $ban = Request::input('banAcu');
        
        $sumban = new Usuarios;
              $sumban = Usuarios::where('ID',$ID)
                ->get()
                ->first();
        
            $sumban->Banimentos = $sumban->Banimentos - $ban;
        
        Usuarios::where('ID',$ID)
                 ->update(['Banimentos'=>$sumban->Banimentos]);
        
         Session::flash('message','Banimentos retirados com sucesso.') ;
        return redirect()->action('mainController@usuarios');
        
        
//        
//        $sumban = new Usuarios;
//              $sumban = Usuarios::where('Nome',$ip->Nome)
//                ->get()
//                ->first();
//        
//            $sumban->Banimentos = $sumban->Banimentos + 1;
//        $sumban->save();
//        
//   Usuarios::where('Nome',$ip->Nome)
//                 ->update(['Banimentos'=>$sumban->Banimentos]);
//                
        

}
    
 
public function mudancasNicks(){
    
    $mn = MudancaNick::orderBy('MudancaID','DESC')->paginate(15);
    return view('content.logMudancas', ['mn' => $mn]);
    
}
    
    
public function hostnames(){
    
    $host = hostname::all();
    return view('content.hostnames',['host' => $host]);

    
    }
    
    public function editarHostname($a_id){
        
        //Remove o livro do banco de dados
        $host = hostname::where('a_id',$a_id)->get()->first();
        return view('content.editarHostname',['host' => $host]);
        
//        select * from `hostnames` where `hostnames`.`id` = 1 limit 1
        
}
    public function editaHostname(){
        

        
        
        $hostname = Request::input('a_a');
        $hostid = Request::input('a_id');
        
        hostname::where('a_id',$hostid)
            ->update(['a_a' => $hostname]);
         Session::flash('message','Hostname alterado com sucesso.') ;
        return redirect()->action('mainController@hostnames');
        
    }
    
    public function removerHostname($a_id){
            
       $host = hostname::where('a_id',$a_id);
        $host -> delete();
         Session::flash('message','Hostname removido com sucesso.') ;
         return redirect()->action('mainController@hostnames');
        
    }
    
    public function servidorDetalhes(){
//        $ipservidor = '144.217.61.146';
//        $portaservidor = '7777';
//        $rconservidor = 'root';
        $rcon = new SampQueryAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);
        $aPlayers = $rcon -> getDetailedPlayers();
//dd($rycon);
        return view('content.ServerDetails',['aPlayers' => $aPlayers]);
        
    }
    
    public function kickar($playerid){
        
        $rcon = new SampRconAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);
        $rcon->playerKick($playerid);
        
        Session::flash('message','Jogador kickado com sucesso.');
        return redirect()->action('mainController@servidorDetalhes');
        
    }
        public function banir($playerid,$nickname){
        
        $Ip = Usuarios::where('Nome',$nickname)->get()->first();
        $rcon = new SampRconAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);
        $rcon->playerBan($playerid);
        $rcon->addressBan($Ip->UltimoIP);
            
        $nick = Usuarios::where('Nome',$nickname)->get()->first();
            
            
 //BanID, TipoBan, ContaID, BanidoNome, Banidor, BanidorTipo, BanidorOculto, MotivoBan, DataBan, HoraBan, DesbanProgID
           $ban = new Banimento;
            $ban->TipoBan = 3;
            $ban->ContaID = $nick->ID;
            $ban->BanidoNome = $nickname;
            $ban->Banidor = "RCON Admin"; //trocar depois
            $ban->BanidorTipo = 3; //Mudar depois
            $ban->BanidorOculto = 0;
            $ban->MotivoBan = Request::input('motivo');
            $ban->DataBan = Carbon::now()->format('Y-m-d');
            $ban->HoraBan = Carbon::now()->format('H:i:s');
            $ban->DesbanProgID = 0;
            $ban->save();
            
            $banID = Banimento::where('BanidoNome',$nickname)
                ->get()
                ->first();
//            $sumban = Usuarios::select('Banimentos')
//                ->where('Nome',$nickname)
//                ->get()
//                ->first();
//            $sumban++;
            
             $sumban = new Usuarios;
              $sumban = Usuarios::where('Nome',$nickname)
                ->get()
                ->first();
        
            $sumban->Banimentos = $sumban->Banimentos + 1;
        $sumban->save();
        
   Usuarios::where('Nome',$nickname)
                 ->update(['Banimentos'=>$sumban->Banimentos]);
                
             Usuarios::where('Nome',$nickname)
                 ->update(['ContaBanida'=>$banID->BanID]);
                
                 
                 
            
            
            
        $rcon->reloadBans();
        Session::flash('message','Jogador banido com sucesso.');
        return redirect()->action('mainController@servidorDetalhes');
        
    }
    public function desbanir($ID){
        
      
        $check = Usuarios::find($ID);
        
        if($check->Banimentos < 5){
        
        $ip=Usuarios::where('ID',$ID)
                ->select('UltimoIP')
                 ->update(['ContaBanida'=> 0]);
             $rcon = new SampRconAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);
            $rcon->addressUnban($ip);
        $rcon->reloadBans();
                
                
        Session::flash('message','Jogador desbanido com sucesso.');
        return redirect()->action('mainController@usuarios');
            
        } else {
           Session::flash('messageErr','Não é possivel desbanir jogadores com 5 banimentos');
        return redirect()->action('mainController@usuarios');  
        }
    }
    
    public function banIP(){
        
        return view('content.banIP');
        
    }
    
    public function banirIP(){
        
       $ip = Request::input('ip');
        $rcon = new SampRconAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);
            $rcon->addressBan($ip);
        $rcon->reloadBans();
        
                Session::flash('message','IP banido com sucesso.');
        return redirect()->action('mainController@usuarios');
    }
    
    public function banirOff($ID){
        
        
        $ip = new Usuarios;
        $ip=Usuarios::find($ID);
                
                
        
        
    $rcon = new SampRconAPI($GLOBALS['ipservidor'],$GLOBALS['portaservidor'],$GLOBALS['rconservidor']);    
        $rcon->addressBan($ip->UltimoIP);
      
        
//        $nick = Usuarios::where('Nome',$nickname)->get()->first();
            
            
 //BanID, TipoBan, ContaID, BanidoNome, Banidor, BanidorTipo, BanidorOculto, MotivoBan, DataBan, HoraBan, DesbanProgID
           $ban = new Banimento;
            $ban->TipoBan = 3;
            $ban->ContaID = $ID;
            $ban->BanidoNome = $ip->Nome;
            $ban->Banidor = "RCON Admin"; //trocar depois
            $ban->BanidorTipo = 3; //Mudar depois
            $ban->BanidorOculto = 0;
            $ban->MotivoBan = Request::input('motivo');
            $ban->DataBan = Carbon::now()->format('Y-m-d');
            $ban->HoraBan = Carbon::now()->format('H:i:s');
            $ban->DesbanProgID = 0;
            $ban->save();
            
            $banID = Banimento::where('BanidoNome',$ip->Nome)
                ->get()
                ->first();
        $sumban = new Usuarios;
              $sumban = Usuarios::where('Nome',$ip->Nome)
                ->get()
                ->first();
        
            $sumban->Banimentos = $sumban->Banimentos + 1;
        $sumban->save();
        
   Usuarios::where('Nome',$ip->Nome)
                 ->update(['Banimentos'=>$sumban->Banimentos]);
                
        
        
             Usuarios::where('Nome',$ip->Nome)
                 ->update(['ContaBanida'=>$banID->BanID]);
                
            
            
        $rcon->reloadBans();
        Session::flash('message','Jogador banido com sucesso.');
        return redirect()->action('mainController@usuarios');
        
    }
    
    public function histBan(){
        
        $usb = Banimento::orderBy('BanID','desc')->paginate(15);
    return view('content.histban',['usb' => $usb]);
        
    }
    
    public function histbanlog($BanID){
        
        $bl = Banimento::where('BanID',$BanID)->get()->first();
        return view('content.histbanlog',['bl'=>$bl]);
        
    }
    
    public function patentesLog(){
        
        $pt = Patentes::orderBy('p_id','desc')->paginate(15);
        
        return view('content.patenteslog',['pt'=>$pt]);
        
    }
    
}

