<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('webshop','List Orders'),
		'url'=>Yii::app()->createUrl('webshop/order/loadData'),
		'model'=>'Order',
		'idField'=>'id',
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
		),
		'toolbar_show'=>array(
		//	'add'=>array('href'=>Yii::app()->createUrl('webshop/order/create')),
		//	'delete'=>array('href'=>Yii::app()->createUrl('webshop/order/delete')),
			'edit'=>array('href'=>Yii::app()->createUrl('webshop/order/update')),
			'view'=>array('href'=>Yii::app()->createUrl('webshop/order/view')),
			'search'=>array('href'=>Yii::app()->createUrl('webshop/order/loadData'),'text'=>'搜索订单','formTpl'=>'searchOrder'),
                        'multiple'=>array('href'=>Yii::app()->createUrl('webshop/order/updateBatch'),'text'=>'批量更改','formTpl'=>'multipleOrder'),
		),
		'columns'=>array(
			array('field'=>'id','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('id')),'width'=>80,'checkbox'=>true),
                        array('field'=>'order_sn','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('order_sn')),'width'=>80,'search'=>true),
                        array('field'=>'user_id','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('user_id')),'width'=>80,'search'=>true),
                        array('field'=>'add_time','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('add_time')),'width'=>120,'search'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'pay_name','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('pay_name')),'width'=>60,'search'=>true),
                        array('field'=>'pay_status','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('pay_status')),'width'=>60,'search'=>true),
                        array('field'=>'order_amount','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('order_amount')),'width'=>80,),
			array('field'=>'order_status','title'=>Yii::t('webshop',Order::model()->getAttributeLabel('order_status')),'width'=>80,'search'=>true),
		),
	));?>
