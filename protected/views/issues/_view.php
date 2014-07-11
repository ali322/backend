<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->title),array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->user_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finished')); ?>:</b>
	<?php echo CHtml::encode($data->finished); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('add_time')); ?>:</b>
	<?php echo CHtml::encode(date('Y年m月d日 H:i:s',$data->add_time)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode(date('Y年m月d日 H:i:s',$data->update_time)); ?>
	<br />

</div>