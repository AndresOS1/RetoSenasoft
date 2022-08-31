<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ASOYME S.A</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-12 d-flex">
        <div class="col-3 d-flex flex-column border shadow-lg">
                  <div class="w-100 d-flex justify-content-center">
                    <i class="bi bi-person-circle fs-1"></i>
                  </div>
                  <div class="w-100 d-flex justify-content-center">
                     <h1>ASOYME S.A</h1>
                  </div>

                  <div class="w-100 d-flex justify-content-center">
                    <a href="{{route('proveedor.index')}}">proveedor</a>
                  </div>
        

        </div>
        <div class="col-9">
            <div class="col-12">
                <nav class="w-100 d-flex flex-row flex-wrap">
                    <div class="d-flex">
                        <p>{{Auth()->user()->username}}</p>
                    </div>
                </nav>
                <section class="col-12 border" style="height:100vh">
                          @yield('content')
                </section>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>