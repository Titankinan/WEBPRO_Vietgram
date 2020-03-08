<?php

    session_start();
    require_once 'koneksi.php';
    
    $username = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM profile WHERE username = '$username' ");
    $profile = mysqli_fetch_assoc($result);

    $name = $profile['name'];
    $web = $profile['website'];
    $bio = $profile['bio'];
    $email = $profile['email'];
    $phone = $profile['phone'];
    $gender = $profile['gender'];
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $uname = $_POST['username'];
        $web = $_POST['web'];
        $bio = $_POST['bio'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        $update = mysqli_query($conn, "UPDATE profile set name = '$name', username = '$uname'  , website = '$web', bio = '$bio', email = '$email', phone = '$phone', gender = '$gender' WHERE username = '$username' ");

        echo "<script type='text/JavaScript'>
        alert('Profile updated');
        </script>";
        echo "<script>
        document.location.href = 'profile.php';
        </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile | Vietgram</title>
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

    <main id="edit-profile">
        <div class="edit-profile__container">
            <header class="edit-profile__header">
                <div class="edit-profile__avatar-container">
                    <img src="https://scontent-sin6-2.xx.fbcdn.net/v/t1.0-9/1536688_1428084470758674_431250696_n.jpg?_nc_cat=100&_nc_sid=85a577&_nc_oc=AQkesUwIpk9a23QiKvpHHtfPnXcM3JbhCs8ZKZ8nMuY_jijScMZziDXn5QdsbBVWMX0&_nc_ht=scontent-sin6-2.xx&oh=7933505f31c2185da7e8d62799ed5672&oe=5E942A96" class="edit-profile__avatar" />
                </div>
                <h4 class="edit-profile__username"><?= $username ?></h4>
            </header>
            <form action="" method="post" class="edit-profile__form">
                <div class="form__row">
                    <label for="full-name" class="form__label">Name:</label>
                    <input id="full-name" type="text" class="form__input" name="name" value="<?= $name; ?>" />
                </div>
                <div class="form__row">
                    <label for="user-name" class="form__label">Username:</label>
                    <input id="user-name" type="text" class="form__input" name="username" value="<?= $username; ?>" />
                </div>
                <div class="form__row">
                    <label for="website" class="form__label">Website:</label>
                    <input id="website" type="url" class="form__input" name="web" value="<?= $web; ?>" />
                </div>
                <div class="form__row">
                    <label for="bio" class="form__label">Bio:</label>
                    <textarea id="bio" name="bio"><?= $bio; ?></textarea>
                </div>
                <div class="form__row">
                    <label for="email" class="form__label">Email:</label>
                    <input id="email" type="email" class="form__input" name="email" value="<?= $email; ?>" />
                </div>
                <div class="form__row">
                    <label for="phone" class="form__label">Phone Number:</label>
                    <input id="phone" type="tel" class="form__input" name="phone" value="<?= $phone; ?>" />
                </div>
                <div class="form__row">
                    <label for="gender" class="form__label">Gender:</label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="can't remember">Can't remember</option>
                    </select>
                </div>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
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