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
<form action="backend/Main.php" class="myForm" method="post">
    <div class="form-group">
        <input type="text" class="form-control" aria-describedby="testHelp"
               placeholder="اسم بازیکنان را به ترتیب وارد کنید"
               name="frm[name]"
        >
        <div id="textHelp" class="form-text text-light">اسامی را با کاما (,) از یکدیگر جدا کنید</div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-light btn-block w-100 mt-4" name="frm[submit]">ثبت</button>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
