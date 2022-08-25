<?php


require("/var/www/resume/core/Request.php");
class Router extends Request{
    public Request $request;
    protected array $routes = [];
    public function __construct(Request $request)
    {
        $this->request=$request;
    }
    public function get($path,$callback){
        $this->routes['get'][$path] = $callback;
    }
    public function resolve(){
    $path=$this->request->getpath();
    
    
       $method=$this->request->getmethod();
       
    

    $callback=$this->routes[$method][$path] ?? false;
    // echo "<pre>";
    // var_dump($callback);
    // echo "</pre>";
    // print_r($callback);
    if($callback == false){
        echo "not found";
        exit;

    }
    echo call_user_func($callback);
    }

}