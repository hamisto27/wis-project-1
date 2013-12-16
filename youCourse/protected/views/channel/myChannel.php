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

// modal for delete channel
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'deleteModal',
    'header' => 'Delete Channel',
    'content' => '<p>Are you sure you want to delete this Channel?</p>',
    'footer' => array(
        TbHtml::button('Delete', array('data-dismiss' => 'modal','submit'=>array('deleteMyOwnChannel','id'=>$model->ChannelID),  'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
));

//Yii::app()->clientScript->registerScript('modalvalidationscript',$js,CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'uploadModal',
    'header' => 'Upload video from YouTube',
    'content' => $htmlHTML,
    'footer' => array(
        TbHtml::Button('Submit',array('onclick'=>'send();','color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),

));

//modal to show video
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'watchModal',
    'header' => 'Watching...',
    'content' => '',
    'footer' => array(
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),

));

//modal for delete video
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'deleteVideoModal',
    'header' => 'Delete Video',
    'content' => '<p>Are you sure you want to delete this Video?</p>',
    'footer' => array(
        TbHtml::button('Delete', array('data-dismiss' => 'modal',  'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::button('Close', array('data-dismiss' => 'modal')),
    ),
));

// page title
echo  TbHtml::pageHeader('My Own Channel', 'on YouCourse'), TbHtml::pills(array(
    array('label'=>'My Channel', 'url'=> array('channel/myChannel','id'=>Yii::app()->user->id), 'active' => true),
    array('label'=>'Update Channel', 'url'=>array('update','id'=>Yii::app()->user->id)),
    array('label'=>'Delete Channel', 'url'=>'#', 'data-toggle' => 'modal', 'data-target' => '#deleteModal'),
)/*array('span' => 4)*/),TbHtml::buttonDropdown('Upload', array(
        array('label' => 'YouTube', 'url'=>'#', 'data-toggle' => 'modal', 'data-target' => '#uploadModal'),)
    ,array('icon' => 'align-left'));

?>
    <div class="my-channel-videos" style="margin-top:20px;">
        <?php
        $controller_video -> actionIndexByChannel(Yii::app()->user->id);
        ?>
    </div>
<?php
//end widget
$this->endWidget();