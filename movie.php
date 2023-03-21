<?php
include("header.php");
include("conn.php");

?>

<section class="mt-5">
    <div class="container">
        <?php
        if (isset($_GET['movieId'])) {
            $records = $db->query('SELECT * FROM movie WHERE id='.$_GET['movieId']);
            while($record = $records->fetch() )
            {
                print("<div class='movie-dt-wrapper'>");
                print("<div class='banner-wrapper'>");
                print("<img src='".$record['movie_banner2']."'>");
                print("</div>");
                print("<div class='title-wrapper'>");
                print("<h2>".$record['name']."</h2>");
                print("<h6>".$record['movie_name_en']."</h6>");
                print("</div>");
                print("<div class='info-wrapper'>");
                print("<p class='left'><span>監督：　</span>".$record['director']."</p>");
                print("<p class='right'>".$record['cast']."</p>");
                print("</div>");
                print("<div class='desc-wrapper'>");
                print(htmlspecialchars($record['description'], ENT_QUOTES, 'UTF-8'));
                print("</div>");
                print("</div>");
                print("<p class='duration'><span>上映時間：　</span>".$record['duration']."</p>");
            }
        }
        else {
            echo "This id does not match any exisitng movies";
        }
        ?>
    </div>
    <div class="container">
        <div class="uptime">
            <h5>上映中の劇場一覧（新宿HALシネマ）</h5>
            <div class="times">
            <?php 
            if (isset($_GET['movieId'])) {
                // $records = $db->query('SELECT * FROM `show` WHERE movie_id='.$_GET['movieId']);
                // while($record = $records->fetch() )
                // {
                //     $recordDate = $record['show_time_id'];
                //     $showTimes = $db->query('SELECT * FROM `show_time` WHERE id='.$recordDate);
                //     while($showTime = $showTimes->fetch())
                //     {
                //         print("<a href='booking.php?movieName=".$record['name']."&movieId=".$record['movie_id']."&showId=".$record['id']."&showDate=".$record['show_date']."&showTime=".$showTime['time']."' class='item'>");
                //         print("<p>".$record['show_date']."</p>");
                //         print("<p>".$showTime['time']."</p>");
                //         print("</a>");
                //     }
                // }
                if (isset($_GET['movieId'])) {
                    $today = date('Y-m-d H:i:s');
                    $records = $db->query("SELECT s.*, t.time FROM `show` s 
                                            JOIN show_time t ON s.show_time_id = t.id
                                            WHERE s.movie_id = {$_GET['movieId']} AND s.show_date >= '$today'");
                    while($record = $records->fetch()) {
                        print("<a href='booking.php?movieId={$record['movie_id']}&showId={$record['id']}&showDate={$record['show_date']}&showTime={$record['time']}' class='item'>");
                        print("<p>".$record['show_date']."</p>");
                        print("<p>".$record['time']."</p>");
                        print("</a>");
                    }
                }
            }
            else {
                echo "This id does not match any exisitng show dates";
            }
            ?>
            </div>
        </div>
    </div>
</section>



<?php
include("footer.php");
?>