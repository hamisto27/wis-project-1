<?php
/**
 * Created by PhpStorm.
 * User: mohamed chajii
 * Date: 12/12/13
 * Time: 22:31
 */

/* @var $this ChannelController */

Yii::import('application.controllers.VideoController');
$controller_video = new VideoController("Video");

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation'=>true,
));
echo TbHtml::breadcrumbs(array(
    'Home'=> Yii::app()->baseUrl.'/index.php',
    'Channel',
));
$htmlHTML = $controller_video -> renderPartial('_form',array('model'=>Video::model()), true);
// modal for delete video
 $this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'deleteModal',
    'header' => 'Delete The Channel',
    'content' => '<p>Are you sure you want to delete this Channel?</p>',
    'footer' => array(
        TbHtml::button('Delete', array('data-dismiss' => 'modal','submit'=>array('delete','id'=>$model->ChannelID),  'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
));
//Yii::app()->clientScript->registerScript('modalvalidationscript',$js,CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'uploadModal',
    'header' => 'Upload video from YouTube Url',
    'content' => $htmlHTML,
    'footer' => array(
        TbHtml::Button('Submit',array('data-dismiss' => 'modal', 'onclick'=>'send();','color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
));
// page title
echo  TbHtml::pageHeader('My Own Channel', 'on YouCourse'), TbHtml::pills(array(
        array('label'=>'My Channel', 'url'=> array('channel/myChannel','id'=>Yii::app()->user->id), 'active' => true),
        array('label'=>'Update Channel', 'url'=>array('update')),
        array('label'=>'Delete Channel', 'url'=>'#', 'data-toggle' => 'modal', 'data-target' => '#deleteModal'),
      ),array('span' => 9)),TbHtml::buttonDropdown('Upload', array(
                array('label' => 'YouTube', 'url'=>'#', 'data-toggle' => 'modal', 'data-target' => '#uploadModal'),)
                ,array('icon' => 'align-left'));

//end widget
$this->endWidget();

$this->widget('ext.Yiippod.Yiippod', array(
    'video'=>"http://www.youtube.com/watch?v=qD2olIdUGd8",
    'id' => 'yiippodplayer',
    'width'=>340,
    'height'=>280,
    'bgcolor'=>'#000'
));
?>
<h2>Youtoube Example - video</h2>
<?php $this->widget('ext.youtube.JYoutube', array(
    'youtubeId'=>'otIJRaxaknc',
)); ?><!-- youtoube -->

<h2>Youtoube Example - clickable image</h2>
<?php $this->widget('ext.youtube.JYoutube', array(
    'type'=>'image',
    'width'=>'280',
    'height'=>'220',
    'enableImageClickEvent'=>true,
    'youtubeId'=>'kXD6Gtinvbc',
    'options'=>array(
        'autohide'=>TRUE,
        'autoplay'=>TRUE,
        'showinfo'=>TRUE,
        )
)); ?><!-- youtoube -->

<h2>Youtoube Example - only image</h2>
<?php $this->widget('ext.youtube.JYoutube', array(
    'id'=>'youtube_1',
    'type'=>'image',
    'width'=>'300',
    'height'=>'200',
    'youtubeId'=>'DX1iplQQJTo',
)); ?>