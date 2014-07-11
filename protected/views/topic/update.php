<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->topic_id=>array('view','id'=>$model->topic_id),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Topic"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Topic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","View Topic"), 'url'=>array('view', 'id'=>$model->topic_id)),
	array('label'=>Yii::t("project","Manage Topic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','Update Topic'); ?> <?php echo $model->topic_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'brands'=>$brands)); ?>