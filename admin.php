<?php
require 'config.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mod - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: iPortfolio - v3.10.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Mobile nav toggle button ======= -->
    <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="d-flex flex-column">

            <div class="profile">
                <img src="assets/img/profile-img.jpg" alt="" class="img-fluid rounded-circle">
                <h1 class="text-light"><a href="index.html">Alex Smith</a></h1>
                <div class="social-links mt-3 text-center">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>

            <nav id="navbar" class="nav-menu navbar">
                <ul>
                    <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i>
                            <span>Home</span></a></li>
                    <li><a href="#items" class="nav-link scrollto"><i class="bx bx-user"></i> <span>Items</span></a>
                    </li>
                    <li><a href="#ajouter" class="nav-link scrollto"><i class="bx bx-file-blank"></i>
                            <span>Ajouter</span></a></li>
                    <li><a href="#list de reservation" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                            <span>Liste de reservation</span></a></li>
                    <li><a href="#list de validation" class="nav-link scrollto"><i class="bx bx-server"></i> <span>List
                                de validation</span></a></li>
                    <li><a href="#retourner des emprunts" class="nav-link scrollto"><i class="bx bx-envelope"></i>
                            <span>Retourner des emprunts</span></a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Alex Smith</h1>
            <p>I'm <span class="typed" data-typed-items="Developer, Freelancer"></span></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="items" class="items">
            <div class="container">

                <div class="section-title">
                    <h2>books</h2>
                    <div class="row">
                        <?php
                    $result = mysqli_query($conn, 'SELECT * FROM `ouvrages`');
                    $row = mysqli_fetch_assoc($result);
                    while ($row = mysqli_fetch_assoc($result))
                    echo'
                    <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="'.$row['image_cover'].'" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> '.$row['titre'].'</h5>
                                <h6  class="fw-bolder">Etat : '.$row['etat'].'</h6>
                                <h6  class="fw-bolder">Type : '.$row['type'].'</h6>
                                <h6  class="fw-bolder">Date_achat : '.$row['date_achat'].'</h6>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <form action="delet.php" method="Post">
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <input type="submit" class="btn btn-outline-dark mt-auto" value="edit">
                            <input type="hidden" name="idDelet" value="'.$row['id_ouvrage'].'">
                            <input type="submit" class="btn btn-outline-dark mt-auto" value="delet">
                        </div>
                    </div>
                </div>
                </form>'
                ?>

                    </div>
        </section><!-- End About Section -->

        <!-- ======= ajouter Section ======= -->
        <section id="ajouter" class="ajouter">
            <div class="container">
                <div class="section-title">
                    <h2>Ajouter des ouvrages</h2>
                </div>
                <form action="add.php" method="Post">
                <div>
                  <input type="text" name="titre" placeholder="Titre">
                  <input type="text" name="nom_auteur" placeholder="Nom_auteur">
                  <input type="file" name="image_cover" placeholder="">
                  <div class="form-group mx-sm-3 mb-3">
                <select class="form-select" aria-label="Default select example" name="etat">
                    <option selected name="etat">Etat</option>
                    <option value="neuf" name="neuf">neuf</option> 
                    <option value="Bon état" name="Bon état">Bon état</option>
                    <option value="Acceptable" name="Acceptable">Acceptable</option>
                    <option value="neuf" name="neuf"></option>
                    <option value="occasion" name="occasion">occasion</option>
                </select>
            </div>
            <div class="form-group mx-sm-3 mb-3">
                <select class="form-select" aria-label="Default select example" name="type">
                    <option selected>Type</option>
                    <option value="Livre" name="livre">livre</option>
                    <option value="Roman" name="roman">Roman</option>
                    <option value="DVD" name="dvd">dvd</option>
                    <option value="mémoire de recherche" name="memoire">mémoire de recherche</option>
                </select>
            </div>
                  <input type="date"name="date_edition" placeholder="">
                  <input type="date" name="date_achat" placeholder="">
                  <input type="number"name="nombre_page" placeholder="Number_pages">
                  <button  name="submit" class="form-control btn btn-success submit px-3">Add ouvrage</button>
                </div>
                </form>

            </div>
        </section><!-- End ajouter Section -->


    

        <!-- ======= list de reservation Section ======= -->
        <section id="list de reservation" class="list de reservation section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Liste de reservation</h2>
                </div>

             
            </div>
        </section><!-- End list de reservasion Section -->

        <!-- ======= list de validation Section ======= -->
        <section id="list de validation" class="list de validation">
            <div class="container">

                <div class="section-title">
                    <h2>list de validation</h2>
                </div>


            </div>
        </section><!-- End list de validation Section -->

        <!-- ======= retourner des emprunts Section ======= -->
        <section id="retourner des emprunts" class="retourner des emprunts">
            <div class="container">

                <div class="section-title">
                    <h2>Retour</h2>
                </div>

              
            </div>
      </section><!-- End retourner des emprunts Section -->

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>