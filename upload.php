<?php 

	session_start();
    require_once 'koneksi.php';

    $username = $_SESSION['username'];

    if (isset($_POST['upload'])) {
    	$url = $_POST['url'];
    	$caption = $_POST['caption'];
    	$insert = mysqli_query($conn, "INSERT INTO photo VALUES('$url','$caption',0 ) ");

    	echo "<script type='text/JavaScript'>
        alert('Photo uploaded');
        </script>";
        echo "<script>
        document.location.href = 'feed.php';
        </script>";
    }

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
                    <label class="form__label">Image url :</label>
                    <input type="text" name="url" class="form__input" />
                </div>
                <div class="form__row">
                    <label class="form__label">Caption :</label>
                    <textarea name="caption"></textarea>
                </div>
                <input type="submit" name="upload" value="Upload">
            </form>
        </div>
    </main>

</body>


</html>