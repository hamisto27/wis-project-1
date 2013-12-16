<?php
/* @var $this VideoController */
/* @var $data Video */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('VidID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->VidID), array('view', 'id'=>$data->VidID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Content')); ?>:</b>
	<?php echo CHtml::encode($data->Content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo CHtml::encode($data->Name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Views')); ?>:</b>
	<?php echo CHtml::encode($data->Views); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChannelID')); ?>:</b>
	<?php echo CHtml::encode($data->ChannelID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('longLocation')); ?>:</b>
	<?php echo CHtml::encode($data->longLocation); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('latLocation')); ?>:</b>
	<?php echo CHtml::encode($data->latLocation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Time_stp')); ?>:</b>
	<?php echo CHtml::encode($data->Time_stp); ?>
	<br />

	*/ ?>

</div>