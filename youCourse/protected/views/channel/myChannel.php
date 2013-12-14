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
// modal for upload video from youtube
$js = " $( 'form' ).submit(function() {
        validation();
        });
        function validation(){
            var content = $('#Video_Content').val();
            var name = $('#Video_Name').val();
            var description = $('#Video_Description').val();
            if(description != '' && name != '' && description != ''){
                var sendInfo = {
                    content: content,
                    name: name,
                    description: description
                };
                ajaxCall(sendInfo);

            }
        }
         ajaxCall = function(a){
            alert('content: ' + a.content + 'name: ' + a.name + 'description: ' + a.description );
            jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: '/index.php?r=channel/UploadFromYoutube',
                type: 'POST'',
                data: {ajaxData: a},
                error: function(xhr,tStatus,e){
                    if(!xhr){
                        alert(' We have an error ');
                        alert(tStatus+'   '+e.message);
                    }else{
                        alert('else: '+e.message); // the great unknown
                    }
                },
                success: function(resp){
                    console.log(resp);  // deal with data returned
                }
            });
         };
        ";
Yii::app()->clientScript->registerScript('modalvalidationscript',$js,CClientScript::POS_READY);
$this->widget('bootstrap.widgets.TbModal', array(
    'id' => 'uploadModal',
    'header' => 'Upload video from YouTube Url',
    'content' => $htmlHTML,
    'footer' => array(
        TbHtml::button('upload', array('submit' => '' /* submit form with jquery call function */ ,'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'htmlOptions'=>array('data-dismiss'=>'modal'))),
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



/*$this->menu=array(
    array('label' => 'Operations'),
    array('label'=>'My Channel', 'url'=>array('myChannel'), 'active' => true),
    TbHtml::menuDivider(),
    array('label'=>'Update Channel', 'url'=>array('update')),
    array('label'=>'Delete Channel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ChannelID),'confirm'=>'Are you sure you want to delete this item?')),
);*/
//echo $model->getAttributeLabel('Description').': '.$model->Description ;

//end widget
$this->endWidget();
?>
<script type="text/javascript">
    $(document).ready(function(){

      /*  $( "form" ).submit(function() {
            alert('hello');
            var content = $('#Video_Content').val();
            var name = $('#Video_Name').val();
            var description = $('#Video_Description').val();
            if(description != "" && name != "" && description != ""){
                var sendInfo = {
                    content: content,
                    name: name,
                    Phone: description
                };
                //ajaxCall(sendInfo);
            }


        });
    });*/
    });
    $( 'form' ).submit(function() {
        validation();
    });
        function validation(){
            var content = $('#Video_Content').val();
            var name = $('#Video_Name').val();
            var description = $('#Video_Description').val();
            if(description != '' && name != '' && description != ''){
                var sendInfo = {
                    content: content,
                    name: name,
                    description: description
                };
                ajaxCall(sendInfo);

            }
        }

        ajaxCall = function(a){
            alert('content: ' + a.content + 'name: ' + a.name + 'description: ' + a.description );
           /* jQuery.ajax({
                // The url must be appropriate for your configuration;
                // this works with the default config of 1.1.11
                url: '/index.php?r=channel/UploadFromYoutube',
                type: "POST",
                data: {ajaxData: a},
                error: function(xhr,tStatus,e){
                    if(!xhr){
                        alert(" We have an error ");
                        alert(tStatus+"   "+e.message);
                    }else{
                        alert("else: "+e.message); // the great unknown
                    }
                },
                success: function(resp){
                    console.log(resp);  // deal with data returned
                }
            });*/
        };
</script>