<Html>
    <Head>
        <Title>
            Show Rain Info
        </Title>
        <link rel="stylesheet" type = "text/css" href="./home.css" >
        <style>
            table{
                width : 50%;
                /*border : 1px solid #444444; */
                align : center;
                margin : auto;
                place-items: center;
                border-color: darkgreen;
                border-radius: 5px;
                font-size:30px;
            }
            td, th{
                padding : 20px;
                border-bottom : 1px solid #444444;
                text-align : center;
            }
            div {
                background-color: rgba( 255, 255, 255, 0.5 );
            }

            .grid-header{
                background-color:rgb(0, 70, 42);
                text-decoration: none;
                color:white;
                grid-column: 1 / span 5;
                display: inline;
                text-align: center;
                padding: 0.8em;
                padding-top: 1em;
                word-spacing: 0.1em;
                font-weight: bold;
            }
        </style>
    </Head>
    <Body>
        <?php

            $host = 'localhost';
            $user = 'team20';
            $pw = 'team20';
            $db = 'team20';
        
        
            $mysqli = new mysqli($host, $user, $pw, $db);
            
            //사용자로부터 date와 region code를 입력받음.
            $rainday = $_POST["inputraindate"];
            $rainregion = $_POST['inputrainregion'];

            //SELECT
            //date와 region code가 모두 입력되었으면 해당하는 행을 가져옴.
            if(isset($rainday) && isset($rainregion)){
                $sql = "SELECT * FROM PRECIPITAIONTABLE WHERE raindate = '".$rainday."' and region_code = '".$rainregion."'";

                $res = mysqli_query($mysqli, $sql);      
                $result = mysqli_fetch_array($res);

                $prov = $result['region_code'];
                $rate = $result['precipitation'];
            }
        ?>
        <div  class = "grids">
            <div class="grid-header">
                <a href="./home.html" class="grid-header">Home</a>
            </div>
        </div>
        <!--사용자의 input을 통해 검색한 결과를 보여주는 table-->
        <div class="search">
            <table>
                <caption> <?php echo $rainregion; ?> </caption>
                <tr>
                    <th> Date </th>
                    <th> Precipitation </th>
                </tr>
                <tr>
                    <td> <?php echo $rainday; ?> </td>
                    <td> <?php echo $rate; ?></td>
                </tr>
            </table>
        </div>
    </Body>

</Html>

