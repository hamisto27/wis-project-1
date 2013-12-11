<?php
/* @var $this ChannelController */
/* @var $model Channel */

$this->breadcrumbs=array(
	'Channels'=>array('index'),
	$model->ChannelID=>array('view','id'=>$model->ChannelID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Channel', 'url'=>array('index')),
	array('label'=>'Create Channel', 'url'=>array('create')),
	array('label'=>'View Channel', 'url'=>array('view', 'id'=>$model->ChannelID)),
	array('label'=>'Manage Channel', 'url'=>array('admin')),
);
?>

<h1>Update Channel <?php echo $model->ChannelID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>