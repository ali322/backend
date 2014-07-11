<?php
$this->breadcrumbs=array(
	'Brands'=>array('index'),
	$model->brand_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Brand"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Brand"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Brand"), 'url'=>array('update', 'id'=>$model->brand_id)),
	array('label'=>Yii::t("project","Delete Brand"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->brand_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Brand"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Brand'); ?> #<?php echo $model->brand_id; ?></h1>
<img src="<?php echo $model->brand_logo;?>" alt="" />
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'brand_id',
		'cat_id',
                'in_shop',
		'brand_name',
		'brand_alia',
		'brand_logo',
		'brand_location',
		'brand_desc',
		'add_time',
	),
)); ?>
