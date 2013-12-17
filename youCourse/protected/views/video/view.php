<?php
/* @var $this VideoController */
/* @var $model Video */

include dirname(__FILE__).'/../site/info_video.php';

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
        <?php /*<div class="description-popup in">
            <h3 class="popover-title"><b><?php echo $model-> Name; ?></b></h3>
            <div class="popover-content"><b>Description:</b><br><?php echo $model-> Description; ?></div>
        </div>
        <div class="description-popup in">
            <h3 class="popover-title"><b>Uploaded</b></h3>
            <div class="popover-content"><b>Date:</b> <?php echo $date ?> <br> <b>Time:</b> <?php echo $time ?></div>
        </div> */
        echo $model->slideshare;
        if($model->slideshare != ""){

            $json = @file_get_contents('http://www.slideshare.net/api/oembed/2?url='.urlencode($model->slideshare).'&format=json');
            $decode = json_decode($json, true);

            if ($decode == null || !$decode) {
                $error = true;
                //error control here
            } else {
                $thumb = $decode['thumbnail'];
                $html = $decode['html'];
                echo '<div>'.$html.'</div>';
            }

        }
        else{?>
        <div class="description-popup in">
            <h3 class="popover-title"><b><?php echo $model-> Name; ?></b></h3>
            <div class="popover-content"><b>Description:</b><br><?php echo $model-> Description; ?></div>
        </div>
        <div class="description-popup in">
            <h3 class="popover-title"><b>Uploaded</b></h3>
            <div class="popover-content"><b>Date:</b> <?php echo $date ?> <br> <b>Time:</b> <?php echo $time ?></div>
        </div>
        <?php
        }
        ?>
    </div>
    <div class="videos-related">
        <?php
        $count_row = 0;
        $count = 1;
        if($number_videos == 0){
            echo '<hr>
                  <div class="summary">'.TbHtml::muted(TbHtml::i("No other videos").' for this '.CHtml::link("Channel", $this->createAbsoluteUrl("channel/channel",array("id"=>$model->ChannelID)))).'.</div>';
        }
        foreach($videos_channel->getData() as $model){

            if($count++ == '1'){
                echo '<hr>
                    <div class="summary">'.TbHtml::muted('Displaying '.TbHtml::i("6").' of '.TbHtml::i($number_videos).' '.TbHtml::i("results").' for this '.CHtml::link("Channel", $this->createAbsoluteUrl("channel/channel",array("id"=>$model->ChannelID)))).'.</div>';
            }
            $cut_name = $model->Name;
            if(strlen($cut_name) > 20){
                $cut_name = (substr($cut_name, 0, 19)).'...';

            }
            if($count_row == 0){
                echo '<ul class="thumbnails">';
            }
            if(strpos($model->Content, "youtube.com")){

                $thumb = get_youtube_video_image($model->Content);
                $box_video = '<a class="thumbnail" href="'.$this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)).'">
                                    <img alt="" src="'.$thumb.'">
                                  </a>';
                echo' <li class="span2">
                            <p><p>
                            '.$box_video.'
                            <blockquote class="pull-right">
                            <a href="'.$this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)).'"><p style:"font-size:12px;">'.TbHtml::tooltip($cut_name, '#', $model->Name).'</p></a>
                            <small>
                                views '.$model->Views.'
                            </small>
                            </blockquote>
                          </li>';
            }
            else{

                $video=video_info($model->Content);

                if ($video!==false) {

                    $thumb = $video['thumb_large'];
                    $title = $video['title'];
                    $info = $video['info'];
                    $tags = $video['tags'];
                    //$views = $video['views'];


                    // Duration is returned seconds, roughly convert to min.
                    $duration = number_format($video['duration']/60, 2, '.', '');

                    echo CHtml::link($model->Name, $this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)));
                    echo CHtml::link(CHtml::image($thumb, $title, array(
                        'width' => '200px',
                        'height' => '100px',
                    )), $this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)));

                } else {
                    echo 'Please enter a valid Vimeo Url';
                }
            }
            $count_row ++;

            if($count_row == 6){
                $count_row = 0;
                echo '</ul>';
            }


        }
        ?>
    </div>
</div>
<?php
