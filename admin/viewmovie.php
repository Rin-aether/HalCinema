<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");

} else {

    include("admin_header.php"); 

    $con=new connec();

    $sql="SELECT movie.id, movie.name, movie.movie_name_en, movie.movie_banner, movie.movie_banner2, movie.rel_date, movie.duration, movie.director, movie.cast, movie.description FROM movie;";

    $result=$con->select_by_query($sql);
    ?>
    <section>
        <div class="row">
            <div class="col-md-2" style="background-color:#111;min-height: 500px;">
                <?php include('admin_sidenavbar.php') ?>
            </div>
            <div class="col-md-9">
                <h5 class="text-center mt-2">Movie Detail</h5>
                
                <table class="table" border=1>
                    <thead>
                        <tr>
                            <th>映画名</th>
                            <th>映画名英語</th>
                            <th>Banner1</th>
                            <th>Banner2</th>
                            <th>上映日</th>
                            <th>上映時間</th>
                            <th>監督</th>
                            <th>出演</th>
                            <th>紹介</th>
                            <th>編集</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($result->num_rows>0)
                            {
                                while($row=$result->fetch_assoc())
                                {
                                    ?>
                                        <tr>
                                            <td><?php echo $row["name"];?></td>
                                            <td><?php echo $row["movie_name_en"];?></td>
                                            <td><img src="../<?php echo $row["movie_banner"];?>" style="height: 100px;"></td>
                                            <td><img src="../<?php echo $row["movie_banner2"];?>" style="height: 100px;"></td>
                                            <td><?php echo $row["rel_date"];?></td>
                                            <td><?php echo $row["duration"];?></td>
                                            <td><?php echo $row["director"];?></td>
                                            <td><?php echo $row["cast"];?></td>
                                            <td><?php echo $row["description"];?></td>
                                            <td>
                                                <a href="editmovie.php?id=<?php echo $row["id"];?>" class="btn">Edit</a>
                                                <a href="deletemovie.php?id=<?php echo $row["id"];?>" class="btn">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </section>
    <?php
    include("admin_footer.php"); 
    
}
?>
