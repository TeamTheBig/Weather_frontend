<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TheBig</title>
    <link rel="stylesheet" href="./hyuna.css" type="text/css">
    <style>
        table,
        th,
        td {
            padding: 1%;
        }
    </style>
</head>

<body>
    <div class="grids">
        <div class="grid-header">
            <nav>
                <ul>
                    <li><a href="home.html" class="grid-header">Home</a></li>

                    <li> <a href="#">Weather Information<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="#">Category One</a></li>
                            <li><a href="#">Category Two</a></li>
                            <li><a href="visibility.php">Visiable Distance</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Ranking<i class='fa fa-angle-down'></i></a>
                        <ul>`
                            <li><a href="fine_particles.php">Fine particles</a></li>
                            <li><a href="ozone.php">Ozone</a></li>
                        </ul>
                    </li>

                    <li> <a href="#">Community<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li><a href="user_satisfaction.php">User Satisfaction</a></li>
                            <li><a href="#">Sensory Temperature</a></li>
                            <li><a href="#">About clothes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="grid-logo">
            <h1 id="logo">Fine particles Infomation</h1>
            <p><br><b>This page will shows the ranking in order of the region with the highest fine particles and ultra
                    fine particles concentration on a monthly basis.</b></p>
        </div>


        <div class="grid-content">
            <?php
            $conn = mysqli_connect("localhost", "team20", "team20", "weather");

            /* 롤업 이용한 뷰의 날짜, 지역, 평균 미세먼지 정보 select */
            $query1 = "SELECT DATES, CITY, AVG_FINE_DUST
            FROM AVG_FINE_DUST_BY_DATES
            ORDER BY CITY, DATES";
            $result1 = mysqli_query($conn, $query1);

            /* 롤업 이용한 뷰의 날짜, 지역, 평균 초미세먼지 정보 select */
            $query2 = "SELECT DATES, CITY, AVG_ULTRAFINE_DUST
            FROM AVG_FINE_DUST_BY_DATES
            ORDER BY CITY, DATES";
            $result2 = mysqli_query($conn, $query2);
            ?>

            <FORM>
                <p>Fine dust concentration trend of October (Blank means 'All')</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>City</td>
                            <td>Dates</td>
                            <td>Average fine dust</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result1)) { ?>
                    <tr>
                        <td>
                            <?= $row['CITY'] ?>
                        </td>
                        <td>
                            <?= $row['DATES'] ?>
                        </td>
                        <td>
                            <?= $row['AVG_FINE_DUST'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>

                <p>Ultra fine dust concentration trend of October (Blank means 'All')</p>
                <TABLE>
                    <thead>
                        <tr>
                            <td>City</td>
                            <td>Dates</td>
                            <td>Average ultrafine dust</td>
                        </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($result2)) { ?>
                    <tr>
                        <td>
                            <?= $row['CITY'] ?>
                        </td>
                        <td>
                            <?= $row['DATES'] ?>
                        </td>
                        <td>
                            <?= $row['AVG_ULTRAFINE_DUST'] ?>
                        </td>
                    </tr>
                    <?php } ?>
                </TABLE>
            </FORM>
            <?php
            mysqli_free_result($result1);
            mysqli_free_result($result2);
            mysqli_close($conn);
            ?>
        </div>
        <div class="grid-footer">
            <li>Big Data Application Team TheBig</li>
        </div>
    </div>
</body>

</html>

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $('nav li').hover(
        function () {
            $('ul', this).stop().slideDown(200);
        },
        function () {
            $('ul', this).stop().slideUp(200);
        }
    );
</script>