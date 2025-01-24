<?php
session_start();
include('db_conn.php');
include('includes/header.php');
include('includes/navbar.php');

?>


<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Routes</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
</head>
<body>
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



<div class="modal fade" id="studentAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Assign Route</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="save">
            <div class="modal-body">

                <div id="errorMessage" class="alert alert-warning d-none"></div>
                <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" placeholder="date">

        </div>
        <div class="mb-3">
            <label>Departure</label>
            <input type="text" name="departure" class="form-control" placeholder="departure">

        </div>
        <div class="mb-3">
            <label>Departure Time</label>
            <input type="text" name="departure_time" class="form-control" placeholder="departure time">

        </div>
        <div>
        <label>Arrival Time</label>
            <input type="text" name="arrival_time" class="form-control" placeholder="Arrival time">
        </div>
        <div class="mb-3">
            <label>Arrival</label>
            <input type="text" name="arrival" class="form-control" placeholder="Arrival">
         </div>
         <div class="mb-3">
            <label>Seats</label>
            <input type="text" name="seats" class="form-control" placeholder="seats">

        </div>
        <div class="mb-3">
            <label>Fare Ksh</label>
            <input type="text" name="fare" class="form-control" placeholder="seat fare">

        </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
        </div>
    </div>
</div>



<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Assigned Routes
                        
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#studentAddModal">
                        Assign Route
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                <?php
            $query = "SELECT * FROM routes";
            $query_run = mysqli_query($conn, $query);
        ?>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Departure</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                    <th>Arrival</th>
                                    <th>Seats</th>
                                    <th>Fare Ksh</th>
                                    <th>update</th> 
                                    <th>Delete</th> 
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php
                    if(mysqli_num_rows($query_run) > 0)        
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                    ?>
                                            <tr>
                                                <td><?php  echo $row ['id']; ?></td>
                                                <td><?php  echo $row['date']; ?></td>
                                                <td><?php  echo $row['departure']; ?></td>
                                                <td><?php  echo $row['departure_time']; ?></td>
                                                <td><?php  echo $row['arrival_time']; ?></td>
                                                <td><?php  echo $row['arrival']; ?></td>
                                                <td><?php  echo $row['seats']; ?></td>
                                                <td><?php  echo $row['fare']; ?></td>
                                                <td>
                                                    
                                                <a href="edit_route.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                </td>
                                              
                                                <td>
                                                <form method="post" action="delete_route.php">
                                                 <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                 <button type="submit" name="delete-btn" class="btn btn-danger">Delete</button>
                                                  </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                            
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        $(document).on('submit', '#save', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save", true);

            $.ajax({
                type: "POST",
                url: "load_route.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#studentAddModal').modal('hide');
                        $('#save')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");

                    }else if(res.status == 500) {
                        alert(res.message);
                    }
                }
            });

        });

       

    </script>

</body>
</html>

