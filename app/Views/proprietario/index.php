<div class="card">
  <div class="card-header">
    <a href="<?php echo URL_APP; ?>/proprietario/create" class="btn btn-primary float-end">Adicionar proprietário</a>
    <h4>Proprietarios</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Dia de Repasse</th>

          <th scope="col">Ver</th>
          <th scope="col">Editar</th>
          <th scope="col">Apagar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['proprietarios'] as $proprietario) {
        ?>
          <tr>
            <td><?php echo $proprietario['id']; ?></td>
            <td><?php echo $proprietario['nome']; ?></td>
            <td><?php echo $proprietario['email']; ?></td>
            <td><?php echo $proprietario['telefone']; ?></td>
            <td><?php echo $proprietario['dia_repasse']; ?></td>
            <td><a href="<?php echo URL_APP; ?>/proprietario/show/<?php echo $proprietario['id']; ?>" class="btn btn-light"><i class="bi bi-eye"></i></a></td>
            <td><a href="<?php echo URL_APP; ?>/proprietario/edit/<?php echo $proprietario['id']; ?>" class="btn btn-secondary"><i class="bi bi-pencil"></i></a></td>
            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/proprietario/destroy">
                <input type="hidden" name="id" value="<?php echo $proprietario['id']; ?>" />
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