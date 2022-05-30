<div class="card">
  <div class="card-header">
    <a href="<?php echo URL_APP; ?>/imovel/create" class="btn btn-primary float-end">Adicionar imóvel</a>
    <h4>Imóveis</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Imóvel</th>
          <th scope="col">Endereço</th>
          <th scope="col">Proprietário</th>

          <th scope="col">Editar</th>
          <th scope="col">Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['imoveis'] as $imovel) {
        ?>
          <tr>
            <td><?php echo $imovel['id']; ?></td>
            <td><?php echo $imovel['nome']; ?></td>
            <td><?php echo $imovel['endereco']; ?></td>
            <td><a href="<?php echo URL_APP; ?>/proprietario/show/<?php echo $imovel['proprietario_id']; ?>"><?php echo $imovel['proprietario_nome']; ?></a></td>
            <td><a href="<?php echo URL_APP; ?>/imovel/edit/<?php echo $imovel['id']; ?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/imovel/destroy">
                <input type="hidden" name="id" value="<?php echo $imovel['id']; ?>" />
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