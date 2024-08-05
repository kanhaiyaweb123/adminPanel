<?php
// session_start();
include 'session_check.php';
require 'dashboard/config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

$userId = $_SESSION['user_id'];
$query = "SELECT * FROM doctor_details WHERE user_id='$userId'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Banner -->
     
<!-- Dashboard -->
<div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
    <!-- Vertical Navbar -->
    <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
        <div class="container-fluid">
            <!-- Toggler -->
            <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Brand -->
            <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                <img src="https://preview.webpixels.io/web/img/logos/clever-primary.svg" alt="...">
            </a>
            <!-- User menu (mobile) -->
           
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="navbar-divider my-5 opacity-20">
                <!-- Navigation -->
                
                <!-- Push content down -->
                <div class="mt-auto"></div>
                <!-- User (md) -->
                <ul class="navbar-nav">
                    
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="bi bi-box-arrow-left"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Main content -->
    <div class="container">
    <h1>List of Doctors</h1>
    <div class="row">
    <div class="col-md-4">
    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addDoctorForm" data-bs-whatever="@mdo">Add Doctors</button>
    </div>
        <div class="col-md-4">
            <label for="doctorTypeFilter" class="form-label">Filter by Doctor Type:</label>
            <select id="doctorTypeFilter" class="form-select">
                <option value="">All</option>
                <option value="MBBS">MBBS</option>
                <option value="MS">MS</option>
                <option value="MD">MD</option>
                <option value="BAMS">BAMS</option>
                <option value="AMS">AMS</option>
                <option value="BHMS">BHMS</option>
                <option value="BPT">BPT</option>
                <option value="BVSc">BVSc</option>
                <option value="BUMS">BUMS</option>
                <option value="BSMS">BSMS</option>
                <option value="BNYS">BNYS</option>
                
            </select>
        </div>
    </div>

    <table id="doctorTable" class="table table-striped">
        <thead>
            <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Doctor Type</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>

        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload CSV File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="uploadForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="csvFile" name="csvFile">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                <span class="error d-none">Upload CSV File</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addDoctorForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Doctor Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="row g-3" id="docForm">
                    <div class="col-md-6">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName" value="">
                        <span class="error d-none">Enter First Name</span>
                    </div>
                    <div class="col-md-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="">
                        <span class="error d-none">Enter Last Name</span>
                    </div>
                    <div class="col-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="">
                        <span class="error d-none">Enter email</span>
                    </div>
                    <div class="col-6">
                        <label for="phonenumber" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="" maxlength="10">
                        <span class="error d-none">Enter Phone Number</span>
                    </div>
                    <div class="col-md-4">
                        <label for="doctype" class="form-label">Doctor Type</label>
                        <select id="doctype" name="doctype" class="form-select">
                            <option value="">Select</option>
                            <option value="MBBS">MBBS</option>
                            <option value="MS">MS</option>
                            <option value="MD">MD</option>
                            <option value="BAMS">BAMS</option>
                            <option value="AMS">AMS</option>
                            <option value="BHMS">BHMS</option>
                            <option value="BPT">BPT</option>
                            <option value="BVSc">BVSc</option>
                            <option value="BUMS">BUMS</option>
                            <option value="BSMS">BSMS</option>
                            <option value="BNYS">BNYS</option>
                        </select>
                        <span class="error d-none">Select Doctor Type</span>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="DocDataSubmit" class="btn btn-primary">Submit Details</button>
                </div>
                </div>
            </div>
        </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){
        $("#DocDataSubmit").click(function(event){
            event.preventDefault(); 

            var FirstName = $('#FirstName').val(); 
            var lastname = $('#lastname').val();
            var email = $('#email').val();
            var phonenumber = $('#phonenumber').val();
            var doctype = $('#doctype').val();

            var error = false;

            $('.error').addClass('d-none').text('');

            if(FirstName == ""){
                $('#FirstName').parent().find('.error').removeClass('d-none').text('Please Enter First Name');
                error = true;
            }
            
            if(lastname == ""){
                $('#lastname').parent().find('.error').removeClass('d-none').text('Please Enter Last Name');
                error = true;
            }

            if(email == ""){
                $('#email').parent().find('.error').removeClass('d-none').text('Please Enter Email Id');
                error = true;
            } else {
                var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if(!emailPattern.test(email)){
                    $('#email').parent().find('.error').removeClass('d-none').text('Please Enter a Valid Email Id');
                    error = true;
                }
            }

            if(phonenumber == ""){
                $('#phonenumber').parent().find('.error').removeClass('d-none').text('Please Enter Phone Number');
                error = true;
            } else {
                if(phonenumber.length != 10){
                    $('#phonenumber').parent().find('.error').removeClass('d-none').text('Please Enter a 10 Digit Phone Number');
                    error = true;
                }
            }

            if(doctype == ""){
                $('#doctype').parent().find('.error').removeClass('d-none').text('Please Select Doctor Type');
                error = true;
            }

            if(!error){
                let formData = new FormData($('#docForm')[0]);
                
                $.ajax({
                    url: 'dashboard/add_doctor.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response);
                        $('#docForm')[0].reset();
                    },
                    error: function() {
                        alert('Error adding doctor.');
                    }
                });
            }
        });

        function loadDoctors(filter) {
            $.ajax({
                url: 'dashboard/get_doctors.php',
                type: 'POST',
                data: { filter: filter },
                success: function(response) {
                    // alert(response);
                    $('#doctorTable tbody').html(response);
                },
                error: function() {
                    alert('Error fetching doctors.');
                }
            });
        }
        loadDoctors('');

        
        $('#doctorTypeFilter').change(function() {
            
            var filter = $(this).val();
            loadDoctors(filter);
        });

        $(document).on('click', '#deleteData', function() {
            // alert('Hi');
            var userId = $(this).data('id');
            
            $.ajax({
                url: 'dashboard/get_doctors.php',
                type: 'POST',
                data: { userId: userId },
                success: function(response) {
                    $('#doctorTable tbody').html(response);
                },
                error: function() {
                    alert('Error deleting user.');
                }
            });
        });

    });
</script>
</body>
</html>