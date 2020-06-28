<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname); //데이터베이스 연결
?>

<!DOCTYPE html>
<html>
    <head>
        <title>영화 평가</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;}
        </style>
        <script>
            function displayImage(moviename) {
                var image = document.getElementById("canvas");
                image.src = "./image/"+moviename.value+".jpg";
            }
        </script>
    </head>
    
    <body>
        <form name="evaluate" method="POST" action="evaluate_movie.php">
            <table align="center">
                <tr>
                    <td>
                        <br><br><br><br><div id="title">Movie Evaluation</div><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" style="width:150px; height:40px; background-color:#D8F781; border-color:#D8F781; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" >           
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><br>영화 : &nbsp;
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
                        명대사 : &nbsp;
                            <input type="text" name="movie_quote" style="width:300px" placeholder="100 characters limited">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        평점 : &nbsp;
                            <input type="text" name="movie_score" style="width:100px" placeholder="perfect 10">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        리뷰 : &nbsp;
                            <input type="text" name="movie_review" style="width:320px" placeholder="1000 characters limited">&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><input type="submit" style="width:100px; height:40px; background-color:#EBB2F2; border-color:#EBB2F2; border-radius:30px;" value="Complete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <br><img id="canvas" src="./image/기생충.jpg" width="270" height="370"/> &nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>

