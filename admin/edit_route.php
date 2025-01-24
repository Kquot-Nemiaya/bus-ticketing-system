<?php
include('db_conn.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>

      
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin </span>
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4>Route Edit 
                            <a href="Routes.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                </div>
                <div class="card-body">
                <?php
                        if(isset($_GET['id']))
                        {
                            $id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM routes WHERE id='$id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $routes = mysqli_fetch_array($query_run);
                                ?>
                   <form action="update_route.php" method="post">
            
                <input type="hidden" name="route_id" value="<?= $routes['id']; ?>">

                <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" value="<?= $routes['date']; ?>"class="form-control" >

        </div>
        <div class="mb-3">
            <label>Departure</label>
            <input type="text" name="departure"value="<?= $routes['departure']; ?>" class="form-control" >

        </div>
        <div class="mb-3">
            <label>Departure Time</label>
            <input type="text" name="departure_time"value="<?= $routes['departure_time']; ?>" class="form-control" >

        </div>
        <div>
        <label>Arrival Time</label>
            <input type="text" name="arrival_time"value="<?= $routes['arrival_time']; ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label>Arrival</label>
            <input type="text" name="arrival"value="<?= $routes['arrival']; ?>" class="form-control" >
         </div>
         <div class="mb-3">
            <label>Seats</label>
            <input type="text" name="seats"value="<?= $routes['seats']; ?>" class="form-control" >

        </div>
        <div class="mb-3">
            <label>Fare </label>
            <input type="text" name="fare"value="<?= $routes['fare']; ?>" class="form-control" >

        </div>
               
            </div>
            <div class="mb-3">
                                        <button type="submit" name="update" class="btn btn-primary">
                                            Update Route
                                        </button>
                                    </div>

        </form>
        <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>