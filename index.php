<?php
include("header.php");
include("conn.php");
?>

<section class="movies-section">
    <div class="movies-wrapper">
        <div class="section-title">
            <div class="title"><img src="images/title-plate.png"><p class="big">上映中作品</p><p>Now Playing</p></div>
            <a href="nowshowing.php" class="more">MORE</a>
        </div>
        <div class="movie-list">
            <?php
                $records = $db->query('SELECT * FROM movie WHERE rel_date < CURRENT_DATE() ORDER BY rel_date LIMIT 4');
                while($record = $records->fetch())
                {
                    print("<a href='movie.php?movieId=".$record['id']."' class='item'>");
                    print("<div class='img-wrapper'>");
                    print("<img src='".$record['movie_banner']."'>");
                    print("</div>");
                    print("<p>".$record['name']."</p>");
                    print("</a>");
                }
            ?>
        </div>
    </div>
    <div class="movies-wrapper">
        <div class="section-title">
            <div class="title"><img src="images/title-plate.png"><p class="big">公開予定作品</p><p>Comming Soon</p></div>
            <a href="nowshowing.php" class="more">MORE</a>
        </div>
        <div class="movie-list">
            <?php
                $records = $db->query('SELECT * FROM movie WHERE rel_date > CURRENT_DATE() ORDER BY rel_date LIMIT 4');
                while($record = $records->fetch())
                {
                    print("<a href='movie.php?movieId=".$record['id']."' class='item'>");
                    print("<div class='img-wrapper'>");
                    print("<img src='".$record['movie_banner']."'>");
                    print("</div>");
                    print("<p>".$record['name']."</p>");
                    print("<p>".$record['rel_date']."</p>");
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