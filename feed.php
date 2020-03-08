<?php
    
    session_start();
    require_once 'koneksi.php';

    $posting = mysqli_query($conn, "SELECT * FROM photo");
    $profile = mysqli_query($conn, "SELECT * FROM profile");
    $username = $_SESSION['username'];

    //echo $_SESSION['username'];

    if (isset($_GET['search'])) {
        $cari = $_GET['search'];
        $posting = mysqli_query($conn, "SELECT * FROM photo WHERE caption LIKE '%$cari%' ");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Feed | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <!-- Master branch comment -->
                <img src="images/logo.png" />
            </a>
        </div>
        <form method="get">
            <div class="navigation__column">
                <i class="fa fa-search"></i>
                <input type="text" name="search" placeholder="Search">
            </div>
        </form>
        <div class="navigation__column">
            <ul class="navigations__links">
                <li class="navigation__list-item">
                    <a href="upload.php" class="navigation__link">
                        <!-- <i class="fa fa-compass fa-lg"></i> -->
                        <img src="images/upload.png" width="22" height="22">
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="#" class="navigation__link">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </a>
                </li>
                <li class="navigation__list-item">
                    <a href="profile.php" class="navigation__link">
                        <i class="fa fa-user-o fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main id="feed">
        <?php
            foreach ($posting as $photo) :?> 
                <div class="photo">
                    <header class="photo__header">
                        <img src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/1536688_1428084470758674_431250696_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_oc=AQkesUwIpk9a23QiKvpHHtfPnXcM3JbhCs8ZKZ8nMuY_jijScMZziDXn5QdsbBVWMX0&_nc_ht=scontent-sin6-2.xx&oh=7933505f31c2185da7e8d62799ed5672&oe=5E942A96" class="photo__avatar" />
                        <div class="photo__user-info">
                            <span class="photo__author"><?= $username; ?></span>
                            <span class="photo__location">location</span>
                        </div>
                    </header>
                    <img src="<?= $photo['url']; ?>" width="auto" height="auto" />
                    <div class="photo__info">
                        <div class="photo__actions">
                            <span class="photo__action">
                                <i class="fa fa-heart-o fa-lg"></i>
                            </span>
                            <span class="photo__action">
                                <i class="fa fa-comment-o fa-lg"></i>
                            </span>
                        </div>
                        <span class="photo__likes"><?= $photo['likes']; ?></span>
                        <ul class="photo__comments">
                            <li class="photo__comment">
                                <span class="photo__comment-author"><?= $username; ?></span> <?= $photo['caption']; ?>
                            </li>
                        </ul>
                        <span class="photo__time-ago">2 hours ago</span>
                        <div class="photo__add-comment-container">
                            <textarea name="comment" placeholder="Add a comment..."></textarea>
                            <i class="fa fa-ellipsis-h"></i>
                        </div>
                    </div>
                </div>
            
        <?php endforeach; ?>


        <!-- <div class="photo">
            <header class="photo__header">
                <img src="images/avatar.jpg" class="photo__avatar" />
                <div class="photo__user-info">
                    <span class="photo__author">inthetiger</span>
                    <span class="photo__location">Bestechung</span>
                </div>
            </header>
            <img src="images/feedPhoto.jpg" />
            <div class="photo__info">
                <div class="photo__actions">
                    <span class="photo__action">
                        <i class="fa fa-heart-o fa-lg"></i>
                    </span>
                    <span class="photo__action">
                        <i class="fa fa-comment-o fa-lg"></i>
                    </span>
                </div>
                <span class="photo__likes">45 likes</span>
                <ul class="photo__comments">
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                </ul>
                <span class="photo__time-ago">2 hours ago</span>
                <div class="photo__add-comment-container">
                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
            </div>
        </div>
        <div class="photo">
            <header class="photo__header">
                <img src="images/avatar.jpg" class="photo__avatar" />
                <div class="photo__user-info">
                    <span class="photo__author">inthetiger</span>
                    <span class="photo__location">Bestechung</span>
                </div>
            </header>
            <img src="images/feedPhoto.jpg" />
            <div class="photo__info">
                <div class="photo__actions">
                    <span class="photo__action">
                            <i class="fa fa-heart-o fa-lg"></i>
                        </span>
                    <span class="photo__action">
                            <i class="fa fa-comment-o fa-lg"></i>
                        </span>
                </div>
                <span class="photo__likes">45 likes</span>
                <ul class="photo__comments">
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                    <li class="photo__comment">
                        <span class="photo__comment-author">serranoarevalo</span> love this!
                    </li>
                </ul>
                <span class="photo__time-ago">2 hours ago</span>
                <div class="photo__add-comment-container">
                    <textarea name="comment" placeholder="Add a comment..."></textarea>
                    <i class="fa fa-ellipsis-h"></i>
                </div>
            </div>
        </div> -->
    </main>



    <footer class="footer">
        <div class="footer__column">
            <nav class="footer__nav">
                <ul class="footer__list">
                    <li class="footer__list-item"><a href="#" class="footer__link">About Us</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Support</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Blog</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Press</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Api</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Jobs</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Privacy</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Terms</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Directory</a></li>
                    <li class="footer__list-item"><a href="#" class="footer__link">Language</a></li>
                </ul>
            </nav>
        </div>
        <div class="footer__column">
            <span class="footer__copyright">© 2017 Vietgram</span>
        </div>
    </footer>
</body>

</html>