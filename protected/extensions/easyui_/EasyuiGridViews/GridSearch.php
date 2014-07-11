<?php
class GridSearch extends CWidget {
    public $model;
    public $columns;
    public $href;
    public $formConfig;
    public function run(){
        $form=new CForm('application.components.forms.'.$this->formConfig,$this->model);
        $this->render('searchview',array('model'=>$this->model,'form'=>$form,'columns'=>$this->columns,'href'=>$this->href));
      //  $this->render('searchview',array('model'=>  $this->model,'columns'=>$this->columns,'href'=>$this->href));
    }
}
?>
