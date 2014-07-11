<?php
$this->breadcrumbs=array(
	'Goods',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Goods"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Goods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Goods'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
