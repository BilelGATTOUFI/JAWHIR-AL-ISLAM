<?php
class _ajax {
    static public function receive($module,$view,$arguments){
        $module = $module."Controller";
        $module = new $module;
        return $module->$view($arguments);
    }
}