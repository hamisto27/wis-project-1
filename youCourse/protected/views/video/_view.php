<?php
/* @var $this VideoController */
/* @var $data Video */
?>

<div class="view">

    <?php
        if(strpos($url, "youtube.com")){
            $this->widget('ext.Yiippod.Yiippod', array(
            'video'=> $data->Content,
            'id' => 'video_view_'.$data->VidID,
            'width'=>640,
            'height'=>480,
            'bgcolor'=>'#000'
            ));
        }
    ?>
</div>

<?php /*
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('Added')); ?>:</b>
	<?php echo CHtml::encode($data->Time_stp); ?>
	<br /> */
?>

