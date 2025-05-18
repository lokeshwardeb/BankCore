<?php
// session_start();

require_once __DIR__ . '/inc/_header.php';







?>


<body>
    <main>
        <div class="main_page">
            <div class="">
                <div class="row">
                    <div class="col-md-2">
                        <div class="page " style="height: 100vh;" >
                            <?php
                                require_once __DIR__ . '/inc/_sidebar.php';
                            ?>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="welcome_msg">
                            <div class="container">
                                <div class="msg page m-4 fs-5 p-4">
                                    Welcome back, <span class="text-primary"><?php echo $_SESSION['admin_username'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    
<?php
require_once __DIR__ . '/inc/_footer_script.php';

?>
