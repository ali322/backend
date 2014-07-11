<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/goods/loadData'),
    'elements'=>array(
        'good_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'cat_id'=>array(
            'type'=>'ext.easyui.EasyuiCombotree',
            'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
            'attribute'=>'cat_id',
            'htmlOptions'=>array('class'=>'s_row'),
        ),
       'brand_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Brand::model()->findAll(new CDbCriteria(array('condition'=>'in_shop=1','order'=>'brand_name asc'))), 'brand_id', 'brand_name'),
            'class'=>'s_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
       'is_on_sale'=>array(
           'type'=>'checkbox',
           'class'=>'s_row check_row',
       ),
       'is_recommend'=>array(
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