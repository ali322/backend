<?php
$this->breadcrumbs=array(
	'Goods'=>array('index'),
	$model->good_id,
);

?>

<h1><?php echo Yii::t('webshop','View Goods'); ?> #<?php echo $model->good_id; ?></h1>
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
		'is_on_sale',
                'is_recommend',
		'promote_price',
		'promote_start_time',
		'promote_end_time',
	),
)); ?>
