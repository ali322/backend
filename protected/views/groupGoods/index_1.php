<?php
$this->breadcrumbs=array(
	'Group Goods',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create GroupGoods"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage GroupGoods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Group Goods'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
