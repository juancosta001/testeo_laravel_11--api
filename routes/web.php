<?php

use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\PrimerControlador;
use App\Http\Controllers\SegundoControlador;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('post', PostController::class);




// Route::get('test', [PrimerControlador::class,'index']);
// Route::get('otro/{post}/{item2?}', [PrimerControlador::class,'otro']); // obliga a que haya si o si un parametro en la funcion otro
// // el ? sirve para que sea opcional que este cargado

// Route::resource('post', PrimerControlador::class);


// Route::resource('category', PrimerControlador::class);




// Route::get('/crud', function () { 
//     return view('crud/index');
// });

//  Route::get( 'pruebas', function () {    
//      return view('pruebas');
//   });
// Route::get('/ruta1', function () { 
//       // return redirect('/ruta2',303);
//       // return redirect()->route('ruta2');

//       return to_route('ruta2');
//     /*  $data=['name' => 'ruta1jara'];
//     return view('crud/ruta1',data:$data); */
//   })->name('ruta1');;
//   Route::get('/ruta2', function () { 
//     return view('crud/ruta2');
//   })->name('ruta2');

// Route::get('/contact', function () {  
//     $age=33;
//     $data = ['name' => 'marcos', 'age' => $age];
//     return view('contact', $data);
//   }
// )->name('crud');
// Route::get('/contact2', function () {  
//   return view('contact2');
// }
// )->name('crud');


