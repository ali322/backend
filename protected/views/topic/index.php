<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('project','List Topics'),
		'url'=>Yii::app()->createUrl('topic/loadData'),
		'model'=>'Topic',
		'idField'=>'topic_id',
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
			'add'=>array('href'=>Yii::app()->createUrl('topic/create'),'text'=>'添加品牌活动'),
			'delete'=>array('href'=>Yii::app()->createUrl('topic/delete'),'text'=>'删除品牌活动'),
			'edit'=>array('href'=>Yii::app()->createUrl('topic/update')),
			'view'=>array('href'=>Yii::app()->createUrl('topic/view')),
			'search'=>array('href'=>Yii::app()->createUrl('topic/loadData'),'text'=>'搜索品牌活动','formTpl'=>'searchtopic'),
                        'multiple'=>array('href'=>Yii::app()->createUrl('topic/updateBatch'),'text'=>'批量更改','formTpl'=>'multipletopic'),
		),
		'columns'=>array(
                        array('field'=>'topic_id','title'=>Yii::t('project',Topic::model()->getAttributeLabel('topic_id')),'width'=>80,'checkbox'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'topic_name','title'=>Yii::t('project',Topic::model()->getAttributeLabel('topic_name')),'width'=>100,'search'=>true),
                        array('field'=>'brand_id','title'=>Yii::t('project',Topic::model()->getAttributeLabel('brand_id')),'width'=>50,'search'=>true),
                        array('field'=>'discount','title'=>Yii::t('project',Topic::model()->getAttributeLabel('discount')),'width'=>110,'search'=>true),
                        array('field'=>'begin_time','title'=>Yii::t('project',Topic::model()->getAttributeLabel('begin_time')),'width'=>60,'search'=>true),
                        array('field'=>'end_time','title'=>Yii::t('project',Topic::model()->getAttributeLabel('end_time')),'width'=>60,'search'=>true),
		),
	));?>