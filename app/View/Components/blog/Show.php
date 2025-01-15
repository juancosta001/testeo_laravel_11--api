<?php

namespace App\View\Components\blog;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use function Pest\Laravel\assertDatabaseCount;

class Show extends Component
{
        // es para proteger las variables, se carga en except como protegido
    // protected $except= ['post']; 
    public function __construct(public Post $post)
    {
        
    }
    public function changeTitle(){
        $this->post->title = "probando cambio de titulo mediante metodos";
        return 'tanteanding';
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   
        return view('components.blog.post.show');
    }
}
