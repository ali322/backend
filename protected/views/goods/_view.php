<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->good_id), array('view', 'id'=>$data->good_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_name')); ?>:</b>
	<?php echo CHtml::encode($data->good_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_sn')); ?>:</b>
	<?php echo CHtml::encode($data->good_sn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('market_price')); ?>:</b>
	<?php echo CHtml::encode($data->market_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_price')); ?>:</b>
	<?php echo CHtml::encode($data->shop_price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sold_count')); ?>:</b>
	<?php echo CHtml::encode($data->sold_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promote_price')); ?>:</b>
	<?php echo CHtml::encode($data->promote_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promote_start_time')); ?>:</b>
	<?php echo CHtml::encode($data->promote_start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('promote_end_time')); ?>:</b>
	<?php echo CHtml::encode($data->promote_end_time); ?>
	<br />

	*/ ?>

</div>