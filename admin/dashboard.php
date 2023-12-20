<!-- Show these admin pages only when the admin is logged in -->
<?php   require '../assets/partials/_admin-check.php';     ?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
        <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- CSS -->
    <?php
        require '../assets/styles/admin.php';
        require '../assets/styles/dashboard.php';
        $page="dashboard";
    ?>
    <style>
body {
  background-image: url('assets/img/wp7641936.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;  
  background-size: cover;
}
</style>
</head>
<body>
<p style="background-image: url('assets/img/wp7641936.jpg');">

    <!-- Requiring the admin header files -->
    <?php require '../assets/partials/_admin-header.php';
        require '../assets/partials/_getJSON.php';
    


    $routeData = json_decode($routeJson);
    $customerData = json_decode($customerJson);
    $seatData = json_decode($seatJson);
    $busData = json_decode($busJson);
    $adminData = json_decode($adminJson);
    $bookingData = json_decode($bookingJson);
    

    $conn = db_connect();    

    if(!$conn) 
        die("Connection Failed");


    $query = "SELECT id FROM contactus ORDER BY id";
    $result = mysqli_query($conn, $query);
    $suggestionCount = mysqli_num_rows($result);
    
    ?>

            <section id="dashboard">
                
                <div id="status">
                    <div id="Booking" class="info-box status-item">
                        <div class="heading">
                            <h5>Bookings</h5>
                            <div class="info">
                                <i class="fas fa-ticket-alt"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Bookings</p>
                            <p class="num" data-target="<?php 
                                    echo count($bookingData);
                                ?>">
                                
                            </p>
                        </div>
                        <a href="./booking.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Bus" class="info-box status-item">
                        <div class="heading">
                            <h5>Buses</h5>
                            <div class="info">
                                <i class="fas fa-bus"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Buses</p>
                            <p class="num" data-target="<?php 
                                    echo count($busData);
                                ?>">
                                
                            </p>
                        </div>
                        <a href="./bus.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div id="Route" class="info-box status-item">
                        <div class="heading">
                            <h5>Routes</h5>
                            <div class="info">
                                <i class="fas fa-road"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Routes</p>
                            <p class="num" data-target="<?php 
                                    echo count($routeData);
                                ?>">
                                
                            </p>
                        </div>
                        <a href="./route.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>
                   
                </div>

                <!-- <h3>User</h3> -->
                <div id="user">
                    <div id="Customer" class="info-box user-item">
                        <div class="heading">
                            <h5>Customers</h5>
                            <div class="info">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>

                        






                        <div class="info-content">
                            <p>Total Customers</p>
                            <p class="num" data-target="<?php 
                                    echo count($customerData);
                                ?>">
                                
                            </p>
                        </div>
                        <a href="./customer.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div id="Seat" class="info-box status-item">
                        <div class="heading">
                            <h5>Requests</h5>
                            <div class="info">
                                <i class="fas fa-th"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Requests</p>
                            <p class="num" data-target="<?php 
                                    echo $suggestionCount;
                                ?>">
                                
                            </p>
                        </div>
                        <a href="./requests.php">View More <i class="fas fa-arrow-right"></i></a>
                    </div>



                    <div id="Admin" class="info-box user-item">
                        <div class="heading">
                            <h5>Admins</h5>
                            <div class="info">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Admins</p>
                            <p class="num" data-target="<?php 
                                    echo count($adminData);
                                ?>">
                                
                            </p>
                        </div>
                        <a href="#admin"></a>
                    </div>



                    <div id="Earning" class="info-box user-item">
                        <div class="heading">
                            <h5>Earnings</h5>
                            <div class="info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
                        <div class="info-content">
                            <p>Total Earnings</p>
                            <p class="num" data-target="<?php 
                                    $result = mysqli_query($conn, 'SELECT SUM(booked_amount) AS value_sum FROM bookings'); 
                                    $row = mysqli_fetch_assoc($result); 
                                    $sum = $row['value_sum'];
                                    echo $sum;
                                ?>">
                                
                            </p>
                        </div>
                        <a href="#">View More <i class="fas fa-arrow-right"></i></a>
                    </div>

                </div>
                <h4>Other Admin</h4>
                <div id="admin">
                    <?php 
                        // Loop through Admin Data and show the admins in boxes other than the existing admin which is $user_id  == $_SESSION["user_id"]
                        foreach($adminData as $admin)
                        {
                            $adminArr = get_object_vars($admin);
                            if($adminArr["user_id"] == $user_id) 
                                continue;
                            $username = $adminArr["user_name"];
                        ?>
                            <div class="info-box admin-item">
                                <img src="../assets/img/user-profile-min.png" height="100px" alt="Profile Pic">
                                <h4><?php echo $username; ?></h4>
                                <p class="bio">Other Admin</p>
                            </div>
                        <?php 
                        }
                    ?>
                </div>
            </section>
                <footer>
                    <p>
                       SL Travel 2022 </p>
                </footer>
        </div>
    </main>
    <script src="../assets/scripts/admin_dashboard.js"></script>
</body>
</html>