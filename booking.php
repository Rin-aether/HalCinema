<?php
session_start();
if(empty($_SESSION["username"]))
{
    header("Location:index.php");
} else {
    include("header.php");
    include("conn.php");
}

$checked_value=0;



if(isset($_POST["btn_booking"]))
{
    $con=new connec();
    $cust_id=$_POST["cust_id"];
    $show_id=$_POST["show_id"];
    $no_ticket=$_POST["no_ticket"];
    $bkng_date=$_POST["booking_date"];
    $total_amnt=(1500* $no_ticket);
    $seat_number=$_POST["seat_dt"];
    $seat_arr=explode(", ",$seat_number);
    foreach($seat_arr as $item)
    {
        $sql="insert into seat_reserved values(0,$show_id,$cust_id,'$item',true)";
        $abc= $con->insert_lastid($sql);
    }
    $sql="INSERT INTO seat VALUES(0,$cust_id,$show_id,$no_ticket)";
    $seat_dt_id=$con->insert_lastid($sql);

    $sql="INSERT INTO booking VALUES(0,$cust_id,$show_id,$no_ticket,$seat_dt_id,'$bkng_date',$total_amnt)";
    $con->insert($sql,"Your Ticket is Booked");
    // header('Location: ./mypage.php');
    $url = "mypage.php";
    echo "<script>window.location.href='$url';</script>";
}

if(isset($_GET['movieId'])){
    $rows = array();
    $sql = "SELECT `id` FROM `show_time` WHERE `time`='".$_GET['showTime']."'";
    $showtime = $db->query($sql);
    while($showtimes = $showtime->fetch() ){

        $sql ="SELECT `id` FROM `show` WHERE `movie_id`=".$_GET['movieId']." AND `show_date`='".$_GET['showDate']."' AND `show_time_id`='".$showtimes['id']."'";
        $showid = $db->query($sql);
        while($showIdDate = $showid->fetch()){
            $sql = "SELECT `seat_number` FROM `seat_reserved` WHERE `show_id`='".$showIdDate['id']."'";
            $reserved = $db->query($sql);
            while($reservedSeat = $reserved->fetch()){
                $rows[] = $reservedSeat['seat_number'];
            }

        }
    }
    $json = (json_encode($rows));
    
}

?>


<script>
let allseat = [];
const reservedSeat = <?php echo $json?>;
$(document).ready(function(){
    for(i=1;i<=5;i++)
    {
        for(j=1;j<=10;j++)
        {
            let seatNum = 'R'+`${i}`+'S'+`${j}`
            allseat.push(seatNum)

            var template = document.querySelector('#seat-chart');
            var instance = template.content.cloneNode(true);
            instance.querySelector('label').setAttribute('for', seatNum);
            instance.querySelector('input').setAttribute('id', seatNum);
            instance.querySelector('input').value = seatNum;
            instance.querySelector('#seatnum').textContent = seatNum;


            console.log(reservedSeat);
            if(reservedSeat.includes(seatNum)){
                instance.querySelector('input').setAttribute('disabled', 'disabled');
                instance.querySelector('.material-symbols-outlined').classList.add("md-dark");
                instance.querySelector('#seatnum').classList.add("seatnum-dark");
            }else {
                instance.querySelector('.material-symbols-outlined').classList.add("pointer");
            }

            document.querySelector('#seat-area').appendChild(instance);

        }
    }

    var trigger = document.querySelectorAll(".material-symbols-outlined");
    trigger.forEach(function(target) {
        target.addEventListener('click', function() {
            target.classList.toggle('forcus');
        });
    });
});

function checkboxtotal()
{
    var seat=[];
    $('input[name="seat_chart[]"]:checked').each(function(){
    seat.push($(this).val());
    });
    var st=seat.length;
    document.getElementById('no_ticket').value=st;
    var total=(st*1500)+"円";
    $('#price_details').text(total);
    $('#seat_dt').val(seat.join(", "));
}

</script>

<section class="mt-5">
    <h5 class="text-center">映画予約</h5>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>作品</h5>
                <?php
                if (isset($_GET['movieId'])) {
                    $records = $db->query('SELECT * FROM movie WHERE id='.$_GET['movieId']);
                    while($record = $records->fetch() )
                    {
                        print("<p>".$record['name']."</p>");
                        print("<p2>".$record['movie_name_en']."</p2>");
                    }
                }
                ?>
                <h5>日時</h5>
                <?php
                    print("<p>".$_GET['showDate']."</p>");
                    print("<p>".$_GET['showTime']."</p>");
                ?>
                <h5>劇場</h5>
                <p>HALシネマ</p>
                <form method="post" class="mt-5">
                    <container>
                        <div class="row hidden-form">
                            <label for="cust_id"><b>ユーザーId</b></label>
                            <input type="text" name="cust_id" required value="<?php echo $_SESSION["cust_id"]; ?>">
                        </div>
                        <div class="row hidden-form">
                            <label for="show-id"><b>Show-Id</b></label>
                            <input type="text" name="show_id" required value="<?php echo $_GET['showId']; ?>">
                        </div>
                        <div class="row hidden-form">
                            <label for="no-ticket"><b>座席数</b></label>
                            <input type="text" id="no_ticket" name="no_ticket" required>
                        </div>
                        <div class="row hidden-form">
                            <label for="number"><b>座席</b></label>
                            <input type="text" name="seat_dt" id="seat_dt" required>
                        </div>
                        <div class="row hidden-form">
                            <label for="booking_date"><b>日時</b></label>
                            <input type="text" name="booking_date" required value="<?php echo $_GET['showDate']; ?>">
                        </div>
                        <button type="submit" name="btn_booking" class="reserve-btn">予約する</button>
                    </container>
                </form> 
            </div>
            <div class="col-md-7">
                <div id="seat-map" id="seatCharts">
                    <h3 class="text-center mt-5">Select Seat</h3>
                    <hr>

                    <div id="seat-area" class="seat-area">
                        <div class="screen-area">SCREEN 1</div>
                        <template id="seat-chart">
                            <label class="check-box">
                                <input class="seat-checkbox" type="checkbox" value="{{seatNumber}}" name="seat_chart[]" onclick="checkboxtotal()">
                                <div class="seat-group">
                                    <span id="seat-type" class="material-symbols-outlined md-48">chair</span>
                                    <span id="seatnum" class="seatnum">{{setNum}}</span>
                                </div>
                            </label>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

    </div>
</section>

<?php
include("footer.php");
?>