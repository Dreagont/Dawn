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
  // Xử lý dữ liệu khi người dùng bấm nút Đăng nhập
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $comment = $_POST['comment'];
    $username = $_SESSION["username"];
    $sql = "INSERT INTO bogia(`username`,`comment`) values ('$username','$comment')";
  	$result = mysqli_query($conn, $sql);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Movie Page</title>

    <link rel="shortcut icon" href="./assets/img/Images/logo-foursquare.svg" />

    <link rel="stylesheet" href="moviepage.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="grid.css" />
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
      rel="stylesheet"
    />
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Monoton&family=Open+Sans:ital,wght@0,400;1,300&family=Playfair+Display:wght@400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700&family=Shizuru&display=swap"
      rel="stylesheet"
    />

    <!-- BOX ICON  -->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
   <link rel="stylesheet" href="">
    <link rel="stylesheet" href="./themify-icons/themify-icons.css" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </head>
  <body>
    <div class="container">
      <div class="nav bg-color">
        <a href="index.php" class="logo">DAWN</a>

        <form action="" class="search-box">
          <input
            type="text"
            name="search"
            placeholder="Search Your Movie ....."
            class="nav-search"
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
    <section class="movie-banner">
      <div class="hero-wrapper">
        <div class="movie-banner-item">
          <img src="./image/bogiaver.jpg" alt="" />
        </div>

        <div class="movie-card">
          <img src="./image/bogia.jpg" alt="" />

          <div class="movie-card-content">
            <h2>Bo gia</h2>

            <ul class="movie-card-btns">
              <li class="movie-card-btn" onclick="location.href='index.php#vietnam'">vietnam</li>
            </ul>

            <p class="movie-card-description">
              BỐ GIÀ là một bộ phim Web drama tình cảm gia đình, một dự án phim
              hài Tết 2020 của Trấn Thành
            </p>
            <div class="star-rater">
            <input type="radio" id="star5" name="rating" value="5">
            <input type="radio" id="star4" name="rating" value="4">
            <input type="radio" id="star3" name="rating" value="3">
            <input type="radio" id="star2" name="rating" value="2">
            <input type="radio" id="star1" name="rating" value="1">
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="international-trailer">
      <div class="trailer-title">
        <h3>trailer</h3>
      </div>
      <div class="international-vid">
        <iframe
          width="1188"
          height="668"
          src="https://www.youtube.com/embed/jluSu8Rw6YE"
          title="BỐ GIÀ - khởi chiếu 12/03/2021/ OFFICIAL TRAILER / TRẤN THÀNH"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
          allowfullscreen
        ></iframe>
      </div>
    </section>

    <section class="international-trailer margin">
      <div class="trailer-title">
        <h3>Movie</h3>
      </div>
      <iframe
        width="1217"
        height="510"
        src="https://www.youtube.com/embed/oA-BhGNK7qw"
        title="BỐ GIÀ [FULL] - PHIM GIA ĐÌNH | TRẤN THÀNH, MÁ GIÀU, LÊ GIANG, ANH ĐỨC, TUẤN TRẦN, UYỂN ÂN"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        allowfullscreen
      ></iframe>
    </section>

    <div class="comment-box" id = "comment">
     <h3>Leave a Comment:</h3>
		<form class="comment-form" action="moviepage.php" method="post">
			<label for="comment">Comment:</label>
			<textarea name="comment"></textarea>
      <?php
      if (isset($_SESSION["loggedin"])) {
        echo '<input type="submit" value="Submit" onclick = "location.href='.'"moviepage.php#comment">';
      }
      ?>
			
		</form>
		<div class="comments">
			<h3>Comments:</h3>
			<?php
				$sql = "select * from bogia";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo '<div class="comment">';
					  echo '<h4>' . $row["username"] . '</h4>';
					  echo '<p>' . $row["comment"] . '</p>';
					  echo '</div>';
          }
        }
			?>
		</div>
    </div>

    <footer style="padding-top: 8rem" class="footer">
      <div style="left: 13.5%" class="section-wrapper">
        <div class="row">
          <div class="col-6 footer-header">
            <a href="#" style="display: block; text-align: center" class="logo">
              Dawn
            </a>

            <p
              style="align-items: center; text-align: center"
              class="description"
            >
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
