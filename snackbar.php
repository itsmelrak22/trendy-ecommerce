<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snackbar</title>
    <script>
        // Function to display snackbar
        function showSnackbar(message, color) {
            var snackbar = document.getElementById("snackbar");
            snackbar.style.backgroundColor = color; // Set the background color dynamically
            snackbar.innerHTML = message;
            snackbar.className = "show";
            setTimeout(function(){ snackbar.className = snackbar.className.replace("show", ""); }, 3000);
        }
    </script>
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: auto;
            margin-right: 20px; /* Adjust margin-right for spacing from the right */
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            right: 0; /* Position it to the right */
            top: 20px; /* Position it towards the top */
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

    </style>
</head>
<body>
    <!-- Snackbar container -->
    <div id="snackbar"></div>

    <script>
        // Check if there's a success or error message in session and display snackbar
        <?php
            if(isset($_SESSION['success_message'])) {
                echo 'showSnackbar("' . $_SESSION['success_message'] . '", "' . $_SESSION['snackbar_color'] . '");';
                unset($_SESSION['success_message']); // Clear the success message from session
                unset($_SESSION['snackbar_color']); // Clear the snackbar color from session
            } elseif(isset($_SESSION['error_message'])) {
                echo 'showSnackbar("' . $_SESSION['error_message'] . '", "' . $_SESSION['snackbar_color'] . '");';
                unset($_SESSION['error_message']); // Clear the error message from session
                unset($_SESSION['snackbar_color']); // Clear the snackbar color from session
            }
        ?>
    </script>
</body>
</html>
