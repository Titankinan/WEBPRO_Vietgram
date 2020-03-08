<?php

    session_start();
    require_once 'koneksi.php';

    $posting = mysqli_query($conn, "SELECT * FROM photo");

    $result = mysqli_query($conn, "SELECT count(url) FROM photo");
    $postCount = mysqli_fetch_row($result);
    
    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username' ");
    $profile = mysqli_fetch_assoc($result);

    $name = $profile['name'];
    $web = $profile['website'];
    $bio = $profile['bio'];
    $email = $profile['email'];
    $phone = $profile['phone'];
    $gender = $profile['gender'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile | Vietgram</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navigation">
        <div class="navigation__column">
            <a href="feed.php">
                <img src="images/logo.png" />
            </a>
        </div>
        <form action="feed.php" method="get">
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
    <main id="profile">
        <header class="profile__header">
            <div class="profile__column">
                <img src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/1536688_1428084470758674_431250696_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_oc=AQkesUwIpk9a23QiKvpHHtfPnXcM3JbhCs8ZKZ8nMuY_jijScMZziDXn5QdsbBVWMX0&_nc_ht=scontent-sin6-2.xx&oh=7933505f31c2185da7e8d62799ed5672&oe=5E942A96" width="150" height="150" />
            </div>
            <div class="profile__column">
                <div class="profile__title">
                    <h3 class="profile__username"><?= $username; ?></h3>
                    <a href="edit-profile.php">Edit profile</a>
                    <a href="logout.php">Log Out</a>
                    <!-- <i class="fa fa-cog fa-lg"></i> -->
                </div>
                <ul class="profile__stats">
                    <li class="profile__stat">
                        <span class="stat__number"><?= $postCount[0] ?></span> posts
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">1234</span> followers
                    </li>
                    <li class="profile__stat">
                        <span class="stat__number">36</span> following
                    </li>
                </ul>
                <p class="profile__bio">
                    <span class="profile__full-name">
                        <?= $name ?>
                    </span> <?= $bio ?>
                    <a href="<?= $web ?>"><?= $web ?></a>
                </p>
            </div>
        </header>
        <section class="profile__photos">
            <?php
                foreach ($posting as $photo) :?>
                    <div class="profile__photo">
                        <img src="<?= $photo['url']; ?>" />
                        <div class="profile__photo-overlay">
                            <span class="overlay__item">
                                <i class="fa fa-heart"></i>
                                <?= $photo['likes']; ?>
                            </span>
                            <!-- <span class="overlay__item">
                                <i class="fa fa-comment"></i>
                                344
                            </span> -->
                        </div>
                    </div>

            <?php endforeach; ?>

            <!-- <div class="profile__photo">
                <img src="images/feedPhoto.jpg" />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                        <i class="fa fa-heart"></i>
                        486
                    </span>
                    <span class="overlay__item">
                        <i class="fa fa-comment"></i>
                        344
                    </span>
                </div>
            </div>
            <div class="profile__photo">
                <img src="images/feedPhoto.jpg" />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                            <i class="fa fa-heart"></i>
                            486
                        </span>
                    <span class="overlay__item">
                            <i class="fa fa-comment"></i>
                            344
                        </span>
                </div>
            </div>
            <div class="profile__photo">
                <img src="images/feedPhoto.jpg" />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                                <i class="fa fa-heart"></i>
                                486
                            </span>
                    <span class="overlay__item">
                                <i class="fa fa-comment"></i>
                                344
                            </span>
                </div>
            </div>
            <div class="profile__photo">
                <img src="images/feedPhoto.jpg" />
                <div class="profile__photo-overlay">
                    <span class="overlay__item">
                                    <i class="fa fa-heart"></i>
                                    486
                                </span>
                    <span class="overlay__item">
                                    <i class="fa fa-comment"></i>
                                    344
                                </span>
                </div>
            </div> -->
        </section>
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