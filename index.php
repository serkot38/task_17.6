<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Персоналы</title>
        <link rel="stylesheet" href="styles.css" />
    </head>
    <body>
        <div class="flex-container">
            <div class="header">
                <div class="logo">
                    <img src="images/PHP_15_2.2.jpg">
                </div>
                <h1>ПЕРСОНАЛЫ</h1>
            </div>
            <div class="about">
                <?php include 'fullnames.php'; ?>
            </div>
            <div class="footer">
                <h6>
                    Козлов Сергей Михайлович<br>
                    (c) Все права защищены.
                </h6>
                <div class="vector">
                    <a href="#"><img src="images/Vector 2.png"></a>
                </div>
            </div>
        </div>
    </body>
</html>