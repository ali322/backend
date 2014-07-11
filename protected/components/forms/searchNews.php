<?php
return array(
    'action'=>Yii::app()->createUrl('news/loadData'),
    'elements'=>array(
        'news_title'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'cat_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(NewsCate::model()->findAll(), 'cat_id', 'cat_name'),
            'class'=>'s_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
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