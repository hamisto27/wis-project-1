<?php
/* @var $this JqcalendarController */
/* @var $model Jqcalendar */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Subject'); ?>
		<?php echo $form->textField($model,'Subject',array('size'=>60,'maxlength'=>1000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Location'); ?>
		<?php echo $form->textField($model,'Location',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'StartTime'); ?>
		<?php echo $form->textField($model,'StartTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EndTime'); ?>
		<?php echo $form->textField($model,'EndTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IsAllDayEvent'); ?>
		<?php echo $form->textField($model,'IsAllDayEvent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Color'); ?>
		<?php echo $form->textField($model,'Color',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RecurringRule'); ?>
		<?php echo $form->textField($model,'RecurringRule',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->