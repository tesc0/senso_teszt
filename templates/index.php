<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>

    <link rel="stylesheet" href="/assets/style.css?v=<?= time() ?>">
</head>
<body>

<section>

    <div class="container">
        <input type="text" id="filter">
        <br>
        <br>
        <table>
            <?php if (!empty($products)) {
                foreach ($products as $key => $product) { ?>

                    <tr>
                        <td><?= $product["name"] ?></td>
                        <td><?= $product["price"] ?></td>
                        <td><a href="buy/<?= $product["id"] ?>">Buy</a></td>
                    </tr>

                <?php } ?>

            <?php } ?>
        </table>
    </div>
</section>

<script>
    (function () {
        document.querySelector("#filter").addEventListener("keyup", function () {

            let data = {};
            data.keyword = this.value.trim();

            fetch("/filter", {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(response => response.json()).then(json => {
                let filtered = json.filtered;

                console.log(filtered);

                document.querySelector("table").innerHTML = "";
                let new_html = "";

                for(let i = 0; i < filtered.length; i++) {
                    new_html += "<tr>" +
                        "<td>" + filtered[i].name + "</td>" +
                        "<td>" + filtered[i].price + "</td>" +
                        "<td><a href='buy/" + filtered[i].id + "'>Buy</a></td>" +
                        "</tr>";
                }

                document.querySelector("table").innerHTML = new_html;
            });
        });
    })();
</script>
</body>
</html>