<?php

class _formSelect2 extends _formObject implements _formObjectInterface {

    public $values = array();
    public function formElement(){

    }
    public function __toString() {
        self::init();
        if($this->attributes)
            $this->attributes .=' data-placeholder="'.$this->defaultValue.'"';
        $str="";
        if($this->values && is_array($this->values))
        {
            while(list ($key,$val) = each ($this->values))
            {
                if($this->defaultValue == $key)
                    $txt = " selected=\"true\""; else $txt = "";

                $str .='<option value="'.$key.'"'.$txt.'>'.$val.'</option>'."\n";
            }
        }

        return "<div class=\"form-group\">
                <label class=\"col-sm-2 col-sm-2 control-label\">".$this->label."</label>
                <div class=\"col-sm-10\">
                <select id=\"" . $this->id . "\" name=\"" . $this->name . "\"". $this->attributes . ">".$str."</select>
                </div></div>";
    }

}