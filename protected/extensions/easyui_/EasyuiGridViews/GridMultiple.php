<?php
class GridMultiple extends CWidget {
    public $model;
    public $columns;
    public $href;
    public $formConfig;
    public function run(){
     //   CVarDumper::dump($this->href);exit;
        $form=new CForm('application.components.forms.'.$this->formConfig,$this->model);
        $this->render('multipleview',array('model'=>$this->model,'form'=>$form,'columns'=>$this->columns,'href'=>$this->href));
      //  $this->render('multipleview',array('model'=>  $this->model,'columns'=>$this->columns,'href'=>$this->href));
    }
}
?>
