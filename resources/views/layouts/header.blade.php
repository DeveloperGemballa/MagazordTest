<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@700&family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <style>
        .tamanho {
            width: 120vh;
        }
    </style>
    <title>Gemballa - @yield('title')</title>
</head>
<body>
<header>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                  <a class="navbar-brand" href="/"><h6 style="font-family: 'Sedgwick Ave Display', cursive; letter-spacing:2px;text-shadow: rgba(0, 0, 0, 0.15) 0px 3px 8px;font-size: 50px;">BackEnd</h6></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link" href="/pessoas/create">Cadastro pessoas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/contatos/create">Cadastro contatos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/pessoas">Página inicial pessoas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/contatos">Página inicial contatos</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
        </div>
        <div class="container">
            @yield('conteudo')
        </div>
</header>