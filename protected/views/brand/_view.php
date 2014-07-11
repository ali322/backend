<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->brand_id), array('view', 'id'=>$data->brand_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cat_id')); ?>:</b>
	<?php echo CHtml::encode($data->cat_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_name')); ?>:</b>
	<?php echo CHtml::encode($data->brand_name); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_alia')); ?>:</b>
	<?php echo CHtml::encode($data->brand_alia); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_logo')); ?>:</b>
	<?php echo CHtml::encode($data->brand_logo); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_location')); ?>:</b>
	<?php echo CHtml::encode($data->brand_location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brand_desc')); ?>:</b>
	<?php echo CHtml::encode($data->brand_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode($data->add_time); ?>
	<br />


</div>