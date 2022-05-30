<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<div class="card">
  <div class="card-header">
    <h4>Adicionar Proprietário</h4>
  </div>
  <div class="card-body">

    <form name="addCliente" method="post" action="<?php echo URL_APP; ?>/proprietario/store">
      <div class="row">
        <div class="col-12">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="nome" />
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <label class="form-label">Email</label>
          <input type="email" class="form-control" name="email" />
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <label class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" />
        </div>
        <div class="col-md-6">
          <label class="form-label">Dia de Repasse</label>
          <select class="form-select" name="dia_repasse">
            <?php for ($i = 1; $i <= 30; $i++) {
            ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
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