<?php

class _formButton extends _formObject implements _formObjectInterface {

    var $type="button";
    var $link ="#";
    public function formElement(){
        self::init();
        if($this->type=="link")
            return "<a href=\"".$this->link."\" ". $this->attributes . ">".$this->label."</a>";

        return "<button id=\"" . $this->id . "\" name=\"" . $this->name . "\" value=\"" . $this->defaultValue  ."\"". $this->attributes . ">".$this->label."</button>";

    }
    public function __toString() {
        return $this->formElement();
    }

}