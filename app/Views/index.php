<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>All Applications</title>

</head>

<body>
<table>
    <caption>Applications</caption>
    <thead>
    <tr>
        <th>E-mail</th>
        <th>Amount</th>
        <th>Offer</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($applications as $application) : ?>
    <tr>
        <td data-label="E-mail"><?php echo $application['email'] ?></td>
        <td data-label="Amount"><?php echo $application['amount'] ?></td>
        <td data-label="Offer"><?php echo ($application['offer_received'] == true) ? 'Received' : 'Pending' ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php include_once('footer.php') ?>
</body>

</html>