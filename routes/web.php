<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/','mainController@index')->name('main.index');
    Route::get('/Servidor','mainController@servidorDetalhes')->name('main.Servidor');
    Route::get('/Servidor/kick/{playerid}','mainController@kickar')->name('main.kick');
    Route::get('/Servidor/ban/{playerid}/{nickname}','mainController@banir')->name('main.ban');
//Hostnames routes
    Route::get('/hostnames/','mainController@hostnames')->name('main.hostnames');
    Route::get('/hostnames/editar/{a_id}','mainController@editarHostname');
    Route::post('/hostname/atualizar/','mainController@editaHostname');
    Route::get('/hostname/remover/{a_id}','mainController@removerHostname');

//Users routes

    Route::get('/usuarios/','mainController@usuarios')->name('main.usuarios');
    Route::get('/usuarios/editar/{ID}','mainController@editUsuario')->name('main.editUsuarios');



    Route::get('/usuarios/editar/{ID}/nick','mainController@editUserNick')->name('edit.nick');
    Route::get('/usuarios/editar/{ID}/ban','mainController@editUserBan')->name('edit.ban');
    Route::get('/usuarios/editar/{ID}/skin','mainController@editUserSkin')->name('edit.skin');
    Route::get('/usuarios/editar/{ID}/apartamento','mainController@editUserApe')->name('edit.ape');







    
    Route::get('/usuarios/mudancas/','mainController@mudancasNicks')->name('main.mudancaNicks');
    Route::get('/usuarios/detalhe/{ID}','mainController@detalheUsuario')->name('main.detalheUsuarios');
    Route::get('/usuarios/detalhe/{ID}/desban','mainController@desbanir')->name('main.desban');
    Route::get('/usuarios/detalhe/{ID}/ban','mainController@banirOff')->name('main.banOff');

    Route::get('/Bans/historico','mainController@histban')->name('main.historicoBan');
    Route::get('/Bans/historico/detalhe/{BanID}','mainController@histbanlog')->name('main.banLog');
    Route::get('/Ban/ip','mainController@banIP')->name('main.banIP');
    Route::get('/Ban/ip/Banir','mainController@banirIP')->name('main.banirIP');


    
    Route::get('/patentes/historico','MainController@patentesLog')->name('main.patentes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
