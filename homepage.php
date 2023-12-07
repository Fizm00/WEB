<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Akhir</title>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="homepage.css">
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
    <div class="button-container">
        <a href="querry1.php" id="query1" class="button-link">
            <button class="button-64" role="button" id="query1"><span class="text">Querry 1</span></button>
        </a>
        <a href="querry2.php" id="query2" class="button-link">
            <button class="button-64" role="button" id="query2"><span class="text">Querry 2</span></button>
        </a>
        <a href="querry3.php" id="query3" class="button-link">
            <button class="button-64" role="button" id="query3"><span class="text">Querry 3</span></button>
        </a>
    </div>
    <div class="button-container">
        <a href="querry4.php" id="query4" class="button-link">
            <button class="button-64" role="button" id="query4"><span class="text">Querry 4</span></button>
        </a>
        <a href="querry5.php" id="query5" class="button-link">
            <button class="button-64" role="button" id="query5"><span class="text">Querry 5</span></button>
        </a>
        <a href="querry6.php" id="query6" class="button-link">
            <button class="button-64" role="button" id="query6"><span class="text">Querry 6</span></button>
        </a>
    </div>
    <div class="button-container">
        <a href="querry7.php" id="query7" class="button-link">
            <button class="button-64" role="button" id="query7"><span class="text">Querry 7</span></button>
        </a>
    </div>

    <div class="sidebar" id="sidebar">
        <a href="#" class="sidebar-link">Dashboard</a>
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

    <div class="background">
        <img src="ufo.png" alt="UFO" class="ufo" id="ufo">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarToggle = document.getElementById("sidebarToggle");
            const sidebar = document.getElementById("sidebar");
            const ufo = document.getElementById('ufo');

            sidebarToggle.addEventListener("click", function() {
                sidebar.classList.toggle("active");
            });

            function getButtonPosition(queryId) {
                const button = document.getElementById(queryId);
                const rect = button.getBoundingClientRect();
                return {
                    x: rect.x,
                    y: rect.y,
                    width: rect.width,
                    height: rect.height
                };
            }

            function getRandomPositionAroundButton(queryId) {
                const buttonPosition = getButtonPosition(queryId);
                const x = buttonPosition.x + Math.random() * (buttonPosition.width - ufo.clientWidth);
                const y = buttonPosition.y + Math.random() * (buttonPosition.height - ufo.clientHeight);
                return {
                    x,
                    y
                };
            }

            function moveElementTo(element, x, y) {
                element.style.transform = `translate(${x}px, ${y}px)`;
            }

            function moveUFOAroundButton(queryId) {
                const newPosition = getRandomPositionAroundButton(queryId);
                moveElementTo(ufo, newPosition.x, newPosition.y);
            }

            function animate() {
                moveUFOAroundButton('query1');
                moveUFOAroundButton('query2');
                moveUFOAroundButton('query3');
                moveUFOAroundButton('query4');
                moveUFOAroundButton('query5');
                moveUFOAroundButton('query6');
                moveUFOAroundButton('query7');
                setTimeout(() => requestAnimationFrame(animate), 1000 / 60);
            }

            animate();

        });
    </script>
</body>

</html>