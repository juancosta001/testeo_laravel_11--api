<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    //aqui se manejan las excepciones, para evitar que en la api muestre demasiados datos
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->statefulApi(); //aqui es cuando activamos la proteccion de api via SPA, con solo esta linea
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //aqui se agregan todas las excepciones necesarias
        $exceptions->render(function(NotFoundHttpException $e, $request ){
            if($request->expectsJson()){
            return response()->json('No se encontro',404);
            }
        });
    })->create();
