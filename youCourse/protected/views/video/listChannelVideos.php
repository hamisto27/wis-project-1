<?php
/**
 * Created by PhpStorm.
 * User: mohamed chajii
 * Date: 14/12/13
 * Time: 21:15
 */
/* @var $this VideoController */
/* @var $dataProvider CActiveDataProvider */
?>

<ul class="thumbnails span">
    <?php foreach($dataProvider->getData() as $data) { ?>

    <li class="span3" data-id="" data-content="" data-descrption="">
        <div class="thumbnail">
            <div class="caption">
                <?php
                $cut_name = $data->Name;
                if(strlen($cut_name) > 30){
                $cut_name = (substr($cut_name, 0, 29)).'...';
                }
                ?>
                <p><h5><?php echo '<a href="'.$this->createAbsoluteUrl('video/view',array('id'=>$data->VidID)).'">'.TbHtml::tooltip($cut_name,$this->createAbsoluteUrl('video/view',array('id'=>$data->VidID)),$data->Name).'</a>'?></h5><a href="<?php echo $this->createAbsoluteUrl('video/update',array('id'=>$data->VidID)); ?>">Update<i class="icon-edit"></i></a></p>
                <?php
                //get ID from youtube url
                parse_str( parse_url($data->Content, PHP_URL_QUERY ), $my_array_of_vars );


                $this->widget('ext.youtube.JYoutube', array(
                    'id'=>'youtube_'.$data->VidID,
                    'type'=>'image',
                    'width'=>'242',
                    'height'=>'183',
                    'enableImageClickEvent'=>true,
                    'youtubeId'=>$my_array_of_vars['v'],
                )); ?>
                <br>
                <br>
                <?php echo TbHtml::button('Watch', array('data-id' => $data->VidID, 'data-youtubeId' => $my_array_of_vars['v'],
                    'data-name' => $data->Name,'color' => TbHtml::BUTTON_COLOR_PRIMARY));

                if(Yii::app()->getModule('user')->isAdmin() || $id_channel == Yii::app()->user->id){
                 echo '&nbsp;&nbsp;'.TbHtml::button('Delete', array('data-id' => $data->VidID, 'data-name' => $data->Name, 'class' => 'delete-video')); }
                ?>
                <!--<span class="badge badge-success" style="float:right;">views<?php //echo ' '.$data->Views; ?></span>-->
                <?php if($data->slideshare!=null){
                     echo '<a class="right" data-url="'.$data->slideshare.'" data-id="'.$data->VidID.'" href="#" id="slideshare-modal-link">Slideshare</a>';
                    $json = @file_get_contents('http://www.slideshare.net/api/oembed/2?url='.urlencode($data->slideshare).'&format=json');
                    $decode = json_decode($json, true);
                    $html="";
                    if ($decode == null || !$decode) {
                        $error = true;
                        //error control here
                    } else {
                        $thumb = $decode['thumbnail'];
                        $html = $decode['html'];
                    }
                     $this->widget('bootstrap.widgets.TbModal', array(
                        'id' => 'slideshareModal_'.$data->VidID,
                        'header' => 'Slides',
                        'content' => $html,
                        'footer' => array(
                            TbHtml::button('Close', array('data-dismiss' => 'modal')),
                        ),

                    ));
                }
                else
                     echo '<p class="right" style="color:#b94a48;">No Slideshare!</p>';
                ?>
            </div>
        </div>
     </li>
    <?php } ?>
</ul>
<script type="text/javascript">
    $(document).ready(function(){



        $( "a#slideshare-modal-link" ).live( "click", function(event) {

            event.preventDefault();
            //alert("hello");
            var id = $(this).attr('data-id');
            $('#slideshareModal_' + id).modal({
                refresh: true
            });
            $("#slideshareModal_" + id).addClass('slideshareModal');
            $("#slideshareModal_" + id + " .modal-body").load(function() {
                $("#slideshareModal_" + id).modal("show");
            });

        });
        //remove data from modal when is hidden
        $( "div.my-channel-videos .btn-primary").live( "click", function() {
            $('#watchModal').modal({
                refresh: true
            });
            var URL = $(this).attr('data-youtubeId');
            var name = $(this).attr('data-name');
            var htm = '<object style="height: 349px; width: 525px">' +
                '<param name="movie" value="http://www.youtube.com/v/'+ URL + '?version=3">' +
                '<param name="allowFullScreen" value="true">' +
                '<param name="allowScriptAccess" value="always">' +
                '<embed src="http://www.youtube.com/v/'+ URL + '?version=3" type="application/x-shockwave-flash" allowfullscreen="true" allowScriptAccess="always" width="525" height="349"></object>';

            $("#watchModal .modal-body").html(htm);
            $("#watchModal .modal-header").html('<button data-dismiss="modal" class="close" type="button">×</button><h4><strong style="color:#d02828;">Watching: </strong>' + name + '</h4>');
            // show modal
            $("#watchModal .modal-body").load(function() {
                $("#watchModal").modal("show");
            });
        });


        $( ".delete-video" ).live( "click", function() {

                $('#deleteVideoModal').modal({
                    refresh: true
                });
                var id=$(this).attr('data-id');
                //set modal windows button with id of video that you want to delete.
                $("#deleteVideoModal .btn-primary").attr('data-id',id);
                var name=$(this).attr('data-name');
                $("#deleteVideoModal .modal-body").html("<p>Are you deleting <strong>'" + name +
                                                        "'.</strong></p><p>Do you want to continue?</p>");
                // show modal
                $("#deleteVideoModal .modal-body").load(function() {
                    $("#deleteVideoModal").modal("show");
                });

        });

        $("#deleteVideoModal .btn-primary").live( "click", function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo Yii::app()->createAbsoluteUrl("video/deleteAjax"); ?>',
                data:{
                    VidID:$("#deleteVideoModal .btn-primary").attr('data-id')
                },
                success:function(data){
                    console.log(data);
                    location.reload();
                },
                error: function() { // if error occurred
                    alert("Error occurred. please try again!");
                },

                dataType:'html'
            });
        });

        $('#watchModal').on('hidden', function() {
            $(this).removeData('modal');
        });

        $('#deleteVideoModal').on('hidden', function() {
            $(this).removeData('modal');
        });

    });
</script>