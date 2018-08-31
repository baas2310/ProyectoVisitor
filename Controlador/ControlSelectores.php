<?php
if (session_id()=="")
    session_start();
require_once (__DIR__.'/../Modelo/Selector.php');
if (!empty($_GET['accion'])){
    ControlSeLectores::main($_GET['accion']);
}
class ControlSelectores
{
    static function main($action)
    {
        if ($action == 'Crear') {
            ControlSelectores::Crear();
        } elseif ($action == 'Select') {
            ControlSelectores::SelectTipoInterno();
        } elseif ($action == 'Select') {
            ControlSelectores::SelectDelito();
        }
    }

    static public function SelectDelito()
    {

        $arraySelector = Selector::SelectDelito();
        $htmlSelect = "<select class='form-control'  required id= 'Delito' name='Delito' class='form-control'>";
        $htmlSelect .= "<option >Seleccione ...</option>";

        if (count($arraySelector) > 0) {
            foreach ($arraySelector as $selector)
                $htmlSelect .= "<option value='" . $selector->GetIdDelito() . "'>" . $selector->getDelito() . "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function SelectTipoInterno()
    {

        $arraySelector = Selector::SelectTipoInteno();
        $htmlSelect = "<select class='form-control'  required id= 'TipoInterno' name='TipoInterno' class='form-control'>";
        $htmlSelect .= "<option >Seleccione ...</option>";

        if (count($arraySelector) > 0) {
            foreach ($arraySelector as $selector)
                $htmlSelect .= "<option value='" . $selector->getIdTipoInterno() . "'>" . $selector->getTipoInterno(). "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function SelectTipoReclusion()
    {

        $arraySelector = Selector::SelectTipoReclucion();
        $htmlSelect = "<select class='form-control'  required id= 'TipoReclusion' name='TipoReclusion' class='form-control'>";
        $htmlSelect .= "<option >Seleccione ...</option>";

        if (count($arraySelector) > 0) {
            foreach ($arraySelector as $selector)
                $htmlSelect .= "<option value='" . $selector->getIdTipoReclucion() . "'>" . $selector->getTipoReclucion(). "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function SelectParentesco()
    {

        $arraySelector = Selector::SelectParentesco();
        $htmlSelect = "<select class='form-control'  required id= 'Parentesco' name='Parentesco' class='form-control'>";
        $htmlSelect .= "<option >Seleccione ...</option>";

        if (count($arraySelector) > 0) {
            foreach ($arraySelector as $selector)
                $htmlSelect .= "<option value='" . $selector->getIdParentesco() . "'>" . $selector->getParentesco(). "</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
}
