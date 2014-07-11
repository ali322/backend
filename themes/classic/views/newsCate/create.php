<?php
$this->breadcrumbs=array(
	'News Cates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>Yii::t("project","List NewsCate"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Manage NewsCate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t("project","Create NewsCate"); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>