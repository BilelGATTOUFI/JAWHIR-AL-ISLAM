<?php

class _formHidden extends _formObject implements _formObjectInterface {

    public function formElement(){

    }
    public function __toString() {
        self::init();
        return "<input type=\"hidden\" id=\"" . $this->id . "\" name=\"" . $this->name . "\" value=\"" . $this->defaultValue . "\" >";
    }

}