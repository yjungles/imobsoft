<div class="card">
  <div class="card-header">
    <h4>Atualizar Imóvel</h4>
  </div>
  <div class="card-body">

    <form name="addimovel" method="post" action="<?php echo URL_APP; ?>/imovel/update">
      <div class="row">
        <div class="col-12">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $data['imovel']['nome']; ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="form-label">Endereço</label>
          <input type="text" class="form-control" name="endereco" value="<?php echo $data['imovel']['endereco']; ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label">Proprietário</label>
          <select class="form-select" name="proprietario_id">
            <?php
            foreach ($data['proprietarios'] as $proprietario) {
              $selected =  $data['imovel']['proprietario_id'] == $proprietario['id'];
            ?>
              <option value="<?php echo $proprietario['id']; ?>" <?php echo  $selected ? 'selected="selected"' : ''; ?>><?php echo $proprietario['nome']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
          <input type="hidden" name="id" value="<?php echo  $data['imovel']['id']; ?>" />
        </div>
      </div>
    </form>

  </div>
</div>