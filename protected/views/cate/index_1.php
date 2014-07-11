<?php
$this->breadcrumbs=array(
	'Cates',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Cate"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Cate"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Cates'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
