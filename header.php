
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styles5.css">
  
    <title>Document</title>
</head>
<body>
                <div class="all-content-wrapper">
                       <div class="navbar navbar-expand-lg navbar-dark bg-dark" style="color:black;">                           
                            <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                <div class="header-top-menu tabl-d-n" >
                                    <ul class="nav navbar-nav mai-top-nav" >
                                        <li class="nav-item"><a href="select_quiz.php" class="nav-link">Select Quiz</a>
                                        </li>
                                        <li class="nav-item"><a href="results.php" class="nav-link">Last Results</a>
                                        </li>
                                        <li class="nav-item"><a href="register.php" class="nav-link">Register</a>
                                        </li>

                                    </ul>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <?php if (isset($_SESSION["username"])) : ?>
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <span class="admin-name"><?php echo $_SESSION["username"]; ?></span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="add_edit_questions_user.php"><span class="edu-icon edu-locked author-log-ic"></span>My Quizzes</a></li>
                                                    <li><a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a></li>
                                                </ul>
                                                
                                            <?php else: ?>
                                                <a href="login.php">Log In</a>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
</div>

    

  