 <div class="latest">
     <p class=" side-active sticky-top">Letest</p>
     <ul class="nav-sidebar">
         <?php


            for ($i = 36; $i > 26; $i--) {


                echo ' <li><a class="nav-sidebar" href="http://' . $_SERVER["HTTP_HOST"] . '/vocabulary.php?search=' . $keys[$i] . '"> ' . $keys[$i] . ' </a></li>';
            }
            ?>
     </ul>
 </div>

 <div class="popular">
     <p class=" side-active sticky-top">popular</p>
     <ul class="nav-sidebar">
         <?php
            for ($i = 0; $i < 10; $i++) {

                echo ' <li><a class="nav-sidebar" href="http://' . $_SERVER["HTTP_HOST"] . '/vocabulary.php?search=' . $keys[$i] . '">' . $keys[$i] . '</a></li>';
            } ?>

     </ul>
 </div>
 <!-- <div class="List">
                    <p class=" side-active sticky-top">Letest</p>
                    <ul class="nav-sidebar">
                        <?php
                        foreach ($keys as $key => $val) {

                            echo ' <li><a class="nav-sidebar" href="http://' . $_SERVER["HTTP_HOST"] . '/vocabulary.php?search=' . $val . '"> ' . $val . ' </a></li>';
                        }
                        ?>
                    </ul>
                </div> -->