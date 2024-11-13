<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comuni;
use App\Models\Cap_comuni;

Route::get('/', function () {
    return view('index');
});

Route::get('/cercacomuni', function () {
    $comuni = Comuni::all();
    return view('cerca', ['comuni' => $comuni]);
});
Route::get('/caps/{id_comune}', function($id_comune) {
    //recupera tutti i post
    //$posts = Post::all();
    //$user = User::factory()->make();
    //$user = User::factory()->create();
    //$user = User::factory()->count(10)->create();
    //mostra tutti i post
    //return view('posts.index', ['posts' => $posts]);
    //return $user->name;
    //$user = Post::factory()->create();
    //return $user;
//})->name('posts.index');
//$dati = Cap_comuni::findOrFail($id_comune);
$dati = Cap_comuni::where('id_comune', $id_comune)->get();
return view('caps', ['dati' => $dati]);
})->name('caps.show');
