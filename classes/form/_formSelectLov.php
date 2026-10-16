<?php

class _formSelectLov extends _formObject implements _formObjectInterface
{

    public $values = array();

    public function __construct($table,$return,$labels,$options=array()){
        parent::__construct($options);

        $modelString = $table."Model";
        $model = new $modelString;
        $data = $model->listAll();
        $result = array("0"=> " - ");
        foreach($data as $datum){
            $value = "";
            foreach($labels as $label){
                $value .= " ". $datum->$label;
            }
            $result[$datum->$return] = $value;
        }
        $this->values = $result;

    }
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
        if($this->readOnly)
            $this->attributes .=" disabled='disabled'";

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