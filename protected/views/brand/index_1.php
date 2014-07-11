<?php
$this->breadcrumbs=array(
	'Brands',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Brand"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Brand"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Brands'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
