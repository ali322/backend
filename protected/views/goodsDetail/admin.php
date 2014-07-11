<?php
$this->breadcrumbs=array(
	'Goods Details'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t("project","List GoodsDetail"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create GoodsDetail"), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('goods-detail-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t("project","Manage Goods Details");?></h1>

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
	'id'=>'goods-detail-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'good_id',
		'good_img',
		'good_thumb',
		'good_color',
		'good_weight',
		/*
		'unit',
		'good_desc',
		'good_brief',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
