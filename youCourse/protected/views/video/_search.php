<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!-- <div class="row">
		<?php //echo $form->label($model,'VidID'); ?>
		<?php //echo $form->textField($model,'VidID'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'slideshare'); ?>
		<?php echo $form->textField($model,'slideshare',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Content'); ?>
		<?php echo $form->textField($model,'Content',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'Name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<!-- <div class="row">
		<?php //echo $form->label($model,'Views'); ?>
		<?php //echo $form->textField($model,'Views'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'Coordinates'); ?>
		<?php echo $form->textField($model,'Coordinates'); ?>
	</div>

    <!--<div class="row">
		<?php //echo $form->label($model,'ChannelID'); ?>
		<?php //echo $form->textField($model,'ChannelID'); ?>
	</div> -->

    <!--<div class="row">
		<?php //echo $form->label($model,'Time_stp'); ?>
		<?php //echo $form->textField($model,'Time_stp'); ?>
	</div> -->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->