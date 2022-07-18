<?php
session_start();
if (!isset($_SESSION['counter'])) {
    header('location: /front/html/index.php');
}
?>
<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مافیا</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body class="body container">

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">توجّه!</h5>
            </div>
            <div class="modal-body">
                <p> <?php echo $_SESSION['players'][$_SESSION['counter']] ?> عزیز!
                    </br>
                    </br>
                    نقش بازیکنان مثل یک گنج با ارزش است که کسی جز خود بازیکن نباید از آن مطّلع باشد.
                    ابتدا مطمئن شوید کسی جز شما به صفحه نگاه نمی کند سپس روی دکمه "نمایش نقش" کلیک کنید و پس از اینکه از
                    آن مطلع شدید روی دکمه "فهمیدم" کلیک کنید.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">اوکی، گرفتم</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalAdmin" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">گاد بازی!</h5>
            </div>
            <div class="modal-body">
                <p>
                    گادبازی، اگه صحت دیدن نقش ها رو قبول داری روی دکمه تایید کلیک کن تا صفحه نتایج رو ببینی.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="window.location.replace('/front/html/result.php')">تایید</button>
            </div>
        </div>
    </div>
</div>

<div class="myCollapse">
    <form action="../../Main.php" method="post">
        <div class="form-group">
            <p>
                <button class="btn btn-light w-100" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseRule"
                        aria-expanded="false" aria-controls="collapseWidthExample">
                    <?php echo $_SESSION['players'][$_SESSION['counter']] ?> عزیز، لطفا برای نمایش نقشتان کلیک کنید
                </button>
            </p>
            <div style="min-height: 120px;">
                <div class="collapse collapse-horizontal" id="collapseRule">
                    <div class="card card-body" style="width: 520px;"><p>
                            نقش شما: <b><?php echo $_SESSION['Mafia'][$_SESSION['players'][$_SESSION['counter']]] ?></b>
                        </p></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-light w-100"> فهمیدم!</button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
<?php if ($_SESSION['counter'] < count($_SESSION['players'])) { ?>
    <script>
        $(document).ready(function () {
            $("#myModal").modal('show');
        });
    </script>
<?php
} else {
?>
    <script>
        $(document).ready(function () {
            $("#myModalAdmin").modal('show');
        });
    </script>
    <?php
}
?>
</body>
</html>
