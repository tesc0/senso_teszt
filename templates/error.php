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
        <h1>Unfortunately we haven't found such product!</h1>
        <p>Redirecting....</p>
    </div>
</section>

<script>
    (function() {
        setTimeout(() => {
            window.location.href = "/";
        }, 2000)
    })();
</script>
</body>
</html>