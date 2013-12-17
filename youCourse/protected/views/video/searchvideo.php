<?php
/**
 * Created by PhpStorm.
 * User: mohamed chajii
 * Date: 17/12/13
 * Time: 06:28
 */

include 'info_video.php';
?>
<div class="videos-searched">
<?php echo "<p>Search Results for: '".TbHtml::i($word_searched)."'</p>";
$count_row = 0;
$pos = "";
foreach($videos_searched->getData() as $model){
    $cut_name = $model->Name;
        if(strlen($cut_name) > 100){
            $cut_name = (substr($cut_name, 0, 99)).'...';

        }
        if($count_row == 0){
            echo "<hr><ul class='thumbnails'>";
        }
        if(strpos($model->Content, "youtube.com")){

            $thumb = get_youtube_video_image($model->Content);
            if($count_row == 0){
                $pos = "left";
            }
            else{
                $pos = "right";
            }
            $box_video = '<a class="thumbnail" href="'.$this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)).'">
                                    <img alt="" src="'.$thumb.'">
                                  </a>';
            echo'<div class="'.$pos.'" style="width:50%;"><li style="margin-right:20px;" class="span2">
                            <p></p>
                            '.$box_video.'

                          </li>';

            echo '<p></p> <a href="'.$this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)).'"><p style:"font-size:12px;">'.TbHtml::tooltip($cut_name, $this->createAbsoluteUrl('video/view',array('id'=>$model->VidID)), $model->Name).'</p></a>';
            echo '<blockquote><p>'.$model->Description.'</p><small style="margin-left:0px;" class="span3">Uploaded on: <cite >'.$model->Time_stp.'</cite></small>'.TbHtml::button('Visit Channel', array('data-id' => $model->ChannelID,'class'=> 'open-searched-channel')).'</blockquote>';
            echo '</div>';
        }
        //'.TbHtml::popover("Description","", "'.$model->Description.'", array(
        //                    "class" => "link",)).'
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
                /* echo "<a href=\"$url\"><img src=\"$thumb\" alt=\"$title\" /></a>";
                 echo "<h2>$title</h2>";
                 echo '<h4>Video Info</h4>';
                 echo "<p>$info</p>";
                 echo "<strong>Tags: </strong>$tags<br />";
                 echo "<strong>Duration: </strong> $duration min<br />";
                 echo "<strong>Views: </strong>$views<br />";*/


            } else {
                echo 'Please enter a valid Vimeo Url';
            }
        }
        $count_row ++;

        if($count_row == 2){
            $count_row = 0;
            echo '</ul>';
        }

}
?>
</div>
<script>

    $(document).ready(function(){
        $( ".open-searched-channel" ).live( "click", function() {
            var id = $(this).attr('data-id');
            window.location.replace('<?php echo Yii::app()->baseUrl.'/index.php/channel/channel/id/'; ?>' + id);

        });
    });


</script>