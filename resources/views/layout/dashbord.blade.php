<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>

<header class="py-2 bg-dark text-white mb-4">
<div class="container">
<h1>{{config('app.name')}}</h1>
</div>

</header>

    <div class="container">
    <div class="row">
    <aside class="col-md-3">
    <h4>Navigation menu</h4>
    <nav>
    <ul class="nav flex-column">
    <li class="nav-item"><a href="" class="navlink">dashbord</a></li>
    <li class="nav-item"><a href="" class="navlink">categories</a></li>
    <li class="nav-item"><a href="" class="navlink">product</a></li>
    </ul>
    </nav>
    </aside>

    <menu class="col-md-9">
<div class="mb-4">
    <h3 class="text-primary">  @yield('title','default title')</h3>
</div>

   @yield('content')
    </menu>
   
    
    </div>




    </div>
</body>
</html>