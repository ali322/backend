<?php
$this->breadcrumbs=array(
	'Comments',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Comments"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Comments"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Comments'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
