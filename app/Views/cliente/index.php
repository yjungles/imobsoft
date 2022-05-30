<div class="card">
  <div class="card-header">
    <a href="<?php echo URL_APP; ?>/cliente/create" class="btn btn-primary float-end">Adicionar cliente</a>
    <h4>Clientes</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>

          <th scope="col">Editar</th>
          <th scope="col">Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['clientes'] as $cliente) {
        ?>
          <tr>
            <td><?php echo $cliente['id']; ?></td>
            <td><?php echo $cliente['nome']; ?></td>
            <td><?php echo $cliente['email']; ?></td>
            <td><?php echo $cliente['telefone']; ?></td>
            <td><a href="<?php echo URL_APP; ?>/cliente/edit/<?php echo $cliente['id']; ?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/cliente/destroy">
                <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>" />
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