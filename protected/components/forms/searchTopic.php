<?php
$criteria=new CDbCriteria;
$criteria->order='brand_name asc';

return array(
    'action'=>Yii::app()->createUrl('topic/loadData'),
    'elements'=>array(
        'topic_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'brand_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Brand::model()->findAll($criteria), 'brand_id', 'brand_name'),
            'class'=>'s_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
       'discount'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
       'begin_time'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
       'end_time'=>array(
           'type'=>'text',
           'class'=>'s_row',
       ),
    ),
    
    'buttons'=>array(
        'login'=>array(
            'type'=>'button',
            'label'=>Yii::t('easyui','Search'),
            'id'=>'search_form_button',
        )
    )
);
?>