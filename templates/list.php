<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MGW - list page</title>
</head>
<body>

<h1>list page</h1>

products
<ul>
    <?php
        foreach($products as $product) {
            $id = $product->getId();
    ?>

            <li>
                <?php
                    print '/index.php?action=show&id=' . $id;
                ?>
                <hr>
                <a href="/index.php?action=show&id=<?= $id ?>">
                id = <?= $product->getId() ?>

                <br>
                description = <?= $product->getDescription() ?>
                </a>
            </li>

    <?php
        }
    ?>
</ul>

</body>
</html>