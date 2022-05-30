<div class="card">
  <div class="card-header">
    <h4>Adicionar Imóvel</h4>
  </div>
  <div class="card-body">

    <form name="addCliente" method="post" action="<?php echo URL_APP; ?>/imovel/store">
      <div class="row">
        <div class="col-12">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="form-label">Endereço</label>
          <input type="text" class="form-control" name="endereco" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label">Proprietário</label>
          <select class="form-select" name="proprietario_id">
            <?php
            foreach ($data['proprietarios'] as $proprietario) {

            ?>
              <option value="<?php echo $proprietario['id']; ?>"><?php echo $proprietario['nome']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
        </div>
      </div>
    </form>

  </div>
</div>