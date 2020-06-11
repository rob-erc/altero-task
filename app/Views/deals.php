<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">

    <title>All Deals</title>

</head>

<body>
<table>
    <caption>Deals</caption>
    <thead>
    <tr>
        <th>Partner</th>
        <th>Application Id</th>
        <th>Status</th>
        <th> </th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($deals as $deal) : ?>
            <form method="post" action="/deals">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="application_id" value="<?php echo $deal['application_id'] ?>">
                <input type="hidden" name="status" value="<?php echo $deal['status'] ?>">
                <tr>
                    <td data-label="Partner"><?php echo $deal['partner'] ?></td>
                    <td data-label="Application Id"><?php echo $deal['application_id'] ?></td>
                    <td data-label="Status"><?php echo $deal['status'] ?></td>
                    <td data-label="Send Offer"><input type="submit"<?php
                        echo ($deal['status'] == 'offer') ? "value='Offer sent' disabled" : "value='Offer Deal'" ?>></td>
                </tr>
            </form>
        <?php endforeach; ?>
    </tbody>
</table>
<?php include_once('footer.php') ?>
</body>

</html>