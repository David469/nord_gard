<?php
require('../php/connect.php');
require('../php/queries.php');
session_start();
?>

<?php include('../inc/head.php'); ?>

<link rel="stylesheet" type="text/css" href="../styles/style__admin.css">
</head>

<body>
    <?php include('inc/header.php') ?>
    <main>
        <div class="container">
            <div class="call">
                <div class="top caption">
                    <h1 class="caption__title">Сообщения</h1>
                </div>
                <div class="about__table table">
                    <div class="thead">
                        <div class="tr">
                            <span class="th">ID</span>
                            <span class="th">Имя</span>
                            <span class="th">Номер</span>
                            <span class="th">Сообщение</span>
                        </div>
                    </div>
                    <div class="tbody">
                        <?php foreach ($messages as $key => $message) : ?>
                            <?php
                            $id = $message['id_number'];
                            $query = "SELECT * FROM `numbers` WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $query);
                            $number = mysqli_fetch_all($result, MYSQLI_ASSOC)[0];
                            mysqli_free_result($result);
                            ?>
                            <div class="tr">
                                <span class="td"><?php echo $message['id'] ?></span>
                                <span class="td"><?php echo $number['name'] ?></span>
                                <span class="td"><?php echo $number['number'] ?></span>
                                <span class="td"><?php echo $message['message'] ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>