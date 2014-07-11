<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_id')); ?>:</b>
	<?php echo CHtml::encode($data->good_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_img')); ?>:</b>
	<?php echo CHtml::encode($data->good_img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_thumb')); ?>:</b>
	<?php echo CHtml::encode($data->good_thumb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_color')); ?>:</b>
	<?php echo CHtml::encode($data->good_color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_weight')); ?>:</b>
	<?php echo CHtml::encode($data->good_weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('good_desc')); ?>:</b>
	<?php echo CHtml::encode($data->good_desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('good_brief')); ?>:</b>
	<?php echo CHtml::encode($data->good_brief); ?>
	<br />

	*/ ?>

</div>