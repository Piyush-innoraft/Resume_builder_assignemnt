<?php

//  require("/var/www/resume/core/Request.php");
 require("/var/www/resume/core/Router.php");



class Application extends Router{

  
 
    public function __construct()
    {
       
        $this->request = new Request();
        
        $this->router = new Router($this->request);
        
    }
    public function run(){
     $this->router->resolve();
    
        
    }
}
