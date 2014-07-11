<?php
class ExportExcel extends CAction{
    public function run(){
        CVarDumper::dump($_POST);
    }
}
?>
