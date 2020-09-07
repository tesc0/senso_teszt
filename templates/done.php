<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>

    <link rel="stylesheet" href="/assets/style.css?v=<?=time()?>">
</head>
<body>

<section>
    <div class="container">
        <?php if(!empty($selected_product)) { ?>
            <h1>Thank you for your purchase!</h1>
            <p>The selected product: <?=$selected_product["name"]?></p>

        <?php } ?>
    </div>
</section>
</body>
</html>