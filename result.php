<?php
    session_start();

    if (isset($_GET['id']))
    {
        $i = $_GET['id'];
        $_SESSION['status'][$_SESSION['players'][$i]] = !$_SESSION['status'][$_SESSION['players'][$i]];
    }
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مافیا</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="body container">
<div class="tableDiv">
    <table class="table table-dark w-75">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام</th>
            <th scope="col">نقش</th>
            <th scope="col">وضعیت</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $_SESSION['counter']; $i++):?>
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $_SESSION['players'][$i]?></td>
            <td><?php echo $_SESSION['Mafia'][$_SESSION['players'][$i]]?></td>
            <td><a href="?id=<?php echo $i; ?>">
                <button class="btn btn-<?php echo $_SESSION['status'][$_SESSION['players'][$i]]? 'success': 'danger'; ?> btn-sm">
                   <?php echo $_SESSION['status'][$_SESSION['players'][$i]]? "زنده": "مرده" ?>
                </button>
            </a></td>
        </tr>
        <?php endfor;?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
