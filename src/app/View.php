<?php

namespace App;

use App\Exceptions\RouteNotFoundException;

class View
{
    public function __construct(
        protected string $view, 
        protected string $layout,
        protected array $params
    )
    {
        
    }

    public static function make(string $view, string|bool $layout = false, array $params = []) : static{
        return new static($view, $layout, $params);
    }

    public function render(){
        $viewPath = VIEW_PATH . '/' . $this->view . '.php';
        if($this->layout !== false){
            $layoutPath = VIEW_PATH . '/layouts/' . $this->layout . '.php';
    
            if(file_exists($layoutPath) && file_exists($viewPath)){
                $section = $this->getContent($viewPath);
                return $this->getContent($layoutPath, ['section' => $section]);
            };
        }

        if(file_exists($viewPath)){
            return $this->getContent($viewPath);
        }
        throw new RouteNotFoundException();

    }

    private function getContent(string $view, $sections = []){
        ob_start();
        extract($this->params);
        extract($sections);
        include $view;
        return ob_get_clean();
    }
}