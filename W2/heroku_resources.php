<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<title>SE 266 - JGiesing</title>

</head>
<body>
    <div class="navbar">
        <a href="/SE266/SE266/W2/index.php">Home</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="dropDown()">Assignments
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
            a href="/W1/">Assignment 1</a>
                <a href="/W2">Assignment 2</a>
                <a href="/W3">Assignment 3</a>
                <a href="/W4">Assignment 4</a>
                <a href="#">Assignment 5</a>
                <a href="#">Assignment 6</a>
                <a href="/W7">Assignment 7</a>
                <a href="#">Assignment 8</a>
                <a href="#">Assignment 9</a>
                <a href="#">Assignment 10</a> 
                
            </div>
        </div> 
        <a href="#">Heroku Resources</a>
        <a href="/SE266/SE266/W2/php_resources.php">PHP Resources</a>
        <a href="/SE266/SE266/W2/git_resources.php">Git Resources</a>
        <a href="https://github.com/joegiesing/SE266">My GitHub Repo</a>
    </div>

    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function dropDown() {
        document.getElementById("myDropdown").classList.toggle("show");
        }
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(e) {
        if (!e.target.matches('.dropbtn')) {
        var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
            myDropdown.classList.remove('show');
            }
        }
        }
    </script>         
    
    <?php       
            $file = basename($_SERVER['PHP_SELF']);
            $mod_date=date("F d Y h:i:s A", filemtime($file));
            echo "File last updated $mod_date ";
            //date.timezone = "Europe/Athens"
    ?>

</body>
</html>