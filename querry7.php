<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Akhir</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6 text-center text-white">
                        <h2 class="Title">DATABASE</h2>
                    </div>
                    <div class="col-6 text-end">
                        <div class="sidebar-toggle" id="sidebarToggle">&#9776;</div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="sidebar" id="sidebar">
        <a href="homepage.php" class="sidebar-link">Dashboard</a>
        <ul class="sub-links">
            <li><a href="querry1.php" class="sidebar-link">Querry 1</a></li>
            <li><a href="querry2.php" class="sidebar-link">Querry 2</a></li>
            <li><a href="querry3.php" class="sidebar-link">Querry 3</a></li>
            <li><a href="querry4.php" class="sidebar-link">Querry 4</a></li>
            <li><a href="querry5.php" class="sidebar-link">Querry 5</a></li>
            <li><a href="querry6.php" class="sidebar-link">Querry 6</a></li>
            <li><a href="querry7.php" class="sidebar-link">Querry 7</a></li>
        </ul>
        <a href="index.php" class="sidebar-link" onclick="return confirm('apakah anda yakin ingin keluar?')">Keluar</a>
    </div>

    <div class="datatablecontainer container mt-4">
        <table id="myTable" class="display table table-bordered">
            <thead>
                <tr>
                    <th>NAMA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';
                $no = 1;
                $data = mysqli_query($koneksi, "SELECT DISTINCT Name 
                FROM PERSON, INSTRUCTOR
                WHERE INSTRUCTOR.ID = PERSON.ID
                AND Name NOT IN (
                SELECT DISTINCT Name
                FROM PERSON, INSTRUCTOR, HASI, COURSE, LAB
                WHERE INSTRUCTOR.ID = PERSON.ID
                AND HASI.ID = INSTRUCTOR.ID
                AND HASI. CourseID = COURSE. CourseID
                AND COURSE. CourseID = LAB. CourseID
                AND LAB.Section > 1);
                ");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $d['Name']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const ufo = document.getElementById('ufo');

            sidebarToggle.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });
        });
    </script>
</body>

</html>