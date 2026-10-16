<?php

class _formRib extends _formObject implements _formObjectInterface
{
    public function formElement(){
        $this->cssClass .= " input-mask-rib";
        self::init();

        return "<input type=\"text\" id=\"" . $this->id . "\" name=\"" . $this->name . "\" value=\"" . $this->defaultValue  ."\"". $this->attributes . ">";
    }
    public function __toString() {
        return "<div class=\"form-group\"><label class=\"col-sm-2 col-sm-2 control-label\">".$this->label."</label><div class=\"col-sm-10\">".$this->formElement()."<div id=\"".$this->id."_status\"></div></div></div>";
    }

}