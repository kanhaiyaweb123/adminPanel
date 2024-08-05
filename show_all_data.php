<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error{
            color: rgb(252, 6, 6);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>List of Doctors</h1>
    <div class="row">
        <div class="col-md-4">
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#addDoctorForm">Add Doctors</button>
            <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Upload CSV</button>
        </div>
        <div class="col-md-4">
            <label for="doctorTypeFilter" class="form-label">Filter by Doctor Type:</label>
            <select id="doctorTypeFilter" class="form-select">
                <option value="">All</option>
                <!-- Options omitted for brevity -->
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
            <!-- Table rows will be loaded here via AJAX -->
        </tbody>
    </table>

    <!-- Modal content omitted for brevity -->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function() {
        $("#DocDataSubmit").click(function(event) {
            event.preventDefault();
            
            // Form validation and AJAX submission code
            // Code omitted for brevity
        });

        function loadDoctors(filter) {
            $.ajax({
                url: 'get_doctors.php',
                type: 'POST',
                data: { filter: filter },
                success: function(response) {
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
            var userId = $(this).data('id');
            $.ajax({
                url: 'get_doctors.php',
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

        $('#uploadForm').submit(function(e) {
            e.preventDefault();
            
            // File validation and AJAX submission code
            // Code omitted for brevity
        });
    });
</script>
</body>
</html>
