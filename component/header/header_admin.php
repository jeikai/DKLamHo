<?php
include '../../database/database.php';
session_start();
$userId = $_SESSION['userId'];
if (!isset($userId)) {
    header('Location: ../../component/login/login.php');
}
if (isset($_POST['log_out'])) {
    session_destroy();
    header('Location: ../../component/login/login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kiểm</title>
    <link rel="stylesheet" href="./css/home_page.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font-awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css?fbclid=IwAR3z5H1piWVUZNQRsfaddkVOmOKojLEgynatk5wQJK4mgmaqia8GD1Y4ljU">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../style.css">
</head>

<body>
<header class="bg-gray-800 text-white">
    <nav class="container mx-auto px-4 py-2 flex items-center justify-between">
        <?php
        if ($connection) {
            $sql = "SELECT * FROM user WHERE userId = $userId";
            $data = Query($sql, $connection);
            foreach ($data as $data) {
                ?>
                <h3 class="text-xl font-bold"><?php echo $data['username']; ?></h3>
                <?php
            }
        }
        ?>
        <ul class="flex space-x-4">
            <li>
                <label class="switch">
                    <span class="sun">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current text-yellow-500">
                            <g>
                                <circle r="5" cy="12" cx="12"></circle>
                                <path d="m21 13h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm-17 0h-1a1 1 0 0 1 0-2h1a1 1 0 0 1 0 2zm13.66-5.66a1 1 0 0 1 -.66-.29 1 1 0 0 1 0-1.41l.71-.71a1 1 0 1 1 1.41 1.41l-.71.71a1 1 0 0 1 -.75.29zm-12.02 12.02a1 1 0 0 1 -.71-.29 1 1 0 0 1 0-1.41l.71-.66a1 1 0 0 1 1.41 1.41l-.71.71a1 1 0 0 1 -.7.24zm6.36-14.36a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm0 17a1 1 0 0 1 -1-1v-1a1 1 0 0 1 2 0v1a1 1 0 0 1 -1 1zm-5.66-14.66a1 1 0 0 1 -.7-.29l-.71-.71a1 1 0 0 1 1.41-1.41l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.29zm12.02 12.02a1 1 0 0 1 -.7-.29l-.66-.71a1 1 0 0 1 1.36-1.36l.71.71a1 1 0 0 1 0 1.41 1 1 0 0 1 -.71.24z"></path>
                            </g>
                        </svg>
                    </span>
                    <span class="moon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="fill-current text-white">
                            <path d="m223.5 32c-123.5 0-223.5 100.3-223.5 224s100 224 223.5 224c60.6 0 115.5-24.2 155.8-63.4 5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6-96.9 0-175.5-78.8-175.5-176 0-65.8 36-123.1 89.3-153.3 6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z"></path>
                        </svg>
                    </span>
                    <input type="checkbox" class="input" name="changeTheme" />
                    <span class="slider"></span>
                </label>
            </li>
            <li><a href="../home/home_admin.php" class="hover:text-gray-400" >Trang chủ</a></li>
            <li><a href="../form/form_dk.php" class="hover:text-gray-400">Đăng ký</a></li>
            <li>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <button type="submit" name="log_out" class="hover:text-gray-400" style="font-size: 25px;">Đăng xuất</button>
                </form>
            </li>
        </ul>
    </nav>
</header>
