<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/goodscateattr/loadData'),
    'elements'=>array(
        'cat_id'=>array(
            'type'=>'ext.easyui.EasyuiCombotree',
            'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
            'attribute'=>'cat_id',
            's_class'=>'s_row',
            'id'=>'s_view_ct',
        ),
        'attr_name'=>array(
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
