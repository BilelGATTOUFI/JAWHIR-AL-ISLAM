<?php

class _formSelectMois extends _formObject implements _formObjectInterface
{

    public function formElement()
    {
        global $T_arrays;
        self::init();
        $element = new _formSelect();
        $element->id = $this->id;
        $element->values = $T_arrays["T_mois"];
        $element->label = $this->label;
        $element->defaultValue = $this->defaultValue;
        return $element->formElement();
    }

    public function __toString()
    {
        return "<div class=\"form-group\">
                <label class=\"col-sm-2 col-sm-2 control-label\">" . $this->label . "</label>
                <div class=\"col-sm-10\">
                ".$this->formElement()."
                </div></div>";
    }

}