<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->news_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List News"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create News"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update News"), 'url'=>array('update', 'id'=>$model->news_id)),
	array('label'=>Yii::t("project","Delete News"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->news_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage News"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View News'); ?> #<?php echo $model->news_id; ?></h1>
<img src="<?php echo $model->news_ad;?>" alt="" />
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'news_id',
		'news_title',
		'news_ad',
		'add_time',
		'news_content',
		'cat_id',
	),
)); ?>
