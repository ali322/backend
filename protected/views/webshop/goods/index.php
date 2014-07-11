<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('webshop','List Goods'),
		'url'=>Yii::app()->createUrl('webshop/goods/loadData'),
		'model'=>'webshop.Goods',
		'idField'=>'good_id',
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
			'add'=>array('href'=>Yii::app()->createUrl('webshop/goods/create'),'text'=>'添加商品'),
			'delete'=>array('href'=>Yii::app()->createUrl('webshop/goods/delete'),'text'=>'删除商品'),
			'edit'=>array('href'=>Yii::app()->createUrl('webshop/goods/update')),
			'view'=>array('href'=>Yii::app()->createUrl('webshop/goods/view')),
			'search'=>array('href'=>Yii::app()->createUrl('webshop/goods/loadData'),'text'=>'搜索商品','formTpl'=>'searchGoods'),
                        'multiple'=>array('href'=>Yii::app()->createUrl('webshop/goods/updateBatch'),'text'=>'批量更改','formTpl'=>'multipleGoods'),
		),
		'columns'=>array(
                        array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80,'checkbox'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'good_name','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_name')),'width'=>180,'search'=>true),
                        array('field'=>'cat_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('cat_id')),'width'=>80,'search'=>true),
                        array('field'=>'brand_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('brand_id')),'width'=>80,'search'=>true),
			array('field'=>'market_price','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('market_price')),'width'=>80,'sortable'=>true),
                        array('field'=>'shop_price','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('shop_price')),'width'=>80,'sortable'=>true),
                        array('field'=>'is_on_sale','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('is_on_sale')),'width'=>30,'search'=>true),
                        array('field'=>'is_recommend','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('is_recommend')),'width'=>30,'search'=>true),
		),
	));?>