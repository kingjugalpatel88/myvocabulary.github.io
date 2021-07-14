<link href='https://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
<style>
  .SearchOverflow {
    height: 20rem;
    overflow: auto;
    resize: vertical;
  }

  .active-pink-4 input[type=text]:focus:not([readonly]) {
    border: 1px solid red;
    box-shadow: 0 0 0 0.5px red;
  }
</style>

<div class="container-fluid">
  <nav class="navbar navbar-expand-lg navbar-light bg-light scrolling-navbar fixed-top py-2 ">
    <a class="navbar-brand" href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/index.php">
      <img src="https://img.icons8.com/color/48/000000/bookmark--v2.png" alt="" width="30rem" height="24">
    </a>
    <a id="len1" class="navbar-brand hoverable" href="http://<?php echo $_SERVER["HTTP_HOST"]; ?>/index.php">My Vocabulary</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ">
        <!-- <li class="nav-item active ">
          <a id="len2" class="nav-link hoverable" href="http://localhost:81/index.php">Home <span class="sr-only">(current)</span></a>
        </li> -->



        <li class="nav-item dropdown">
          <a id="len4" class="nav-link dropdown-toggle hoverable" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Vocabulary List
          </a>

          <div class="dropdown-menu SearchOverflow" aria-labelledby="navbarDropdown">

            <?php
            foreach ($keys as $key => $val) {
              echo  ' <a class="dropdown-item" href="http://' . $_SERVER["HTTP_HOST"] . '/vocabulary.php?search=' . $val . '"> ' . $val . ' </a>';
            }
            echo ' <div class="dropdown-divider"></div>';
            ?>
          </div>
        </li>
      </ul>

      <!-- Search form -->
      <div class="form-inline active-pink-4">

        <input class="form-control form-control-sm mr-3 w-75 " id="search" type="text" placeholder="Search" aria-label="Search">
        <i class="fas fa-search" aria-hidden="true"></i>
      </div>


    </div>
  </nav>
</div>