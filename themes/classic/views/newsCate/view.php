<?php
$this->breadcrumbs=array(
	'News Cates'=>array('index'),
	$model->cat_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List NewsCate"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create NewsCate"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update NewsCate"), 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>Yii::t("project","Delete NewsCate"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage NewsCate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View NewsCate'); ?> #<?php echo $model->cat_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_id',
		'cat_name',
		'cat_alia',
		'sort_order',
	),
)); ?>
