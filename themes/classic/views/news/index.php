<?php $this->widget('ext.easyui.EasyuiGrid',array(
		'title'=>Yii::t('project','List News'),
		'url'=>Yii::app()->createUrl('news/loadData'),
		'model'=>'News',
		'idField'=>'news_id',
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
			'add'=>array('href'=>Yii::app()->createUrl('news/create'),'text'=>'添加新闻'),
			'delete'=>array('href'=>Yii::app()->createUrl('news/delete'),'text'=>'删除新闻'),
			'edit'=>array('href'=>Yii::app()->createUrl('news/update')),
			'view'=>array('href'=>Yii::app()->createUrl('news/view')),
			'search'=>array('href'=>Yii::app()->createUrl('news/loadData'),'text'=>'搜索新闻','formTpl'=>'searchNews'),
                        'multiple'=>array('href'=>Yii::app()->createUrl('news/updateBatch'),'text'=>'批量更改','formTpl'=>'multipleNews'),
		),
		'columns'=>array(
                        array('field'=>'news_id','title'=>Yii::t('project',News::model()->getAttributeLabel('news_id')),'width'=>80,'checkbox'=>true),
                      //  array('field'=>'good_id','title'=>Yii::t('webshop',Goods::model()->getAttributeLabel('good_id')),'width'=>80),
			array('field'=>'news_title','title'=>Yii::t('project',News::model()->getAttributeLabel('news_title')),'width'=>100,'search'=>true),
                        array('field'=>'add_time','title'=>Yii::t('project',News::model()->getAttributeLabel('add_time')),'width'=>30,'search'=>true),
		),
	));?>

