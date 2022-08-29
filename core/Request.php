<?php
class Request{
    public function getpath(){
        $path=$_SERVER['REQUEST_URI'];
        $ret=(explode("?", $path));
    
    return $ret[0];
    



    }
    public function getmethod(){
        return  strtolower($_SERVER['REQUEST_METHOD']);
       
        
    }
}

?>