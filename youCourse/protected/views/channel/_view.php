<?php
/* @var $this ChannelController */
/* @var $data Channel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ChannelID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ChannelID), array('view', 'id'=>$data->ChannelID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Coordinates')); ?>:</b>
	<?php echo CHtml::encode($data->Coordinates); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Description')); ?>:</b>
	<?php echo CHtml::encode($data->Description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Time_stp')); ?>:</b>
	<?php echo CHtml::encode($data->Time_stp); ?>
	<br />


</div>