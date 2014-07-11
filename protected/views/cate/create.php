<?php
$this->breadcrumbs=array(
	'Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List Cate"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage Cate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create Cate"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>