<div class="card">
  <div class="card-header">
    <a href="<?php echo URL_APP; ?>/contrato/create" class="btn btn-primary float-end">Adicionar contrato</a>
    <h4>Contratos</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cliente</th>
          <th scope="col">Imóvel</th>
          <th scope="col">Proprietário</th>
          <th scope="col">Data Início</th>
          <th scope="col">Data Fim</th>

          <th scope="col">Ver</th>
          <th scope="col">Editar</th>
          <th scope="col">Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['contratos'] as $contrato) {
        ?>
          <tr>
            <td><?php echo $contrato['id']; ?></td>
            <td><?php echo $contrato['cliente_nome']; ?></td>
            <td><?php echo $contrato['imovel_nome']; ?></td>
            <td><?php echo $contrato['proprietario_nome']; ?></td>
            <td><?php echo date('d/m/Y', strtotime($contrato['dt_inicio']));  ?></td>
            <td><?php echo date('d/m/Y', strtotime($contrato['dt_fim']));  ?></td>

            <td><a href="<?php echo URL_APP; ?>/contrato/show/<?php echo $contrato['id']; ?>" class="btn btn-light"><i class="bi bi-eye"></i></a></td>
            <td><a href="<?php echo URL_APP; ?>/contrato/edit/<?php echo $contrato['id']; ?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/contrato/destroy">
                <input type="hidden" name="id" value="<?php echo $contrato['id']; ?>" />
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>

  </div>
</div>