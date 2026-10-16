<?php

class _formObject
{
    public $name;
    public $id;
    public $defaultValue = "";
    public $readOnly = false;
    public $cssClass = "form-control";
    public $cssStyle = false;
    public $tooltip = false;
    public $label;
    public $placeHolder = "";
    public $aria = false;
    public $dir = "ltr";
    protected $attributes = "";

    function __construct($options=array()){
        if(!empty($options)) {
            foreach ($options as $attribute => $value) {
                $this->$attribute = $value;
            }
        }
    }

    protected function init(){
        if (!isset($this->name))
            $this->name = $this->id;

        if (empty($this->label))
            $this->label = $this->id;

        if ($this->placeHolder)
            $this->attributes .= " placeholder=\"" . $this->placeHolder . "\"";

        if ($this->readOnly)
            $this->attributes .= " readonly= \"readonly\"";

        if ($this->cssStyle)
            $this->attributes .= " style=\"" . $this->cssStyle . "\"";

        if ($this->cssClass)
            $this->attributes .= " class=\"" . $this->cssClass . "\"";

        if ($this->aria)
            $this->attributes .= " ".$this->aria;

        $this->attributes .= " dir=\"".$this->dir."\"";
    }

}