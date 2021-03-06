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
        <input type="text" class="form-control" aria-describedby="testHelp1"
               placeholder="نقش شهروندان را وارد کنید"
               name="frm[citizen]">
        <div id="textHelp1" class="form-text text-light">نقش ها را با کاما (,) از یکدیگر جدا کنید</div>
        <div class="input-group mb-3">
            <input type="range" class="form-range " id="rangeCitizen" min="0"
                   max="<?php echo $_GET['citizen'] + $_GET['mafia']; ?>" dir="ltr"
                   oninput="updateLabel('numberCitizen', 'rangeCitizen')"
                   value="<?php echo $_GET['citizen']; ?>"
                   name="frm[citizenNumber]">
            <div class="text-light">
                <p class="text-right">تعداد شهروندان: <span class="text-info"
                                                            id="numberCitizen"><?php echo $_GET['citizen']; ?></span>
                </p>
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <input type="text" class="form-control" aria-describedby="testHelp2"
               placeholder="نقش مافیا ها را وارد کنید"
               name="frm[mafia]">
        <div id="textHelp2" class="form-text text-light">اسامی را با کاما (,) از یکدیگر جدا کنید</div>
        <div class="input-group mb-3">
            <input type="range" class="form-range" id="rangeMafia" min="0"
                   max="<?php echo floor(($_GET['citizen'] + $_GET['mafia']) / 2); ?>" dir="ltr"
                   oninput="updateLabel('numberMafia', 'rangeMafia')"
                   value="<?php echo $_GET['mafia']; ?>"
                   name="frm[mafiaNumber]">
            <div class="text-light">
                <p class="text-right">تعداد مافیا ها: <span class="text-info"
                                                            id="numberMafia"><?php echo $_GET['mafia']; ?></span></p>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-outline-light btn-block w-100 mt-4" name="frm[btn]">ثبت</button>
    </div>
</form>
<script>
    function updateLabel(label, range) {
        document.getElementById(label).innerHTML = document.getElementById(range).value;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>
