<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>@yield('title', 'Home')</title>
</head>
<!-- Navbar -->
<body>
    @include('shorts.nav');
<div class="d-flex align-items-center justify-content-center text-center" style="height: 1100px;">
  <img src="https://cdn.betweencarpools.com/wp-content/uploads/2019/06/shutterstock_535931398.jpg" alt="" width="100%" height="100%">
    <div class="position-absolute top-50 start-50 translate-middle">
        <h1 class="text-white">Welcome to Our Blog</h1>
        <h3 class="text-white">Discover the latest insights and stories</h3>
        <p class="text-white">Join our community of passionate writers and readers</p>
        <button type="button" class="btn btn-light">Get Started</button>
        
</div>
</body>
</html>