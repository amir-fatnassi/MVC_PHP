<?php require APPROOT . '/views/inc/header.php'; ?>
    <!-- start contaent -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!-- categories -->
                    <div class="card text-center border-info categories">
                        <h4><a href="#"><img src="<?php echo URLROOT; ?>/img/upload/<?php echo $data['user']->photo; ?>" alt="profil" class="border border-info shadow-lg p-1 mb-1 bg-white rounded rounded-circle mx-auto" width="75px" height="75px"></a></h4>
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
                        <?php foreach($data['posts'] as $post) : ?>
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
                    <div class="post">
                        <div class="post-image">
                            <a href="#"><img src="<?php echo URLROOT; ?>/img/upload/<?php echo $data['post']->image; ?>" alt="image1"></a>
                        </div>
                        <div class="post-title">
                            <h4><a href="#"><?php echo $data['post']->title; ?></a> </h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i><?php echo $data['users']->name; ?></span>
                                <span><i class="fas fa-calendar-alt"></i><?php echo $data['post']->date; ?></span>
                                <span><i class="fas fa-tags"></i><?php echo $data['post']->category; ?></span>
                            </p>
                            <p class="postContent">
                            <?php echo $data['post']->content; ?>
                            </p>
                            <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
                                <div class="row mt_5">
                                <div class="col">
                                <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark" >Edit</a>
                                </div>
                                <div class="col">
                                <form class="pull-right" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>"  method="POST" >
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                </div>
                                </div>
                            <?php endif; ?>    
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
    <!-- end contaent -->
    <?php require APPROOT . '/views/inc/footer.php'; ?>