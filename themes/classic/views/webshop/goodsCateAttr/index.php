<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('webshop','List Goods Cate Attr'),
		'url'=>Yii::app()->createUrl('webshop/goodscateattr/loadData'),
		'model'=>'GoodsCate',
		'idField'=>'cat_id',
		'htmlOptions'=>array(
			'method'=>'POST',
			'width'=>1250,
			'height'=>630,
		//	'idField'=>'good_id',
			'fitColumns'=>true,
			'nowrap'=>false,
			'rownumbers'=>true,
			'showFooter'=>true,
			'pagination'=>true,
			'rownumbers'=>false,
                        'singleSelect'=>false,
		),
		'toolbar_show'=>array(
			'add'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/create'),'text'=>'添加商品分类属性'),
			'delete'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/delete'),'text'=>'删除商品分类属性'),
			'edit'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/update')),
			'view'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/view')),
			'search'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/loadData'),'text'=>'搜索商品分类属性','formTpl'=>'searchGoodsCateAttr'),
                        'multiple'=>array('href'=>Yii::app()->createUrl('webshop/goodscateattr/updateBatch'),'text'=>'批量更改','formTpl'=>'multipleGoodsCateAttr'),
		),
		'columns'=>array(
                        array('field'=>'id','title'=>Yii::t('webshop',GoodsCateAttr::model()->getAttributeLabel('id')),'width'=>80,'checkbox'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'cat_id','title'=>Yii::t('webshop',GoodsCateAttr::model()->getAttributeLabel('cat_id')),'width'=>200,'search'=>true),
                        array('field'=>'attr_name','title'=>Yii::t('webshop',GoodsCateAttr::model()->getAttributeLabel('attr_name')),'width'=>80,'search'=>true),
		),
	));?>

