<?php

class _formDate extends _formObject implements _formObjectInterface {

    public function formElement(){

    }
    public function __toString() {
        $this->cssClass = "form-control datepicker input-mask-date";
        self::init();
        return "<div class=\"form-group\"><label class=\"col-sm-2 col-sm-2 control-label\">".$this->label."</label><div class=\"col-sm-10\"><input type=\"text\" id=\"" . $this->id . "\" name=\"" . $this->name . "\" value=\"" . $this->defaultValue  ."\"". $this->attributes . "></div></div>";
    }

}