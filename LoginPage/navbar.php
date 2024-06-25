<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #15959C ; width:100%;z-index: 10;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SMS Chok's</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php
				if(isset($_SESSION["AID"]))
				{
					echo'
				
						<li class="nav-item"><a class="nav-link"href="index.php">Admin Home</a></li>
				<li class="nav-item"> <a class="nav-link" href="#">Settings</a></li>
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
					';
				}
				elseif(isset($_SESSION["TID"]))
				{
					echo'
				
						<li class="nav-item"><a class="nav-link" href="index.php">Teacher Home</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Settings</a></li>
				<li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
					';
				}
				else{
					echo'
					
					<li class="nav-item"><a class="nav-link" href="index.php">Admin</a></li>
				<li class="nav-item"><a class="nav-link" href="teacher_login.php">Teacher</a></li>
				<li class="nav-item"><a class="nav-link"  href="#">Contact Us</a></li>';
				}
			?>
                </ul>
            </div>
        </div>
    </nav>