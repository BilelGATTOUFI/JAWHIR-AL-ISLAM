<?php

class _formSelect extends _formObject implements _formObjectInterface
{

    public $values = array();

    public function formElement()
    {
        self::init();
        $str = "";
        if ($this->placeHolder)
            $str .= '<option value="" disabled selected>' . $this->placeHolder . '</option>';
        if ($this->values && is_array($this->values)) {
            while (list ($key, $val) = each($this->values)) {
                if ($this->defaultValue == $key)
                    $txt = " selected=\"true\""; else $txt = "";

                $str .= '<option value="' . $key . '"' . $txt . '>' . $val . '</option>' . "\n";
            }
        }

        return "<select id=\"" . $this->id . "\" name=\"" . $this->name . "\"" . $this->attributes . ">" . $str . "</select>";
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