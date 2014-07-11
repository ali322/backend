<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->topic_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Topic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Topic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Topic"), 'url'=>array('update', 'id'=>$model->topic_id)),
	array('label'=>Yii::t("project","Delete Topic"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->topic_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Topic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Topic'); ?> #<?php echo $model->topic_id; ?></h1>
<img src="<?php echo $model->topic_ad;?>" alt="" />
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'topic_id',
		'topic_name',
		'brand_id',
		'discount',
		'sort_order',
		'topic_ad',
		'topic_content',
		'begin_time',
		'end_time',
		'add_time',
	),
)); ?>
