<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$pageTitle.' - '.env('APP_NAME')}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/clients/css/style.css">
</head>

<body>
    {{view('layouts/clients/header')}}

    <main class="py-2">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{view('layouts/clients/footer')}}
</body>

</html>