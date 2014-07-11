<?php
$this->breadcrumbs=array(
	'Pics',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Pic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Pic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Pics'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
