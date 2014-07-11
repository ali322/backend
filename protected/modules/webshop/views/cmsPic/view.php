<?php
$this->breadcrumbs=array(
	'Cms Pics'=>array('index'),
	$model->pic_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List CmsPic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create CmsPic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update CmsPic"), 'url'=>array('update', 'id'=>$model->pic_id)),
	array('label'=>Yii::t("project","Delete CmsPic"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pic_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage CmsPic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View CmsPic'); ?> #<?php echo $model->pic_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pic_id',
		'pic_path',
		'pic_desc',
		'pic_name',
	),
)); ?>
