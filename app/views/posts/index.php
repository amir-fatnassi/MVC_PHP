<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- start contaent -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- categories -->
                    <div class="card text-center border-info categories">
                        <h4><img src="<?php echo URLROOT; ?>/img/upload/<?php echo $data['user']->photo; ?>" alt="profil" class="border border-info shadow-lg p-1 mb-1 bg-white rounded rounded-circle mx-auto" width="75px" height="75px"></h4>
                        <ul>
                            <li class="mt-3"><a href="#">
                                <span>Name:  </span>
                                <span><?php echo $data['user']->name; ?></span>
                            </a></li>
                            <li class="mt-3"><a href="#">
                            <span>Email:  </span>
                                <span><?php echo $data['user']->email; ?></span>
                            </a></li>
                            <a href="<?php echo URLROOT; ?>/posts/profil/<?php echo $_SESSION['user_id']; ?>" class="btn btn-outline-secondary mt-5">mon profil</a>
                            <a href="<?php echo URLROOT; ?>/posts/new_post" class="btn btn-outline-info mt-5"> add post </a>
                            <h5 class="mt-3"> <a href="<?php echo URLROOT; ?>/posts/update_profil/<?php echo $_SESSION['user_id']; ?>" class="btn-outline-success">Update profil</a></h5>
                        </ul> 
                    </div>
                    <!-- end categories -->
                    <!-- start last post -->
                    <div class="last-post">
                        <h4>Lorem ipsum</h4>
                        <ul>
                        <?php foreach($data['post'] as $post) : ?>
                            <li><a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">
                                <span><img src="<?php echo URLROOT; ?>/img/upload/<?php echo $post->image; ?>" alt="image" style="width: 60px; height:40px"></span>
                                <span><?php echo $post->title; ?></span>
                            </a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- ens last post -->
                </div>
                <div class="col-md-9">
                    <?php flash('post_message') ?>
                        <?php foreach($data['posts'] as $post) : ?>
                    <div class="post">
                        <div class="post-image">
                            <a href="#"><img src="<?php echo URLROOT; ?>/img/upload/<?php echo $post->image; ?>" alt="image1"></a>
                        </div>
                        <div class="post-title">
                            <h4><a href="#"><?php echo $post->title; ?></a> </h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i><?php echo $post->name; ?></span>
                                <span><i class="fas fa-calendar-alt"></i><?php echo $post->date; ?></span>
                                <span><i class="fas fa-tags"></i><?php echo $post->category; ?></span>
                            </p>
                            <p class="postContent">
                            <?php
                                if(strlen($post->content) > 200 ){
                                    $post->content = substr($post->content, 0, 300).'...';
                                    echo $post->content;
                                }else{
                                    echo $post->content;
                                } 
                            ?>
                            </p>
                            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>"><button class="btn btn-det">Read mor</button></a>
                        </div>
                    </div>
                        <?php endforeach; ?>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- end contaent -->
    <?php require APPROOT . '/views/inc/footer.php'; ?>