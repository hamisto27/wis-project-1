<?php
/* @var $this ChannelController */
/* @var $model Channel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ChannelID'); ?>
        <?php echo $form->textField($model,'ChannelID', array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>
	</div>
    <div class="row">
        <?php echo $form->label($model,'Location'); ?>
        <?php echo $form->textField($model,"Location", array("size" => TbHtml::INPUT_SIZE_XLARGE)); ?>
    </div>
	<div class="row">
		<?php echo $form->label($model,'Description'); ?>
        <?php echo $form->textArea($model,"Description", array("span" => 5, "rows" => 5)); ?>
	</div>

	<div class="row buttons">
		<?php echo TbHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->