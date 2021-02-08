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
                    <h1 class="caption__title">Звонок</h1>
                </div>
                <div class="about__table table">
                    <div class="thead">
                        <div class="tr">
                            <span class="th">ID</span>
                            <span class="th">Имя</span>
                            <span class="th">Номер</span>
                        </div>
                    </div>
                    <div class="tbody">
                        <?php foreach ($numbers as $key => $number) : ?>
                            <div class="tr">
                                <span class="td"><?php echo $number['id'] ?></span>
                                <span class="td"><?php echo $number['name'] ?></span>
                                <span class="td"><?php echo $number['number'] ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>