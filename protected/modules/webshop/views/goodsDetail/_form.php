<div class="form">


	<?php echo Yii::t("project","<p class='note'>Fields with <span class='required'>*</span> are required.</p>")?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'good_id'); ?>
		<?php echo $form->textField($model,'good_id'); ?>
		<?php echo $form->error($model,'good_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_img'); ?>
		<?php echo $form->textField($model,'good_img',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'good_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_thumb'); ?>
		<?php echo $form->textField($model,'good_thumb',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'good_thumb'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_color'); ?>
		<?php echo $form->textField($model,'good_color',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'good_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_weight'); ?>
		<?php echo $form->textField($model,'good_weight',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'good_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_desc'); ?>
		<?php echo $form->textArea($model,'good_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'good_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'good_brief'); ?>
		<?php echo $form->textField($model,'good_brief',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'good_brief'); ?>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->
