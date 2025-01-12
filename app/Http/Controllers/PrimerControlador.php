<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrimerControlador extends Controller
{
function index(){
    $post = ['post1','post2'];
    $categories = ['asd','asd','asd'];
    // return view("contact", ['post' => $post, 'categories' => $categories]);
    return view("contact", compact("post", 'categories'));
}
function otro($post, $item2){
    echo $post ;
    echo $item2 ;
}
}
