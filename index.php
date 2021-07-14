<html>

<head>

    <?php
    echo file_get_contents("include/meta.php");
    ?>


    <style>
        .box {
            padding-top: 50px;
            flex: 0 1 100%;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            flex-shrink: 1;
            flex-grow: 1;
            flex-basis: 50px;
            justify-content: center;
        }

        .beautify {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            flex: 0 1 45rem;
            justify-content: center;

        }

        .card {
            padding: 0.5rem;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            margin: 1rem;
            flex: 0 1 10rem;


        }

        .card-title {
            text-align: center;
        }
    </style>
</head>

<body>





    <?php
    if (file_exists("include/ALL.json")) {
        $result = json_decode(file_get_contents("include/ALL.json"), true);
        $keys = array();

        if ($result > 0) {
            foreach ($result[0] as $key => $val) {
                array_push($keys, $key);
            }
        } else {
            $keys[] = 'No Record Found';
        }
    } else {
        $keys[] = 'No Record Found';
    }
    // echo $_SERVER['REQUEST_URI'];
    include("include/navbhar.php");

    echo '<div class="box"> <div class="beautify">';
    for ($i = 0; $i < sizeof($keys); $i++) {

        if (!empty($keys[$i])) {
            if (file_exists("images/" . $keys[$i]  . ".png")) {
                $img =  $keys[$i];
            } else {
                $img = "new";
            }
            echo '<div class="card">
  <div class="card-body">
    <img class="card-img-top" src="images/' . $img . '.png"  alt="/images/new.png" >
      <h5 class="card-title">' . $keys[$i] . '</h5>
        <a href="http://' . $_SERVER["HTTP_HOST"] . '/vocabulary.php?search=' . $keys[$i] . '" class="btn btn-danger">Read more</a>
    </div>    
</div> ';
        }
    }
    echo '</div><div class="sidebar">';

    include("include/sidebar.php");

    echo '</div></div>';
    include("include/footer.php");

    ?>




</body>

</html>