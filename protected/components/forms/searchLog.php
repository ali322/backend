<?php
return array(
    'action'=>Yii::app()->createUrl('logs/loadData'),
    'elements'=>array(
        'user_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'add_time'=>array(
            'type'=>'text',
            'maxlength'=>12,
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
