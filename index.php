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
        <a class="logo" href="#">DAWN</a>
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
            echo '<a href="#'.$row['genrename'].'">';
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
    <div class="big-section" id="big-section">
      <div class="slide-container" id="big-slider">
        <div class="big-slide-item active">
          <img src="./image/endgame.jpg" alt="Poster" />

          <div class="big-slide-item-content">
            <div class="item-content-wrapper">
              <div class="item-content-title">Avengers: EndGame</div>

              <div class="movies-infors">
                <div class="movies-infor">
                  <ion-icon name="bookmark-outline"></ion-icon>
                  <span>9.5</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>120 mins</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="cube-outline"></ion-icon>
                  <span>FHD</span>
                </div>
              </div>

              <div class="item-content-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                possimus eius. Deserunt non odit, cum vero reprehenderit
                laudantium odio vitae autem quam, incidunt molestias ratione
                mollitia accusantium, facere ab suscipit.
              </div>
            </div>
          </div>

          <div class="play-movies">
            <div class=""></div>
            <a href="https://www.youtube.com/watch?v=TcMBFSGVi1c">
              <i class="bx bxs-right-arrow"></i>
            </a>
            <div class="btn-watch">
              <span>watch</span>
            </div>
          </div>
        </div>

        <div class="big-slide-item">
          <img src="./assets/img/Images/p-6.jpg" alt="Poster" />

          <div class="big-slide-item-content">
            <div class="item-content-wrapper">
              <div class="item-content-title">black widow</div>

              <div class="movies-infors">
                <div class="movies-infor">
                  <ion-icon name="bookmark-outline"></ion-icon>
                  <span>9.5</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>120 mins</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="cube-outline"></ion-icon>
                  <span>FHD</span>
                </div>
              </div>

              <div class="item-content-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                possimus eius. Deserunt non odit, cum vero reprehenderit
                laudantium odio vitae autem quam, incidunt molestias ratione
                mollitia accusantium, facere ab suscipit.
              </div>
            </div>
          </div>

          <div class="play-movies">
            <div class="ring"></div>
            <a href="https://www.youtube.com/watch?v=ybji16u608U">
              <i class="bx bxs-right-arrow"></i>
            </a>
            <div class="btn-watch">
              <span>watch trailer</span>
            </div>
          </div>
        </div>

        <div class="big-slide-item">
          <img src="./assets/img/Images/transformer-banner.jpg" alt="Poster" />

          <div class="big-slide-item-content">
            <div class="item-content-wrapper">
              <div class="item-content-title">Transformer</div>

              <div class="movies-infors">
                <div class="movies-infor">
                  <ion-icon name="bookmark-outline"></ion-icon>
                  <span>9.5</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>120 mins</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="cube-outline"></ion-icon>
                  <span>FHD</span>
                </div>
              </div>

              <div class="item-content-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                possimus eius. Deserunt non odit, cum vero reprehenderit
                laudantium odio vitae autem quam, incidunt molestias ratione
                mollitia accusantium, facere ab suscipit.
              </div>
            </div>
          </div>

          <div class="play-movies">
            <div class="ring"></div>
            <a href="https://www.youtube.com/watch?v=Q3VKie4pChs">
              <i class="bx bxs-right-arrow"></i>
            </a>
            <div class="btn-watch">
              <span>watch trailer</span>
            </div>
          </div>
        </div>

        <div class="big-slide-item">
          <img src="./assets/img/Images/p-3.jpg" alt="Poster" />

          <div class="big-slide-item-content">
            <div class="item-content-wrapper">
              <div class="item-content-title">bloodShot</div>

              <div class="movies-infors">
                <div class="movies-infor">
                  <ion-icon name="bookmark-outline"></ion-icon>
                  <span>9.5</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="time-outline"></ion-icon>
                  <span>120 mins</span>
                </div>
                <div class="movies-infor">
                  <ion-icon name="cube-outline"></ion-icon>
                  <span>FHD</span>
                </div>
              </div>

              <div class="item-content-description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas,
                possimus eius. Deserunt non odit, cum vero reprehenderit
                laudantium odio vitae autem quam, incidunt molestias ratione
                mollitia accusantium, facere ab suscipit.
              </div>
            </div>
          </div>

          <div class="play-movies">
            <div class="ring"></div>
            <a href="https://www.youtube.com/watch?v=vOUVVDWdXbo">
              <i class="bx bxs-right-arrow"></i>
            </a>
            <div class="btn-watch">
              <span>watch trailer</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section" id="trending">
      <div class="section-wrapper" id="section-wrapper">
        <div class="section-header">Trending movies</div>

        <div class="movies-slide row">
          <a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
              <div></div>
            </div>
          </a>
          <a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>
                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>
                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/spiderman.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">Spiderman</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="section" id="new-movies">
      <div class="section-wrapper" id="section-wrapper">
        <div class="section-header">New movies</div>

        <div class="movies-slide row">
          <a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>

              <div></div>
            </div>
          </a>
          <a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div> </a
          ><a href="moviepage.php" class="movie-item col-3 m-5">
            <div>
              <img src="./image/deadpool2.jpg" alt="" />
              <div class="movie-item-content">
                <div class="movie-item-title">deadpool 2</div>

                <div class="movies-infors-card">
                  <div class="movies-infor">
                    <ion-icon name="time-outline"></ion-icon>
                    <span>120 mins</span>
                  </div>
                  <div class="movies-infor">
                    <ion-icon name="cube-outline"></ion-icon>
                    <span>FHD</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="movie-item-overlay"></div>
            <div class="movie-item-act">
              <i class="bx bxs-right-arrow"></i>
            </div>
          </a>
        </div>
      </div>
    </div>

    <?php
      $sql = "select * from genres";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="section" id="'.$row['genrename'].'">';
          echo '<div class="section-wrapper" id="section-wrapper">';
          echo '<div class="section-header">'.$row['genrename'].' movies</div>';
          echo '<div class="movies-slide row">';
          $query = "select * from movies where genre = '".$row['genrename']."'";
          $exce = mysqli_query($conn, $query);
          while($movie = mysqli_fetch_assoc($exce)) {
            echo '<a href="moviepage.php" class="movie-item col-3 m-5">';
            echo '<div>';
            echo '<img src="./image/'.$movie['moviename'].'.jpg" alt="" />';
            echo '<div class="movie-item-content">';
            echo '<div class="movie-item-title">'.$movie['moviename'].'</div>';
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
            echo ' </a>';
          }
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      }
    ?>
          
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
