<?php
$this->breadcrumbs=array(
	'Topics',
);

$this->menu=array(
	array('label'=>Yii::t("project","Create Topic"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Manage Topic"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','List Topics'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
