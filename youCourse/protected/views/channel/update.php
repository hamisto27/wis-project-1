<?php
/* @var $this ChannelController */
/* @var $model Channel */

/*$this->breadcrumbs=array(
	'Channels'=>array('index'),
	$model->ChannelID=>array('view','id'=>$model->ChannelID),
	'Update',
);
*/
// modal for delete channel

if(Yii::app()->user->id == $model->ChannelID){
    echo TbHtml::breadcrumbs(array(
        'Home'=> Yii::app()->baseUrl.'/index.php',
        'Channel'=> Yii::app()->baseUrl.'/index.php/channel/channel/id='.Yii::app()->user->id,
        'Update',
    ));
    $this->widget('bootstrap.widgets.TbModal', array(
        'id' => 'deleteFromUpdateModal',
        'header' => 'Delete Channel',
        'content' => '<p>Are you sure you want to delete this Channel?</p>',
        'footer' => array(
            TbHtml::button('Delete', array('data-dismiss' => 'modal','submit'=>array('delete','id'=>$model->ChannelID),  'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::button('Close', array('data-dismiss' => 'modal')),
        ),
    ));
    echo  TbHtml::pageHeader('My Own Channel', 'on YouCourse'),TbHtml::pills(array(
        array('label'=>'My Channel', 'url'=> array('channel/channel','id'=>Yii::app()->user->id)),
        array('label'=>'Update Channel', 'url'=>array('update','id'=>Yii::app()->user->id), 'active' => true),
        array('label'=>'Delete Channel', 'url'=>'#', 'data-toggle' => 'modal', 'data-target' => '#deleteFromUpdateModal')));

    $this->renderPartial('_form', array('model'=>$model));
}


else{

    echo TbHtml::breadcrumbs(array(
        'Home'=> Yii::app()->baseUrl.'/index.php',
        'Manage Channels'=> Yii::app()->baseUrl.'/index.php/channel/admin',
        'Update',
    ));
    echo  TbHtml::pageHeader('Update Channel', '#'.$model->ChannelID);
    $this->renderPartial('_form', array('model'=>$model));
}

$this->menu=array(
	array('label'=>'List Channel', 'url'=>array('index')),
	array('label'=>'Create Channel', 'url'=>array('create')),
	array('label'=>'View Channel', 'url'=>array('view', 'id'=>$model->ChannelID)),
	array('label'=>'Manage Channel', 'url'=>array('admin')),
);