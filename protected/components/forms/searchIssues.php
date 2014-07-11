<?php
return array(
    'action'=>Yii::app()->createUrl('issues/loadData'),
    'elements'=>array(
        'add_time'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'finished'=>array(
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