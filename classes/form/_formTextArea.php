<?php

class _formTextArea extends _formObject implements _formObjectInterface {

    public function formElement(){
        self::init();
        return "<textarea type=\"text\" id=\"" . $this->id . "\" name=\"" . $this->name . "\" ". $this->attributes . ">" . $this->defaultValue  ."</textarea>";
    }
    public function __toString() {
        return "<div class=\"form-group\"><label class=\"col-sm-2 col-sm-2 control-label\">".$this->label."</label><div class=\"col-sm-10\">".$this->formElement()."</div></div>";
    }

}