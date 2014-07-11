<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/goods/updateBatch'),
    'elements'=>array(
        'cat_id'=>array(
            'type'=>'ext.easyui.EasyuiCombotree',
            'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
            'attribute'=>'cat_id',
            'htmlOptions'=>array('class'=>'s_row'),
        ),
       'brand_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Brand::model()->findAll('in_shop =1'), 'brand_id', 'brand_name'),
            'class'=>'m_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
      'market_price'=>array(
           'type'=>'text',
           'class'=>'m_row',
       ),
       'shop_price'=>array(
           'type'=>'text',
           'class'=>'m_row',
       ),
       'is_on_sale'=>array(
           'type'=>'checkbox',
           'class'=>'m_row check_row',
       ),
       'is_recommend'=>array(
           'type'=>'checkbox',
           'class'=>'m_row check_row',
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
