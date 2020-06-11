<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>New Application</title>

</head>

<body>
<div>

    <form method="post" action="/" style="background-color: transparent; border-color: transparent">

        <h2 id="page-title">
            New Application
        </h2>
        <hr>

        <?php if (isset($errors)) : ?>
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach ?>
            </ul>
        <?php endif; ?>

        <label>E-mail</label>
        <span class="tooltip top" aria-label="Enter your E-mail address">
            <input name="email" type="text" required>
        </span>
        <br>
        <br>

        <label>Amount</label>
        <span class="tooltip top" aria-label="Enter requested amount">
            <input name="amount" type="text" required>
        </span>

        <br>
        <br>

        <input type="submit" value="Save">
    </form>

    <?php include_once('footer.php') ?>

</div>

</body>

</html>