<meta charset="UTF-8">
<?php
    $conn = mysqli_connect("localhost","root","1234") ;
    $dbname="MOVIE_DB";
    mysqli_set_charset($conn, 'UTF8');
    mysqli_select_db($conn,$dbname);
?>

<html>
    <head>
        <title>영화검색</title>
        <style>
            #title{font-size:40pt; text-align:center}
            td{align:center; text-align:center;}
        </style>
    </head>
    <body>
        <form name="search" method="POST" action="search_movie.php">
            <table width="100%" height="200px" align="center" border="0">
                <tr height="70px"></tr>
                <tr>
                    <td><div id="title">Search Movie</div><br><br></td>
                </tr>
                <tr>
                    <td>
                        <input type="button" style="width:150px; height:40px; background-color:#D8F781; border-color:#D8F781; border-radius:30px;" onclick="location.href='./menu_screen.php'" value="To Menu" > 
                    </td>
                </tr>
                <tr>
                    <td><br><br>
                        <select name = "movie_name" style="width: 200px; height:30px">
                            <?php
                                $sql = "SELECT DISTINCT MOVIE_NAME FROM MOVIE_INFO";
                                $result = mysqli_query($conn,$sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='{$row["MOVIE_NAME"]}'>{$row["MOVIE_NAME"]}</option>";
                                }
                            ?>
                        </select>
                        &nbsp;&nbsp;
                        <input type="submit" style="width:130px; height:50px; background-color:#F2F5A9; border-color:#F2F5A9; border-radius:50px;" value="Search" >
                    </td>
                </tr>
               
                
                
                    
                  
               
               
                
                <tr>
                    <td>
                        <br><br><a href="url"><img src="./image/기생충.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/어벤져스_앤드게임.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/토이스토리4.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/알라딘.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/고질라_킹 오브 몬스터.jpg" width="230" height="300"></a>
                        &nbsp;&nbsp;&nbsp;<a href="url"><img src="./image/로켓맨.jpg" width="230" height="300"></a>
                    </td>
                </tr>
            </table> 
        </form>  
    </body>
</html>


