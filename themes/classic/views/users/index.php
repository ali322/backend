<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('project','List Users'),
		'url'=>Yii::app()->createUrl('users/loadData'),
		'model'=>'Users',
		'idField'=>'user_id',
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
			'add'=>array('href'=>Yii::app()->createUrl('users/create'),'text'=>'添加系统用户'),
			'delete'=>array('href'=>Yii::app()->createUrl('users/delete'),'text'=>'删除系统用户'),
			'edit'=>array('href'=>Yii::app()->createUrl('users/update')),
			'view'=>array('href'=>Yii::app()->createUrl('users/view')),
			'search'=>array('href'=>Yii::app()->createUrl('users/loadData'),'text'=>'搜索系统用户','formTpl'=>'searchUsers'),
                      //  'multiple'=>array('href'=>Yii::app()->createUrl('users/updateBatch'),'text'=>'批量更改','formTpl'=>'multipleusers'),
		),
		'columns'=>array(
                        array('field'=>'user_id','title'=>Yii::t('project',Users::model()->getAttributeLabel('users_id')),'width'=>80,'checkbox'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'user_name','title'=>Yii::t('project',Users::model()->getAttributeLabel('users_name')),'width'=>100,'search'=>true),
		),
	));?>
