<?php
  session_start();
  error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

  $login = $_SESSION["loggedin"];
	if (isset($_GET['logout'])) {
    $_SESSION = array();
    session_destroy();
    $login = false;
  }
  
  $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Dawn";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="grid.css" />
    <title>Dawn</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Slab:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>
  <body>
  <div class="header">
      <div class="nav">
        <a class="logo" href="index.php">DAWN</a>
        <form action="search.php" class="search-box" method = "get">
            <input
              type="text"
              name="query"
              placeholder="Search Your Movie ....."
              class="nav-search"
              autocomplete="off"
            />
            <button type="password">
              <i class="bx bx-search-alt"></i>
            </button>
        </form>  

        <div class="nav-log">
          <?php
            if ($login === true) {
              echo '<p style = "user-select:none">
              <span>Wellcome '. $_SESSION["username"]; '</span> </p>';
            } else {
              echo '<a href="http://localhost/Final/login.php" class="btn btn-hover">
              <span>log in</span>
            </a>';
            }
          ?>
        </div>
      </div>
    </div>
    <div class="nav-wrapper">
      <ul class="nav-menu" id="nav-menu">
        <li class="nav-item active">
          <a href="#">
            <span class="nav-icon"
              ><ion-icon name="home-outline"></ion-icon
            ></span>
            Home
          </a>
        </li>

        <li class="nav-item">
          <a href="#trending">
            <span class="nav-icon"
              ><ion-icon name="flame-outline"></ion-icon
            ></span>
            trending moives
          </a>
        </li>
        <li class="nav-item">
          <a href="#new-movies">
            <span class="nav-icon"
              ><ion-icon name="film-outline"></ion-icon
            ></span>
            New movies
          </a>
        </li>
        <li class="nav-item" id="myDiv">
          <p style="cursor: pointer; user-select: none">
            <span class="nav-icon"
              ><ion-icon name="albums-outline"></ion-icon
            ></span>
            Genres
          </p>
        </li>
        <?php
        $sql = "select * from genres";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<li class="genre-item genre">';
            echo '<a href="index.php#'.$row['genrename'].'">';
            echo '<span class="nav-icon"';
            echo '><ion-icon name="'.$row['genreicon'].'"></ion-icon';
            echo '></span>';
            echo $row['displayname'];
            echo "</a>";
            echo "</li>";
          }
        }
        ?> 
        <li class="nav-item">
          <a href="index.php?logout=true">
            <span class="nav-icon"
              ><ion-icon name="log-out-outline"></ion-icon
            ></span>
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div class="sections" id="trending">
      <div class="section-wrapper" id="section-wrapper">
        <div class="section-header">Result movies</div>
        <div class="movies-slide row">
            <?php
            $query = $_GET["query"];

            $sql = "SELECT * FROM movies WHERE moviename LIKE '%$query%'";
          
            $result = mysqli_query($conn, $sql);
          
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<a href="moviepage.php" class="movie-item col-3 m-5">';
                            echo '<div>';
                            echo '<img src="./image/'.$row["moviename"].'.jpg" alt="" />';
                            echo '<div class="movie-item-content">';
                            echo '<div class="movie-item-title">'.$row["displayname"].'</div>';
                            echo '<div class="movies-infors-card">';
                            echo '<div class="movies-infor">';
                            echo '<ion-icon name="time-outline"></ion-icon>';
                            echo '<span>120 mins</span>';
                            echo '</div>';
                            echo '<div class="movies-infor">';
                            echo '<ion-icon name="cube-outline"></ion-icon>';
                            echo '<span>FHD</span>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                      echo '<p>Can not find your movie</p>';
                    }
            ?>
          </a>
        </div>
      </div>
    </div>
    <footer class="footer ">
     <div class="section-wrapper">
          <div class="row">
               <div class="col-6 footer-header">
                    <a href="#" style="display: block; text-align: center;" class="logo">
                          Dawn
                    </a>

                    <p style="align-items: center; text-align: center;" class="description">
                         copyright dawn Final
                    </p>
                    <div class="social-list">
                         <a href="#" class="social-item">
                              <i class="bx bxl-facebook">Constract Facebook</i>
                         </a>
                    </div>
              </div>
          </div>
     </div>
 </footer>
    <script src="main.js"></script>
  </body>
</html>
