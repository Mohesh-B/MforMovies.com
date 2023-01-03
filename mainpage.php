<html>
    <head>
        <style>
            body{
              font-family: "Audiowide", sans-serif;
            }
        </style>
        <meta charset="utf-8">
        <Title>Homepage</Title>
        <link rel="stylesheet" href="mainpage.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
        <link rel="stylesheet" href="popup.css">

    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/popup.css">
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    </head>
    <body>
        <header>
            <ul>
                <li><img id="logo" src="logo (2).png"></li>
                <LI><H3>MforMovies.com</H3></LI>
                <li><a href="#home">Home</a></li>
                <li><a href="#About">About</a></li>
                <li><a href="browse.php">Browse</a></li>
                <li><a href="#popup2">Register</a></li>
            </ul>
        </header>

        <div class="sec2">
        <img src="background.jpg">
        </div>
        <div class="content">
                <h1>
                    Millions Of Movies,<br>Find Your Favorites
                </h1>
                <h4>Login to Track Your Favorites</h4>
                <button type="button" class="glow-on-hover" onclick="location.href='#popup1';">Login</button>
                <button type="button" class="glow-on-hover" onclick="location.href='#popup2';">Register</button>
        </div>
        <div id="popup1" class="popup-overlay">
        <div class="log-popup">
            <h2>Log In</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <form action="login.php" method="post">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Username" name="username" class="log-input" required>
                    <br>
                    <i class="fa fa-lock icon"></i>
                    <input type="password" placeholder="Password" name="password" class="log-input" required>
                    <br>
                    <input type="submit" value="Log In" name="signup-btn" class="btn-log">
                </form>
            </div>
        </div>
    </div>

    <div id="popup2" class="popup-overlay">
        <div class="log-popup">
            <h2>Sign Up</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <form action="register.php" method="post">
                    <i class="fa fa-user icon"></i>
                    <input type="text" placeholder="Enter your name" name="fullname" class="log-input" required>
                    <br>
                    <i class="fa fa-envelope icon"></i>
                    <input type="email" placeholder="Enter your email" name="email" class="log-input" required>
                    <br>
                    <i class="fa fa-link icon"></i>
                    <input type="text" placeholder="Enter username" name="username" class="log-input" required>
                    <br>
                    <i class="fa fa-lock icon"></i>
                    <input type="password" placeholder="Password" name="password" class="log-input" required>
                    <br>
                    <input type="submit" value="Sign Up" name="signup-btn" class="btn-log">
                </form>
            </div>
        </div>
    </div>
    <div id="success" class="popup-overlay">
        <div class="log-popup">
            <h2>Success</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Acount is created Successfully.Now you can login your account :)</p>
                <a href="#popup1" class="btn-main btn-main-primary">
                        Log In
                </a>
            </div>
        </div>
    </div>
    <div id="error" class="popup-overlay">
        <div class="log-popup">
            <h2>Error</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>Username or Email already exist :( Try Again...</p>
            </div>
        </div>
    </div>
    <div id="error1" class="popup-overlay">
        <div class="log-popup">
            <h2>Error</h2>
            <a class="close-window" href="#">&times;</a>
            <div class="log-content">
                <p>No Account Found :( Try Again...</p>
            </div>
        </div>
    </div>
        </body>
        </html>