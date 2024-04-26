<?php
    include("src/functions.php");
    $db = dbConnect();
    $years = getYear($db);
    $sports = getSports($db);
    $cities = getCityNames($db);
    $regions = getRegions($db);
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olympic Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                <h4 class="text-white">About</h4>
                <p class="text-muted">This is an Olymic games search engine. Use the select menus to find information about specific events or winners.</p>
                </div>
            </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
            <a href="index.php" class="navbar-brand d-flex align-items-center">    
                <strong> Olympic Games </strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </div>
        </div>
    </header>

    <main>

    <div class="album py-5 bg-light">
        <div class="container">
            <h1>Search the Olympic Games database:</h1>

            <!-- creates form that sends user to results webpage -->
            <form action="results.php" method="GET">

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="year" class="col-form-label">Year:</label>
                    </div>

                    <div class="col-auto">
                        <select class="form-select" id="year" name="year">
                            <option value='any'>Any</option>"
                            <?php 
                                // populates the year select menu
                                foreach ($years as $year) {
                                    $id = $year['id'];
                                    $name = $year['games_name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                            ?>
                        </select>
                    </div>

                </div><!-- row -->

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="sport" class="col-form-label">Sport:</label>
                    </div>

                    <div class="col-auto">
                        <select class="form-select" id="sport" name="sport">
                            <option value='any'>Any</option>"
                            <?php 
                                // populates the sports select menu
                               foreach ($sports as $sport) {
                                    $id = $sport['id'];
                                    $name = $sport['sport_name'];
                                    echo "<option value='$id'>$name</option>";
                                } 
                            ?>
                        </select>
                    </div>

                </div><!-- row -->

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="city" class="col-form-label">City:</label>
                    </div>

                    <div class="col-auto">
                        <select class="form-select" id="city" name="city">
                            <option value='any'>Any</option>"
                            <?php 
                                // populates the city select menu
                                foreach ($cities as $city) {
                                    $id = $city['id'];
                                    $name = $city['city_name'];
                                    echo "<option value='$id'>$name</option>";
                                }  
                            ?>
                        </select>
                    </div>

                </div><!-- row -->

                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label for="region" class="col-form-label">Region:</label>
                    </div>

                    <div class="col-auto">
                        <select class="form-select" id="region" name="region">
                            <option value='any'>Any</option>"
                            <?php 
                                // populates the region select menu
                                foreach ($regions as $region) {
                                    $id = $region['id'];
                                    $name = $region['region_name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                            ?>
                        </select>
                    </div>

                </div><!-- row -->

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div><!-- .container-->

    </div><!-- album-->

    </main>

    <footer class="text-muted py-5">
    <div class="container">

        <p class="mb-1">CS 293, Spring 2024</p>
        <p class="mb-1">Lewis & Clark College</p>
    </div><!-- .container-->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    
</body>
</html>