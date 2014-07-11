<?php
return array(
    'action'=>Yii::app()->createUrl('brand/loadData'),
    'elements'=>array(
        'brand_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'cat_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Cate::model()->findAll(), 'cat_id', 'cat_name'),
            'class'=>'s_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
       'brand_alia'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'brand_location'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
       'in_shop'=>array(
           'type'=>'checkbox',
           'class'=>'s_row check_row',
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