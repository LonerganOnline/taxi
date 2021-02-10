<?php
$version = "0.0.1";
include_once './App.php';
$app = new App();
?>
<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Mark Lonergan</title>
        <meta name="author" content="Mark Lonergan">
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
              integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css?v=<?php echo $version; ?>">
        <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
        <script src="js/script.js?v=<?php echo $version; ?>"></script>
    </head>
    <body>
        <header>
            <h1>Mark's Taxi Service</h1>
        </header>
        <main class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="driver-tab" data-toggle="tab" href="#driver" role="tab" aria-controls="driver" aria-selected="true">Drivers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="ride-tab" data-toggle="tab" href="#ride" role="tab" aria-controls="ride" aria-selected="false">Customer Rides</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dl-tab" data-toggle="tab" href="#dl" role="tab" aria-controls="dl" aria-selected="false">Vehicle Log</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="lc-tab" data-toggle="tab" href="#lc" role="tab" aria-controls="lc" aria-selected="false">License Check</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="driver" role="tabpanel" aria-labelledby="driver-tab">

                    <select id='driverDrivesDropdown'>
                        <?php
                        foreach ($app->getDrivers() as $row) {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['first_name'] . " " . $row['last_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <button id='driverDrives'>Go</button>
                    <div id="driverDrivesResults"></div>

                </div>




                <div class="tab-pane fade" id="ride" role="tabpanel" aria-labelledby="ride-tab">

                    <select id='customerDropdown'>
                        <?php
                        foreach ($app->getCustomers() as $row) {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['first_name'] . " " . $row['last_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <button id='customerRides'>Go</button>
                    <div id="customerResults"></div>
                    
                </div>
                
                
                
                
                <div class="tab-pane fade" id="dl" role="tabpanel" aria-labelledby="dl-tab">
                    <select id='vehicleDropdown'>
                        <?php
                        
                        foreach ($app->getVehicles() as $row) {
                            ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input id="vehDate" type="date">
                    <button id='vehicleLog'>Go</button>
                    <div id="vehicleLogResults"></div>
                </div>
                
                
                
                <div class="tab-pane fade" id="lc" role="tabpanel" aria-labelledby="lc-tab">....</div>
            </div>
        </main>
    </body>
</html>