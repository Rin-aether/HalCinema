<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
    header("Location:index.php");

} else {

    include("admin_header.php"); 

    $con=new connec();

    $sql="SELECT seat_reserved.id, seat_reserved.show_id, users.username, seat_reserved.seat_number, seat_reserved.reserved FROM seat_reserved, users where seat_reserved.cust_id=users.id;";

    $result=$con->select_by_query($sql);
    ?>
    <section>
        <div class="row">
            <div class="col-md-2" style="background-color:#111;min-height: 500px;">
                <?php include('admin_sidenavbar.php') ?>
            </div>
            <div class="col-md-9">
                <h5 class="text-center mt-2">Seat Details</h5>
                <table class="table" border=1>
                    <thead>
                        <tr>
                            <th>予約ID</th>
                            <th>ユーサー名</th>
                            <th>座席番号</th>
                            <th>予約済</th>
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
                                            <td><?php echo $row["id"];?></td>
                                            <td><?php echo $row["username"];?></td>
                                            <td><?php echo $row["seat_number"];?></td>
                                            <td><?php echo $row["reserved"];?></td>
                                            <td>
                                                <a href="deleteseat_dt.php?id=<?php echo $row["id"];?>" class="btn">Delete</a>
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
