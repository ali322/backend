<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->news_id=>array('view','id'=>$model->news_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List News"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create News"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View News"), 'url'=>array('view', 'id'=>$model->news_id)),
	array('label'=>Yii::t("project","Manage News"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update News'); ?> <?php echo $model->news_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'cates'=>$cates)); ?>