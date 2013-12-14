<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'jqcalendar-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Subject'); ?>
		<?php echo $form->textField($model,'Subject',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'Subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'StartTime'); ?>
		<?php echo $form->textField($model,'StartTime'); ?>
		<?php echo $form->error($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EndTime'); ?>
		<?php echo $form->textField($model,'EndTime'); ?>
		<?php echo $form->error($model,'EndTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IsAllDayEvent'); ?>
		<?php echo $form->textField($model,'IsAllDayEvent'); ?>
		<?php echo $form->error($model,'IsAllDayEvent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Color'); ?>
		<?php echo $form->textField($model,'Color',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RecurringRule'); ?>
		<?php echo $form->textField($model,'RecurringRule',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'RecurringRule'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->