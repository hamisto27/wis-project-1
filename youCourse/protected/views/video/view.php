<?php
/* @var $this VideoController */
/* @var $model Video */

/*$this->breadcrumbs=array(
	'Videos'=>array('index'),

	$model->Name,
);*/

echo TbHtml::breadcrumbs(array(
    'Home'=> Yii::app()->baseUrl.'/index.php',
    $model->Name,
));
$datetime = new DateTime($model->Time_stp);
$date = $datetime->format('Y-m-d');
$time = $datetime->format('H:i:s');
?>

<div class="video_page">
<?php if(strpos($model->Content, "youtube.com")){

    $this->widget('ext.Yiippod.Yiippod', array(
        'video'=> $model->Content,
        'id' => 'video_view_'.$model->VidID,
        'width'=>640,
        'height'=>480,
        'bgcolor'=>'#000'
    ));
} ?>
    <div class="right">
        <div class="description-popup in">
            <h3 class="popover-title"><b><?php echo $model-> Name; ?></b></h3>
            <div class="popover-content"><b>Description:</b><br><?php echo $model-> Description; ?></div>
        </div>
        <div class="description-popup in">
            <h3 class="popover-title"><b>Uploaded</b></h3>
            <div class="popover-content"><b>Date:</b> <?php echo $date ?> <br> <b>Time:</b> <?php echo $time ?></div>
        </div>
    </div>
</div>
<?php
/*$this->menu=array(
	array('label'=>'List Video', 'url'=>array('index')),
	array('label'=>'Create Video', 'url'=>array('create')),
	array('label'=>'Update Video', 'url'=>array('update', 'id'=>$model->VidID)),
	array('label'=>'Delete Video', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->VidID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Video', 'url'=>array('admin')),
);*/



//<h1>View Video #</h1>

/*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'VidID',
		'Content',
		'Description',
		'Name',
		'Views',
		'ChannelID',
		'Time_stp',
	),
)); */
