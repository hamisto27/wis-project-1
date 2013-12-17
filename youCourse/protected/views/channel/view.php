<?php
/* @var $this ChannelController */
/* @var $model Channel */

$this->breadcrumbs=array(
	'Channels'=>array('index'),
	$model->ChannelID,
);

$this->menu=array(
	array('label'=>'List Channel', 'url'=>array('index')),
	array('label'=>'Create Channel', 'url'=>array('create')),
	array('label'=>'Update Channel', 'url'=>array('update', 'id'=>$model->ChannelID)),
	array('label'=>'Delete Channel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ChannelID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Channel', 'url'=>array('admin')),
);
?>

<h1>View Channel #<?php echo $model->Channel=; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ChannelID',
		'Description',
		'Location',
		'Time_stp',
	),
)); ?>
