<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<div class="card">
  <div class="card-header">
    <h4>Adicionar Contrato</h4>
  </div>
  <div class="card-body">

    <form name="addCliente" method="post" action="<?php echo URL_APP; ?>/contrato/store">
      <div class="row">
        <div class="col-6">
          <label class="form-label">Data de Início</label>
          <input type="text" class="form-control date" name="dt_inicio" />
        </div>
        <div class="col-6">
          <label class="form-label">Data Término</label>
          <input type="text" class="form-control date" name="dt_fim" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-4">
          <label class="form-label">Taxa de Administração</label>
          <input type="text" class="form-control dinheiro" name="tx_administracao" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <label class="form-label">Valor do Aluguel</label>
          <input type="text" class="form-control dinheiro" name="val_aluguel" />
        </div>
        <div class="col-md-4">
          <label class="form-label">Valor do Condomínio</label>
          <input type="text" class="form-control dinheiro" name="val_condominio" />
        </div>
        <div class="col-md-4">
          <label class="form-label">Valor do IPTU</label>
          <input type="text" class="form-control dinheiro" name="val_iptu" />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <label class="form-label">Imóvel</label>
          <select class="form-select" name="imovel_id">
            <?php
            foreach ($data['imoveis'] as $imovel) {

            ?>
              <option value="<?php echo $imovel['id']; ?>"><?php echo $imovel['nome']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Locatário</label>
          <select class="form-select" name="cliente_id">
            <?php
            foreach ($data['clientes'] as $cliente) {

            ?>
              <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome']; ?></option>
            <?php
            }
            ?>
          </select>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-12">
          <button type="submit" class="btn btn-primary mt-3">Adicionar</button>
        </div>
      </div>
    </form>

  </div>
</div>
<script>
  $(document).ready(function() {

    $(".date").inputmask("99/99/9999", {
      "placeholder": "dd/mm/aaaa"
    });

    $(".dinheiro").maskMoney({
      prefix: 'R$ ',
      allowNegative: true,
      thousands: '.',
      decimal: ',',
      affixesStay: false
    })

  });
</script>