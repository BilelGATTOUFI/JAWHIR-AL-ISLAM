<?php

class _table
{
    public $data = array();
    public $actions = array();
    public $links = array();
    public $header = array();
    public $footer = array();
    private $rowFooter = array();
    public $staticTable = array();
    public $conditionalTable = array();
    public $primaryKey;


    function objectToRow($object)
    {
        $result = new stdClass();
        foreach ($this->header as $column => $label) {
            if ($column != "_actions") {
                if (isset($object->$column)) {

                    if (!empty($this->footer[$column])) {
                        $this->rowFooter[$column][] = $object->$column;
                    }

                    if (!empty($this->staticTable[$column])) {
                        $object->$column = $this->staticTable[$column][$object->$column];
                    }

                    if (!empty($this->links[$column])) {
                        preg_match("/{(.*)}/", $this->links[$column], $output_array);
                        $link = str_replace($output_array[0], $object->$output_array[1], $this->links[$column]);
                        $object->$column = "<a href=\"$link\">" . $object->$column . "</a>";
                    }

                    $result->$column = $object->$column;
                } else {
                    $result->$column = "ERROR";
                }
            }else{
                $result->_actions = "";
                foreach($this->actions as $action){
                    preg_match("/{(.*)}/", $action["link"], $output_array);
                    $link = str_replace($output_array[0], $object->$output_array[1], $action["link"]);
                    $label = $action["label"];
                    if(!empty($action["icon"]))
                        $label = $action["icon"];
                    $result->_actions .= "<a href=\"".$link."\" title=\"".$action["label"]."\">" . $label . "</a>";
                }
            }
        }
        if(!empty($object->_aria)){
            $result->_aria = $object->_aria;
        }
        return (array)$result;
    }

    function formatFooter()
    {
        if (empty($this->footer))
            return false;
        $object = new stdClass();
        foreach ($this->header as $column => $label) {
            $object->$column = "";
        }
        foreach ($this->footer as $column => $fnt) {
            $object->$column = $fnt($this->rowFooter[$column]);
        }
        return (array)$object;
    }


    function format()
    {
        if (empty($this->data))
            return $this;

        if (!empty($this->actions)) {
            $this->header["_actions"] = "";
        }
        $data = array();
        foreach ($this->data as $datum) {
            $data[] = $this->objectToRow($datum);
        }
        $row = $this->formatFooter();
        if ($row)
            $data[] = $row;
        $this->data = $data;
        return $this;
    }
}
