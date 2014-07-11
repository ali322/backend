<?php
$this->breadcrumbs=array(
	'News',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create News"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage News"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List News'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
