    <!-- start navbar -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-light ">
        <div class="container">
            <a href="<?php echo URLROOT; ?>" class="navbar-brand">My Post</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link">About</a>
                    </li>
                    <?php if(isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/register" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Login</a>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->