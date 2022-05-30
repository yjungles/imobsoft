<div class="card">
  <div class="card-header">
    <h4>Detalhes do Proprietário</h4>
  </div>
  <div class="card-body">

    <form name="addproprietario" method="post" action="<?php echo URL_APP; ?>/proprietario/update">
      <div class="row">
        <div class="col-12">
          <label class="form-label">Nome</label>
          <p><?php echo $data['proprietario']['nome']; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="form-label">Email</label>
          <p><?php echo  $data['proprietario']['email']; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <p><?php echo  $data['proprietario']['telefone']; ?>"</p>
        </div>
        <div class="col-md-6">
          <label class="form-label">Dia de Repasse</label>
          <p><?php echo $data['proprietario']['dia_repasse']; ?></p>

        </div>
      </div>

    </form>

  </div>
</div>