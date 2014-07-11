<?php
Class UploadedList extends CInputWidget{
    public $imgUrl;
    public $wrapClass;
    
    public function run(){
        $this->wrapClass=isset($this->wrapClass)?$this->wrapClass:'row_updated_list';
        
     //   CVarDumper::dump($this->imgUrl);
        echo '<div class="row_uploaded_wrap">';
        echo CHtml::openTag('ul',array('class'=>$this->wrapClass));
        if($this->imgUrl !=''){
            foreach(explode(',',$this->imgUrl) as $row)
                echo '<li>'.CHtml::image($row).'</li>';
        }
        echo CHtml::closeTag('ul');
        echo '</div>';
    }
}
?>
