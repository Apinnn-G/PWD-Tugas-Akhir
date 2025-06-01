<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Film</title>
    <link rel="stylesheet" href="style.css">
    <!-- Box Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- Link Swiper's CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <!-- Navbar -->
     <header>
        <a href="#" class="logo">
            <i class='bx bx-movie' ></i> NONTONIQ
        </a>
        <div class="bx bx-menu" id="menu-icon"></div>

        <form action="search.php" method="GET" class="search-form">
        <input type="text" name="keyword" placeholder="Cari film..." required>
        <button type="submit"><i class="fas fa-search"></i></button>
        </form>

        <!-- Menu -->
         <ul class="navbar">
            <li><a href="#home" class="home-active">Home</a></li>
            <li><a href="#movies">Movies</a></li>
            <li><a href="top_films.php">Top Films</a></li>
            <li><a href="#coming">Coming</a></li>
            <li><a href="#newsletter">Newsletter</a></li>
        </ul>
         <?php if (isset($_SESSION['user'])): ?>
        <a href="logout_users.php" class="btn">Logout</a>
        <?php else: ?>
        <a href="login.php" class="btn">Sign In</a>
        <?php endif; ?>
     </header>
     <!-- Home -->
      <section class="home swiper" id="home">
        <div class="swiper-wrapper">
            <!-- Box 1 -->
            <div class="swiper-slide conatiner">
                <img src="img/home1.jpg" alt="">
                <div class="home-text">
                    <span>Coming Soon</span>
                    <h1>Godaan Setan <br> Yang Terkutuk</h1>
                </div>
            </div>
            <!-- Box 2 -->
             <div class="swiper-slide conatiner">
                <img src="img/home2.jpg" alt="">
                <div class="home-text">
                    <span>Coming Soon</span>
                    <h1>Dasim: <br> Jin Peneror Rumah</h1> 
                    </a>
                </div>
            </div>
            <!-- Box 3 -->
             <div class="swiper-slide conatiner">
                <img src="img/home3.jpg" alt="">
                <div class="home-text">
                    <span>Coming Soon</span>
                    <h1>Final Detination: <br> Bloodlines</h1>
                </div>
            </div>
    
            </div>
            
            <div class="swiper-pagination"></div>
      </section>
      <!-- Movies -->
      <section class="movies" id="movies">
        <h2 class="heading">Opening This Week</h2>
        <!-- Movies Conatiner -->
         <div class="movies-container">
            <!-- Box 1 -->
             <div class="box">
                <a href="film_detail.php?id=11">
                    <div class="box-img">
                        <img src="img/m1.jpg" alt="Lilo & Stitch">
                    </div>
                </a>
                    <h3>Lilo & Stitch</h3>
                    <span>1h 48m | Adventure</span>
            </div>
            <!-- Box 2 -->
             <div class="box">
                <a href="film_detail.php?id=12">
                    <div class="box-img">
                        <img src="img/m2.jpg" alt="Cocote Tonggo">
                    </div>
                </a>
                    <h3>Cocote Tonggo</h3>
                    <span>1h 57m | Comedy</span>
            </div>
            <!-- Box 3 -->
             <div class="box">
                <a href="film_detail.php?id=13">
                    <div class="box-img">
                        <img src="img/m3.jpg" alt="Pembantaian Dukun Santet">
                    </div>
                </a>
                    <h3>Pembantaian Dukun Santet</h3>
                    <span>1h 32m | Horror</span>
            </div>
            <!-- Box 4 -->
             <div class="box">
                <a href="film_detail.php?id=14">
                    <div class="box-img">
                        <img src="img/m4.jpg" alt="Mungkin Kita Perlu Waktu">
                    </div>
                </a>
                    <h3>Mungkin Kita Perlu Waktu</h3>
                    <span>1h 38m | Family, Drama</span>
            </div>
            <!-- Box 5 -->
             <div class="box">
                <a href="film_detail.php?id=15">
                    <div class="box-img">
                        <img src="img/m5.jpg" alt="Pengepungan Di Bukit Duri">
                    </div>
                </a>
                    <h3>Pengepungan Di Bukit Duri</h3>
                    <span>1h 58m | Thriller</span>
            </div>
            <!-- Box 6 -->
             <div class="box">
                <a href="film_detail.php?id=16">
                    <div class="box-img">
                        <img src="img/m6.jpg" alt="Mendadak Dangdut">
                    </div>
                </a>
                    <h3>Mendadak Dangdut</h3>
                    <span>1h 49m | Comedy</span>
            </div>
            <!-- Box 7 -->
             <div class="box">
                <a href="film_detail.php?id=17">
                    <div class="box-img">
                        <img src="img/m7.jpg" alt="Mumu">
                    </div>
                </a>
                    <h3>Mumu</h3>
                    <span>1h 51m | Drama</span>
            </div>
            <!-- Box 8 -->
             <div class="box">
                <a href="film_detail.php?id=18">
                    <div class="box-img">
                        <img src="img/m8.jpg" alt="Gundik">
                    </div>
                </a>
                    <h3>Gundik</h3>
                    <span>1h 52m | Horror</span>
            </div>
            <!-- Box 9 -->
             <div class="box">
                <a href="film_detail.php?id=19">
                    <div class="box-img">
                        <img src="img/m9.jpg" alt="Thunderbolts">
                    </div>
                </a>
                    <h3>Thunderbolts</h3>
                    <span>2h 7m | Action</span>
            </div>
            <!-- Box 10 -->
             <div class="box">
                <a href="film_detail.php?id=20">
                    <div class="box-img">
                        <img src="img/m10.jpg" alt="The Red Envelope">
                    </div>
                </a>
                    <h3>The Red Envelope</h3>
                    <span>2h 8m | Comedy</span>
            </div>
         </div>
      </section>
      <!-- Coming -->
       <section class="coming" id="coming">
        <h2 class="heading">Coming Soon</h2>
        <!-- Coming Container -->
         <div class="coming-container swiper">
            <div class="swiper-wrapper">
            <!-- Box 1 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming1.jpg" alt="">
            </div>
            <h3>Godaan Setan Yang Terkutuk</h3>
            <span>1h 20m | Horror</span>
         </div>
         <!-- Box 2 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming2.jpg" alt="">
            </div>
            <h3>Jumbo</h3>
            <span>1h 20m | Fantasy</span>
         </div>
         <!-- Box 3 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming3.jpg" alt="">
            </div>
            <h3>How To Train Your Dragon</h3>
            <span>2h 5m | Adventure</span>
         </div>
         <!-- Box 4 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming4.jpg" alt="">
            </div>
            <h3>Waktu Maghrib 2</h3>
            <span>1h 47m | Horror</span>
         </div>
         <!-- Box 5 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming5.jpg" alt="">
            </div>
            <h3>Runt</h3>
            <span>1h 31m | Adventure</span>
         </div>
         <!-- Box 6 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming6.jpg" alt="">
            </div>
            <h3>Doti - Tumbal Ilmu Hitam</h3>
            <span> ? | Horror</span>
         </div>
         <!-- Box 7 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming7.jpg" alt="">
            </div>
            <h3>Mission:Impossible-The Final Reckoning</h3>
            <span>2h 49m | Action</span>
         </div>
         <!-- Box 8 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming8.jpg" alt="">
            </div>
            <h3>Angel Pol</h3>
            <span> ? | Comedy</span>
         </div>
         <!-- Box 9 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming9.jpg" alt="">
            </div>
            <h3>Bad Genius</h3>
            <span>1h 36m | Action</span>
         </div>
         <!-- Box 10 -->
             <div class="swiper-slide box">
            <div class="box-img">
                <img src="img/coming10.jpg" alt="">
            </div>
            <h3>Ballerina</h3>
            <span>2h 4m | Action</span>
         </div>
         </div>

         </div>
       </section>
       <!-- Newletter -->
        <section class="newsletter" id="newsletter">
            <h2>Subscribe To Get <br>Newsletter</h2>
            <form action="">
                <input type="email" class="email" placeholder="Enter Email..." required>
                <input type="submit" value="Subscribe" class="btn">
            </form>
        </section>
        <!-- Footer -->
         <section class="footer">
            <a href="#" class="logo">
                <i class='bx bx-movie' ></i> NONTONIQ
            </a>
            <div class="social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-tiktok"></i></a>
            </div>
         </section>
         <!-- Copyright -->
          <div class="copyright">
            <p>&#169;  NONTONIQ All Right Reserved</p>
          </div>

      <!-- Swiper JS -->
      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

      <!-- Link To Custom JS -->
       <script src="main.js"></script>
       <script>
        window.addEventListener("scroll", function () {
            const header = document.querySelector("header");
            header.classList.toggle("shadow", window.scrollY > 0);
        });
       </script>

</body>
</html>