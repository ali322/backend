<?php
Class UpdatedList extends CInputWidget{
    public $imgUrl;
    public function run(){
        echo CHtml::openTag('ul',array('class'=>'row_updated_list'));
        foreach($imgUrl as $row)
            echo '<li>'.CHtml::image($row).'</li>';
        echo CHtml::closeTag('ul');
    }
}
?>
