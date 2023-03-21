<?php
include("header.php");
include("conn.php");
?>

<section class="mt-5">
    <div class="container" id="custome-setting">
        <?php
            $records = $db->query('SELECT * FROM users WHERE id='.$_SESSION["cust_id"]);
            while($record = $records->fetch())
            {
                print("<div class='userinfo'>");
                print("<h6 class='title'>ユーザー情報</h6>");
                print("<p class='username'><span>ユーザー名:　</span>".$record['username']."　</p>");
                print("<p><span>登録メール:　</span>".$record['email']."　</p>");
                print("<p><span>登録時日:　</span>".$record['created_at']."　</p>");
                print("</div>");
            }
        ?>
        <h6 class="booking-title">チケット</h6>
        <div class="bookings-wrapper">
        <?php
            // $records = $db->query('SELECT b.*, s.*, sh.show_date, sh.no_seat, sh.ticket_price, st.time, m.name, m.movie_banner
            //            FROM booking b
            //            JOIN seat_reserved s ON b.cust_id = s.cust_id
            //            JOIN `show` sh ON s.show_id = sh.id
            //            JOIN show_time st ON sh.show_time_id = st.id
            //            JOIN movie m ON sh.movie_id = m.id
            //            WHERE b.cust_id = ' . $_SESSION["cust_id"]);
            // while ($record = $records->fetch()) {
            //     print("<div class='bookings'>");
            //     print("<div class='left'>");
            //     print("<p><span>映画名:　</span>".$record['name']."　</p>");
            //     print("<p><span>チケット価格:　</span>".$record['ticket_price']."　</p>");
            //     print("<p><span>座席番号:　</span>".$record['seat_number']."　</p>");
            //     print("<p><span>上映日:　</span>".$record['show_date']."　</p>");
            //     print("<p><span>上映時間:　</span>".$record['time']."　</p>");
            //     print("</div>");
            //     print("<div class='right'>");
            //     print("<a href='https://drive.google.com/file/d/1HRVILeO6X-j9JMg9X1Lya_cFMw4weDtt/view?usp=share_link' target='_blank'>チケットを見る</a>");
            //     print("</div>");
            //     print("</div>");
            // }
            $records = $db->query("SELECT b.*, s.*, sh.show_date, sh.no_seat, sh.ticket_price, st.time, m.name, m.movie_banner
                       FROM booking b
                       JOIN seat_reserved s ON b.cust_id = s.cust_id
                       JOIN `show` sh ON s.show_id = sh.id
                       JOIN show_time st ON sh.show_time_id = st.id
                       JOIN movie m ON sh.movie_id = m.id
                       WHERE b.cust_id = " . $_SESSION["cust_id"]);

while ($record = $records->fetch()) {
    print("<div class='bookings'>");
    print("<div class='left'>");
    print("<p><span>映画名:　</span>".$record['name']."　</p>");
    print("<p><span>チケット価格:　</span>".$record['ticket_price']."　</p>");
    print("<p><span>座席番号:　</span>".$record['seat_number']."　</p>");
    print("<p><span>上映日:　</span>".$record['show_date']."　</p>");
    print("<p><span>上映時間:　</span>".$record['time']."　</p>");
    print("</div>");
    print("<div class='right'>");
    print("<a href='https://drive.google.com/file/d/1HRVILeO6X-j9JMg9X1Lya_cFMw4weDtt/view?usp=share_link' target='_blank'>チケットを見る</a>");
    print("</div>");
    print("</div>");
}
        ?>
        </div>
    </div>

</section>


<?php
include("footer.php");
?>