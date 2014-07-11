<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/goodscateattr/updateBatch'),
    'elements'=>array(
       'cat_id'=>array(
            'type'=>'ext.easyui.EasyuiCombotree',
            'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
            'attribute'=>'cat_id',
            's_class'=>'m_row',
            'id'=>'m_view_ct',
        ),
        CHtml::hiddenField('batch_id','',array('class'=>'m_row')),
    ),
    
    'buttons'=>array(
        'login'=>array(
            'type'=>'button',
            'label'=>Yii::t('easyui','Save'),
            'id'=>'multiple_form_button',
        )
    )
);
?>

