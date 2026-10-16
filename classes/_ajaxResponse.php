<?php
class _ajaxResponse{
    var $success = false;
    var $message = null;
    var $script = null;
    var $data = null;
    function __construct($message=null){
        if(!$message)
            $this->message = $message;
    }
    function __toString(){
        if(!$this->success && !$this->message)
            $this->message = "An error occured. Please contact the Administrator.";
        return json_encode($this);
    }
}