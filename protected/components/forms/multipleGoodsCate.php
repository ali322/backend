<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/goodscate/updateBatch'),
    'elements'=>array(
       'parent_id'=>array(
            'type'=>'ext.easyui.EasyuiCombotree',
            'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
            'attribute'=>'parent_id',
            's_class'=>'m_row',
            'id'=>'m_view_ct',
        ),
      'sort_order'=>array(
           'type'=>'text',
           'class'=>'m_row',
       ),
       'level'=>array(
           'type'=>'text',
           'class'=>'m_row',
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

