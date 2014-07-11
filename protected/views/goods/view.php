<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->good_id,
);

$this->menu=array(
	array('label'=>Yii::t("project","List Goods"), 'url'=>array('index')),
	array('label'=>Yii::t("project","Create Goods"), 'url'=>array('create')),
	array('label'=>Yii::t("project","Update Goods"), 'url'=>array('update', 'id'=>$model->good_id)),
	array('label'=>Yii::t("project","Delete Goods"), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->good_id),'confirm'=>Yii::t("project","Are you sure you want to delete this item?"))),
	array('label'=>Yii::t("project","Manage Goods"), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('project','View Goods'); ?> #<?php echo $model->good_id; ?></h1>
<img src="<?php if($model->good_detail->good_img)echo $model->good_detail->good_img;?>" alt="" style='width:158px;height:158px;'/>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'good_id',
		'brand_id',
		'cat_id',
		'good_name',
		'good_sn',
		'market_price',
		'shop_price',
		'add_time',
		'sold_count',
		'promote_price',
		'promote_start_time',
		'promote_end_time',
	),
)); ?>
