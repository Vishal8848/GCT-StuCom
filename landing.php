<?php

    $loggedIn = 0;
    $firstName = $lastName  = 'Name';
    $cid = '0000';
    if(isset($_GET['status']) && $_GET['status'] == 'true') {
        if($_GET['status'] == 'true')  {
            $loggedIn = 1;
        }   else {
            $loggedIn = 0;
        }
        $firstName = $_GET['fname'];
        $lastName  = $_GET['lname'];
        $connID    = $_GET['cid'];
    }   else {
        $loggedIn = 0;
    }

?>

<!-- Customization -->
<link rel="stylesheet" href="landing.css">
<script src="landing.js"></script>

<!-- Header -->
<header class="viewport-header">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow coverbg">
        <div class="container-fluid">

            <!-- Title -->
            <img src="assets/logo.png" height="50px" width="50px">
            <a class="navbar-brand me-auto">GCT Student Community</a>

            <!-- Responsive Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#NavbarItems" aria-controls="NavbarItems" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
      
            <!-- Navigation Items -->
            <div id="NavbarItems" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active text-center menu"><i class="fas fa-home fa-lg me-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center menu"><i class="fas fa-users fa-lg me-2"></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-center menu"><i class="fas fa-calendar-week fa-lg me-2"></i>Events</a>
                    </li>
                    <?php if($loggedIn) { ?>
                    <li class="nav-item dropdown text-center">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar bg-success">
                                <div class="avatar-content">
                                    <?php  echo $firstName[0] . $lastName[0]; ?>
                                </div>
                            </div>
                            <?php #echo 'Hi, ' . $firstName; ?>
                        </a>
                        <div class="dropdown-menu shadow">
                            <a class="dropdown-item"><i class="fas fa-user-edit me-2"></i>Profile</a>
                            <a class="dropdown-item"><i class="fas fa-bars me-2"></i>Content</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="logOut()"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                        </div>
                    </li>
                    <?php  }  else  {?>
                        <li class="nav-item text-center">
                            <a href="./connect.html">
                                <button class="btn btn-outline-dark">
                                    <i class="fas fa-globe-asia fa-spin fa-lg me-2"></i>
                                    Connect
                                </button>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!-- BACKGROUND IMAGE -->
<img id="bg-gct" src="assets/gctmain.jpg" alt="GCT College Image">

<!-- HOME -->
<main class="viewport-main home">
    <div class="row m-auto ms-md-5">

        <!-- Connect Value -->
        <div class="col-md-4 bg-light shadow my-5 pb-3 box">
            <div id="Circle" class="bg-info rounded-circle border m-auto mt-2">
                <div id="Connect" class="bg-light rounded-circle pt-5 ps-4">
                    <h1 class="target-num"><?php echo '&nbsp;&nbsp;' . $ConnectionCount; ?></h1>
                </div>
            </div>
            <div class="text-center p-2">
                <h1>Connections</h1>
                <big>Connect with Aspirants</big><br/>
                Strengthen the Student Network<br/>
                <a href="./connect.html">
                    <button class="btn btn-outline-info m-2">
                        <i class="fas fa-globe-asia fa-lg me-2"></i>Connect
                    </button>
                </a><br/>
                <!-- <marquee class="text-muted">Latest : Name - Department</marquee> -->
            </div>
        </div>

        <!-- Collaborate Value -->
        <div class="col-md-4 bg-light shadow my-5 pb-3 box">
            <div id="Circle" class="bg-danger rounded-circle border m-auto mt-2">
                <div id="Collab" class="bg-light rounded-circle pt-5 ps-4">
                    <h1 class="target-num">130</h1>
                </div>
            </div>
            <div class="text-center p-2">
                <h1>Collaborations</h1>
                <big>Involve in Collaborations</big><br/>
                Implementing Revolutionary Ideas<br/>
                <button class="btn btn-outline-danger m-2" <?php  if(!$loggedIn) echo 'disabled';?>>
                    <i class="fas fa-laptop-code fa-lg me-2"></i>Collaborate
                </button><br/>
                <!-- <marquee class="text-muted">Latest : Project - Domain</marquee> -->
            </div>
        </div>

        <!-- Contribute Value -->
        <div class="col-md-4 bg-light shadow my-5 pb-3 box">
            <div id="Circle" class="bg-success rounded-circle border m-auto mt-2">
                <div id="Contri" class="bg-light rounded-circle pt-5 ps-4">
                    <h1 class="target-num">83+</h1>
                </div>
            </div>
            <div class="text-center p-2">
                <h1>Contributions</h1>
                <big>Contribute to the Network</big><br/>
                Inspiring the Aspiring Youth<br/>
                <button class="btn btn-outline-success m-2" <?php if(!$loggedIn) echo 'disabled';?>>
                    <i class="fas fa-lightbulb fa-lg me-2"></i>Contribute
                </button><br/>
                <!-- <marquee class="text-muted">Latest : Idea - Domain</marquee> -->
            </div>
        </div>
    </div>
</main>

<footer class="viewport-footer fixed-md-bottom home">
    <!-- Copyright -->
    <div class="text-center py-3 bg-light" style="box-shadow: 0px 0px 15px #BBBBBB">
        &copy; 2021 Copyright:
        <a class="text-dark" href="#">GCT Student Community</a>
        ( v1.1.0 )
    </div>
</footer>

<!-- ABOUT -->
<main class="viewport-main about"> 
    <!-- Countdown Timer -->
    <div id="Countdown" class="container-md mt-5 mb-5 bg-light rounded-pill shadow">
        <div class="row m-auto">
            <div class="col-3 text-end">
                <h1 id="Days">11&nbsp;:</h1>
            </div>
            <div class="col-3 text-center">
                <h1 id="Hours">19&nbsp;:</h1>
            </div>
            <div class="col-3 text-center">
                <h1 id="Mins">06&nbsp;:</h1>
            </div>
            <div class="col-3 text-start">
                <h1 id="Secs">&nbsp;59</h1>
            </div>
        </div>
    </div> 

    <!-- Main View -->
    <div id="MainView" class="container-fluid row g-0 m-auto mb-5">
        <div id="Content" class="col-md-6 bg-light text-center pt-5 px-3">
            <h1>What's Happening ?</h1><hr/>
            <span><big>W</big>elcome to the <strong>GCT Student Network</strong>. This initiative is aimed at bringing student aspirants together to implement revolutionary ideas.</span><br/>
            <span>Reach out to students with similar ideas and work together to bring your ideas to reality. You are remembered by your actions. This is a place to <em>Connect, Collaborate and Contribute</em></span><br/>                        
        </div>
        <div id="View" class="col-md-6 h-50 w-50 d-none d-lg-block">
            <img id="Img" src="assets/bluebench.jpeg" alt="Some Image">
        </div>
    </div>

    <!-- Connect View -->
    <div id="ConnectView" class="container-fluid row g-0 m-auto mb-5 scrollfade">
        <div id="View" class="col-md-6 h-50 w-50 d-none d-lg-block">
            <img id="Img" src="assets/connect.jpg" alt="Some Image">
        </div>
        <div id="Content" class="col-md-6 bg-light text-center pt-5 px-3">
            <h1>1370</h1>
            <h2><i class="fas fa-users me-2"></i>Connections</h2><hr/>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel debitis exercitationem porro sapiente, ratione quibusdam soluta nihil non! Neque necessitatibus quos facere corporis delectus eveniet libero corrupti vitae dicta inventore!</p>
            <?php if($loggedIn == 0) { ?>
            <a href="connect.php">
                <button id="ConnectBtn" class="btn btn-outline-dark mb-3">
                    <i class="fas fa-globe-asia fa-spin fa-lg me-2"></i>
                    Connect
                </button>
            </a>
            <?php  } else { ?>
                <button id="ConnectBtn" class="btn btn-outline-dark" disabled>
                    <i class="fas fa-globe-asia fa-spin fa-lg me-2"></i>
                    Connect
                </button>
            <?php } ?>
        </div>
    </div>

    <!-- Collaborate View -->
    <div id="CollabView" class="container-fluid row g-0 m-auto mb-5 scrollfade">
        <div id="Content" class="col-md-6 bg-light text-center pt-5 px-3">
            <h1>341</h1>
            <h2><i class="fas fa-laptop-code me-2"></i>Collaborations</h2><hr/>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel debitis exercitationem porro sapiente, ratione quibusdam soluta nihil non! Neque necessitatibus quos facere corporis delectus eveniet libero corrupti vitae dicta inventore!</p>
            <button id="CollabBtn" class="btn btn-outline-dark mb-3"><i class="fas fa-handshake fa-lg me-2"></i>Find Projects</button>
        </div>
        <div id="View" class="col-md-6 h-50 w-50 d-none d-lg-block">
            <img id="Img" src="assets/collaborate.jpg" alt="Some Image">
        </div>
    </div>

    <!-- Contribute View -->
    <div id="ContriView" class="container-fluid row g-0 m-auto mb-5 scrollfade">
        <div id="View" class="col-md-6 h-50 w-50 d-none d-lg-block">
            <img id="Img" src="assets/contribute.jpg" alt="Some Image">
        </div>
        <div id="Content" class="col-md-6 bg-light text-center pt-5 px-3">
            <h1>173</h1>
            <h2><i class="fas fa-lightbulb me-2"></i>Contributions</h2><hr/>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel debitis exercitationem porro sapiente, ratione quibusdam soluta nihil non! Neque necessitatibus quos facere corporis delectus eveniet libero corrupti vitae dicta inventore!</p>
            <button id="ContriBtn" class="btn btn-outline-dark mb-3"><i class="fas fa-upload fa-lg me-2"></i>Submit Work</button>
        </div>
    </div>

    <!-- Events View -->
    <div id="EventView" class="container-fluid row g-0 m-auto mb-5 scrollfade">
        <div id="Content" class="col-md-6 bg-light text-center pt-5 px-3">
            <h2>15<sup>th</sup> June 2021</h2>
            <h1><i class="fas fa-cog fa-spin me-2"></i>Tech Summit</h1><hr/>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel debitis exercitationem porro sapiente, ratione quibusdam soluta nihil non! Neque necessitatibus quos facere corporis delectus eveniet libero corrupti vitae dicta inventore!</p>
            <button id="EventBtn" class="btn btn-outline-dark mb-3"><i class="fas fa-calendar-week fa-lg me-2"></i>View Event</button>
        </div>
        <div id="View" class="col-md-6 h-50 w-50 d-none d-lg-block">
            <video id="Img" src="assets/Tech Summit.mp4" controls></video>
        </div>
    </div>

</main>

<!-- Footer -->
<footer class="viewport-footer about">
    <div class="text-center bg-light mt-5">
        <div class="container-md row m-auto pt-3 mt-3">
            <!-- Motto -->
            <div class="col-md-4">
                <h4 class="py-2 mb-5 border-bottom border-5">GCT Student Community</h4>
                <p>Aimed at bringing GCT students together to <i>Connect, Collaborate and Contribute</i>
                    towards collective growth and build the <b>GCT Student Network !</b></p>
            </div>
            <!-- Quick Links -->
            <div class="col-md-4">
                <h4 class="py-2 mb-5 border-bottom border-5">Navigate</h4>
                <p><a href="#" class="text-reset">GCT Official</a></p>
                <p><a href="#" class="text-reset">About</a></p>
                <p><a href="#" class="text-reset">Events</a></p>
                <p><a href="#" class="text-reset">Help</a></p>
            </div>
            <!-- Contact Details -->
            <div class="col-md-4">
                <h4 class="py-2 mb-5 border-bottom border-5">Contact</h4>
                <p><i class="fas fa-home me-2"></i>GCT, Coimbatore - 641 013</p>
                <p><i class="fas fa-map-marker-alt me-2"></i>Tamil Nadu, India</p>
                <p><i class="fas fa-envelope me-2"></i>vish.1918147@gct.ac.in</p>
            </div>
        </div><hr/>
        <!-- Copyright -->
        <div class="text-center pb-3">
            © 2021 Copyright:
            <a class="text-reset" href="#">GCT Student Community</a>
        </div>
    </div>
</footer>

<!-- EVENTS -->
<!-- Under Contruction Message -->
<div class="viewport-main event">
    <div class="container-md">
        <div class="text-center my-5 py-5">
            <h3><i class="fas fa-cog fa-pulse me-2"></i>Working On It<i class="fas fa-cog fa-pulse ms-2"></i></h3>
        </div>
        <div class="progress mb-3 rounded-pill">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="viewport-footer fixed-bottom event">
    <!-- Copyright -->
    <div class="text-center py-3 bg-light" style="box-shadow: 0px 0px 15px #BBBBBB">
        &copy; 2021 Copyright:
        <a class="text-dark" href="#">GCT Student Community</a>
    </div>
</footer>