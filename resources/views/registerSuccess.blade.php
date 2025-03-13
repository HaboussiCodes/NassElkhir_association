<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تم التسجيل بنجاح!</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body class="d-flex justify-content-center p-4 pt-4">
    <div class="card">
        <div class="card-header bg-success text-white"><span dir="ltr" style='margin: 50px'>تم التسجيل بنجاح</span></div>
        <div class="card-body" >
        تم تسجيل <span dir="ltr">{{ request()->name }}</span> بنجاح

          
            <p class='text-center' ><a href="/home" class="btn btn-sm btn-primary m-2">العودة إلى الصفحة الرئيسية</a></p>
        </div>
    </div>
</body>
</html>