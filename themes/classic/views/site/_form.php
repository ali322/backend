                <div class="backend_loginform_w">
                    <div class="backend_loginform_m">
                    <h2><?php echo Yii::t('admin','Backend Admin System')?></h2>
                    <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'login-form',
                                'enableAjaxValidation'=>true,
                                'action'=>$this->createUrl('site/index')
                        )); ?>
                    <?php echo $form->errorSummary($model); ?>
                    <div class="row">
                    <?php echo $form->labelEx($model,'username'); ?>
                    <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>50)); ?>
                    </div>
                    <div class="row">
                    <?php echo $form->labelEx($model,'password'); ?>
                    <?php echo $form->passwordField($model,'password',array('size'=>20,'maxlength'=>50)); ?>
                    </div>
                     <div class="row captcha_row">
                    <?php echo $form->labelEx($model,'verify'); ?>
                    <?php echo $form->textField($model,'verify',array('size'=>12,'maxlength'=>50)); ?>
                    <?php $this->widget('CCaptcha');?>
                    </div>
                        <div class="backend_loginbtn">
                        <?php echo CHtml::submitButton(Yii::t('admin','login'),array('id'=>'loginsubmit')); ?>
                        </div>
                    <?php $this->endWidget(); ?>
                    </div>
                </div>