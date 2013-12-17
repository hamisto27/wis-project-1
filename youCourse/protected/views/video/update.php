<?php
/* @var $this VideoController */
/* @var $model Video */

echo TbHtml::breadcrumbs(array(
    'Home'=> Yii::app()->baseUrl.'/index.php',
    'Channel'=>array('channel', 'id'=>$model->ChannelID),
     $model->Name=>array('view','id'=>$model->VidID),
    'Update',
));

$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
	array('label'=>'View Video', 'url'=>array('view', 'id'=>$model->VidID)),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);
?>

<h1>Update Video <?php echo TbHtml::i("'".$model->Name."'"); ?></h1>

<?php $this->renderPartial('update_form', array('model'=>$model)); ?>