<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>영화 예매</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;
        </style>
        <script>
            function displayImage(elem) {
                var image = document.getElementById("canvas");
                image.src = "./image/"+elem.value+".jpg";
            }
        </script>
    </head>
    <body>
        <form name="reserve" method="POST" action="reserve_movie.php">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><div id="title">Movie Booking</div><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" style="width:150px; height:40px; background-color:#D8F781; border-color:#D8F781; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >           
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><div>예매정보입력<br><br>
                    </td>
                </tr>
                
                <tr>
                    <td> 
                        극장 : &nbsp;
                        <select name = "theater_name">
                            <?php
                                $sql = "SELECT THEATER_NAME FROM THEATER_INFO";
                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row["THEATER_NAME"]}'>{$row["THEATER_NAME"]}</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        영화 : &nbsp;
                        <select name = "movie_name" onchange="displayImage(this);">
                            <?php
                                $sql = "SELECT DISTINCT MOVIE_NAME FROM MOVIE_INFO";
                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row["MOVIE_NAME"]}'>{$row["MOVIE_NAME"]}</option>";
                                }
                            ?>
                        </select>
                    </td>  
                </tr>
                <tr>
                    <td>
                        시간 : &nbsp;
                        <select name = "movie_time">
                            <?php
                                $sql = "SELECT DISTINCT MOVIE_TIME FROM MOVIE_INFO";
                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row["MOVIE_TIME"]}'>{$row["MOVIE_TIME"]}</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        구역 : &nbsp;    
                        <input type="text" name="seat_sector" style="width:100px; " placeholder="구역(A, B, C)">
                    </td>
                </tr>
                <tr>
                    <td>     
                        자리번호 : &nbsp;
                        <input type="text" name="seat_number" style="width:100px; " placeholder="자리번호">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="submit" style="width:100px; height:40px; background-color:#EBB2F2; border-color:#EBB2F2; border-radius:30px;" value="Complete" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br><img id="canvas" src="./image/기생충.jpg" width="230" height="310"/> &nbsp;&nbsp;&nbsp;
                        <img src="./image/좌석배치도.png" alt="좌석배치도" width="500" height="310" />
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
