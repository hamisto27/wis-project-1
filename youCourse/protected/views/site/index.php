<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php
/*->widget('application.extensions.gmap.GMap', array(
    'id' => 'gmap',//id of the <div> container created
    'key' => 'AIzaSyDQZz8Dkue5YeD8CTt5V63_gGevsduHJ2E', //goole API key, should be obtained for each site,it's free
    'label' => 'place', //text written in the text bubble
    'address' => array(
        'address' => '1600 Amphitheatre Pky',//address of the place
        'city' => 'Mountain View', //city
        'state' => 'CA',//state
        //'country' => 'USA'  - country
        //'zip' => 'XXXXX' - zip or postal code
    )
));*/



//$this->widget('ext.Yiitube', array('player' => 'vimeo', 'v' => '80168379', 'size' => 'small'));
//$this->widget('ext.Yiitube', array('v' => 'fYa0y4ETFVo', 'size' => 'small'));

/*$this->widget('ext.Yiippod.Yiippod', array(
    'video'=>"http://vimeo.com/62075663",
    'id' => 'yiippodplayer',
    'width'=>640,
    'height'=>480,
    'bgcolor'=>'#000'
));*/

include 'info_video.php';
?>
<h2>Welcome to <?php echo CHtml::image("images/logo_mohamed.png", "YouCourse",  array(
        'width' => '110px',
        'height' => '30px',
    )); ?>
</h2>
<div class="home-page-videos">
    <?php
    $count_row = 0;
    foreach($models as $model){

        $cut_name = $model->Name;
        if(strlen($cut_name) > 20){
            $cut_name = (substr($cut_name, 0, 19)).'...';

        }
        if($count_row == 0){
            echo '<hr><ul class="thumbnails">';
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

        if($count_row == 6){
            $count_row = 0;
            echo '</ul>';
        }


    }
    ?>
</div>