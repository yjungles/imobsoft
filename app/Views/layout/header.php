<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vista Soft</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <style>
    .form-label {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <header>
    <div class="px-3 py-2 bg-dark text-white mb-3">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="<?php echo URL_APP; ?>/index" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <span class="fs-4"> Vista Soft</span>
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="<?php echo URL_APP; ?>/cliente/index" class="nav-link text-white text-center">
                <i class="bi-people-fill bi d-block mx-auto mb-1" style="font-size: 2rem;"></i>
                Clientes
              </a>
            </li>
            <li>
              <a href="<?php echo URL_APP; ?>/proprietario/index" class="nav-link text-white  text-center">
                <i class="bi-person-badge bi d-block mx-auto mb-1" style="font-size: 2rem;"></i>
                Proprietários
              </a>
            </li>
            <li>
              <a href="<?php echo URL_APP; ?>/imovel/index" class="nav-link text-white  text-center">
                <i class="bi-house-fill bi d-block mx-auto mb-1" style="font-size: 2rem;"></i>
                Imóveis
              </a>
            </li>
            <li>
              <a href="<?php echo URL_APP; ?>/contrato/index" class="nav-link text-white  text-center">
                <i class="bi-file-text bi d-block mx-auto mb-1" style="font-size: 2rem;"></i>
                Contratos
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>

  </header>

  <main>
    <div class="container">