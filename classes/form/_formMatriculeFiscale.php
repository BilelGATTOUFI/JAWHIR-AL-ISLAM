<?php

class _formMatriculeFiscale extends _formObject implements _formObjectInterface
{

    private $formMf;
    private $formCode;
    private $formCategorie;
    private $formEtablissement;

    private $matricule;
    private $cle;
    private $code;
    private $categorie;
    private $etablissement;

    private static $T_categorieTVA = array("M" => "M", "C" => "C", "P" => "P", "N" => "N");
    private static $T_codeTVA = array("A" => "A", "N" => "N", "P" => "P", "B" => "B", "D" => "D");

    public function formElement()
    {
        self::init();
        $this->formMf = new _formText();
        $this->formMf->id = $this->id."[mf]";

        $this->formCode = new _formSelect();
        $this->formCode->values = self::$T_codeTVA;
        $this->formMf->id = $this->id."[code]";


        $this->formCategorie = new _formSelect();
        $this->formCategorie->values = self::$T_categorieTVA;
        $this->formMf->id = $this->id."[categorie]";


        $this->formEtablissement = new _formText();
        $this->formMf->id = $this->id."[etablissement]";


        return "<div class=\"row\">
                    <div class=\"col-sm-5\">".$this->formMf->formElement()."<small>Matricule</small></div>
                    <div class=\"col-sm-2\">".$this->formCode->formElement()."<small>Code</small></div>
                    <div class=\"col-sm-2\">".$this->formCategorie->formElement()."<small>Catégorie</small></div>
                    <div class=\"col-sm-3\">".$this->formEtablissement->formElement()."<small>Etablissement secondaire</small></div>
                </div>";
    }
    private function matriculeFiscaleToArray(){

    }
    public function __toString()
    {
        return "<div class=\"form-group\"><label class=\"col-sm-2 col-sm-2 control-label\">".$this->label."</label><div class=\"col-sm-10\">".$this->formElement()."</div></div>";
    }

}