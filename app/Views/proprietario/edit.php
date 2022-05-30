<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<div class="card">
  <div class="card-header">
    <h4>Atualizar Proprietário</h4>
  </div>
  <div class="card-body">

    <form name="addproprietario" method="post" action="<?php echo URL_APP; ?>/proprietario/update">
      <div class="row">
        <div class="col-12">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" value="<?php echo $data['proprietario']['nome']; ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo  $data['proprietario']['email']; ?>" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo  $data['proprietario']['telefone']; ?>" />
        </div>
        <div class="col-md-6">
          <label class="form-label">Dia de Repasse</label>
          <select class="form-select" name="dia_repasse">
            <?php
            for ($i = 1; $i <= 30; $i++) {
              $selected =  $data['proprietario']['dia_repasse'] == $i;
            ?>
              <option value="<?php echo $i; ?>" <?php echo  $selected ? 'selected="selected"' : ''; ?>><?php echo $i; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
          <input type="hidden" name="id" value="<?php echo  $data['proprietario']['id']; ?>" />
        </div>
      </div>
    </form>

  </div>
</div>
<script>
  $(document).ready(function() {
    $(":input").inputmask();

    $("#telefone").inputmask({
      mask: '(99) 99999-9999',
      showMaskOnHover: true,
      showMaskOnFocus: true,
      onBeforePaste: function(pastedValue, opts) {
        var processedValue = pastedValue;
        return processedValue;
      }
    });
  });
</script>