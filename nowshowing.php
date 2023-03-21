<?php
include("header.php");
include("conn.php");
?>

<section class="movies-section">
    <div class="section-title">
            <div class="title"><img src="images/title-plate.png"><p class="big">上映中作品</p><p>Comming Soon</p></div>
        </div>
    <div class="container">
        <div class="">
            <?php
                $records = $db->query('SELECT * FROM movie WHERE rel_date < CURRENT_DATE()');
                while($record = $records->fetch())
                {
                    print("<a href='movie.php?movieId=".$record['id']."' class='item'>");
                    print("<img src='".$record['movie_banner']."' style='width:150px;'>");
                    print("<p>".$record['name']."</p>");
                    print("</a>");
                }
            ?>
        </div>
    </div>
</section>
<section class="features"> 
    <canvas id="my-live2d" class="my-live2d"></canvas>
</section>


<?php
include("footer.php");
?>