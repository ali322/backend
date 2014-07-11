<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Topic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Topic"), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('topic-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t("project","Manage Topics");?></h1>

<p>
<?php echo Yii::t("project","You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done."); ?></p>

<?php echo CHtml::link(Yii::t('project','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'topic-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'topic_id',
		'topic_name',
		'brand_id',
		'discount',
		'topic_ad',
	//	'topic_content',
		'begin_time',
		'end_time',
		'add_time',
                'sort_order',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
