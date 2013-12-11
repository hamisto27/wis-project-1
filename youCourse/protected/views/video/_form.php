<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'slideshare'); ?>
		<?php echo $form->textField($model,'slideshare',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'slideshare'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Content'); ?>
		<?php echo $form->textField($model,'Content',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Content'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'Description',array('size'=>100,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'Name'); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->labelEx($model,'Views'); ?>
		<?php //echo $form->textField($model,'Views'); ?>
		<?php //echo $form->error($model,'Views'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'Coordinates'); ?>
		<?php echo $form->textField($model,'Coordinates'); ?>
		<?php echo $form->error($model,'Coordinates'); ?>
	</div>

    <!-- <div class="row">
		<?php //echo $form->labelEx($model,'ChannelID'); ?>
		<?php //echo $form->textField($model,'ChannelID'); ?>
		<?php //echo $form->error($model,'ChannelID'); ?>
	</div> -->

    <!-- <div class="row">
		<?php //echo $form->labelEx($model,'Time_stp'); ?>
		<?php //echo $form->textField($model,'Time_stp'); ?>
		<?php //echo $form->error($model,'Time_stp'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->