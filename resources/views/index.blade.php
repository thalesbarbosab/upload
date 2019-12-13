<!doctype html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Álbum</title>
    <style>
        body { padding: 20px; }
        .navbar { margin-bottom: 20px; }
        :root { --jumbotron-padding-y: 10px; }
        .jumbotron {
          padding-top: var(--jumbotron-padding-y);
          padding-bottom: var(--jumbotron-padding-y);
          margin-bottom: 0;
          background-color: #fff;
        }
        @media (min-width: 768px) {
          .jumbotron {
            padding-top: calc(var(--jumbotron-padding-y) * 2);
            padding-bottom: calc(var(--jumbotron-padding-y) * 2);
          }
        }
        .jumbotron p:last-child { margin-bottom: 0; }
        .jumbotron-heading { font-weight: 300; }
        .jumbotron .container { max-width: 40rem; }
        .btn-card { margin: 4px; }
        .btn { margin-right: 5px; }
        footer { padding-top: 3rem; padding-bottom: 3rem; }
        footer p { margin-bottom: .25rem; }
    </style>
</head>
<body>

    <header>
      <div class="navbar navbar-dark bg-dark shadow-sm">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Seu álbum de fotos</strong>
          </a>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Escreva aqui seu novo Post</h1>
          <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-left">
              <label for="email">Endereço de e-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="nome@dominio.com">
            </div>
            <div class="form-group text-left">
              <label for="mensagem">Sua mensagem</label>
              <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="arquivo" name="arquivo">
              <label class="custom-file-label" for="arquivo">Escolha um arquivo</label>
            </div>
            <p>
              <button type="submit" class="btn btn-primary my-2">Enviar</button>
              <button type="reset" class="btn btn-secondary my-2">Cancelar</button>
            </p>
          </form>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                    <img class="card-img-top figure-img img-fluid rounded" style="width: 300px;" src="{{'storage/'.$post->arquivo}}">
                        <div class="card-body">
                        <p class="card-text">{{$post->email}}</p>
                        <p class="card-text">{{$post->mensagem}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <!--button type="button" class="btn btn-sm btn-outline-secondary">Download</button-->
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="/posts/{{$post->id}}">Download</a>
                            <form method="POST" action="/posts/{{$post->id}}">
                                @csrf
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-sm btn-outline-danger">Apagar</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                 </div>
                @endforeach
          </div>
        </div>
      </div>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Voltar para cima</a>
        </p>
        <p>©2018 Sua empresa.com</p>
      </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

