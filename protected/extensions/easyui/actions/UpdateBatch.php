<?php
class UpdateBatch extends CAction{
    public  $modelName;
    public  $idField;
    
    public function run(){
            if(isset($_POST[$this->modelName]) && isset($_POST['batch_id'])){
                $criteria=new CDbCriteria;
                $batch_id=strip_tags(trim($_POST['batch_id']));
                $criteria->addInCondition($this->idField,explode(',',$batch_id));
                if(Goods::model()->updateAll($_POST[$this->modelName],$criteria)){
                    echo CJavaScript::jsonEncode(array($this->idField=>$batch_id,'status'=>true));
                }else{
                    echo CJavaScript::jsonEncode(array('status'=>false));
                }
            }
     }
}
?>
