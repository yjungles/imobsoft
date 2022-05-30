<div class="card">
  <div class="card-header">
    <h4>Ver Contrato</h4>
  </div>
  <div class="card-body">

    <form name="addCliente" method="post" action="<?php echo URL_APP; ?>/contrato/update">
      <div class="row">
        <div class="col-6">
          <label class="form-label">Data de Início</label>
          <p><?php echo date('d/m/Y', strtotime($data['contrato']['dt_inicio'])); ?></p>
        </div>
        <div class="col-6">
          <label class="form-label">Data Término</label>
          <p><?php echo date('d/m/Y', strtotime($data['contrato']['dt_fim'])); ?></p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-3">
          <label class="form-label">Taxa de Administração</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['tx_administracao']); ?></p>

        </div>
        <div class="col-md-3">
          <label class="form-label">Valor do Aluguel</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['val_aluguel']); ?></p>
        </div>
        <div class="col-md-3">
          <label class="form-label">Valor do Condomínio</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['val_condominio']); ?></p>
        </div>
        <div class="col-md-3">
          <label class="form-label">Valor do IPTU</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['val_iptu']); ?></p>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-6">
          <label class="form-label">Imóvel</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['imovel_nome']); ?></p>

        </div>
        <div class="col-md-6">
          <label class="form-label">Locatário</label>
          <p><?php echo str_replace(".", ",", $data['contrato']['cliente_nome']); ?></p>
        </div>
      </div>

    </form>

  </div>
</div>
<div class="card mt-3">
  <div class="card-header">
    <h4>Mensalidades</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Valor</th>
          <th scope="col">Data de Vencimento</th>
          <th scope="col">Paga</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['mensalidades'] as $mensalidade) {
        ?>
          <tr>
            <td><?php echo $mensalidade['id']; ?></td>
            <td>R$ <?php echo str_replace(".", ",", $mensalidade['val_mensalidade']); ?></td>
            <td><?php echo date('d/m/Y', strtotime($mensalidade['dt_vencimento']));  ?></td>
            <td><?php echo $mensalidade['is_paga'] ? 'Sim' : 'Não'; ?></td>

            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/mensalidade/setPaga">
                <input type="hidden" name="id" value="<?php echo $mensalidade['id']; ?>" />
                <input type="hidden" name="contrato_id" value="<?php echo $data['contrato']['id']; ?>" />
                <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
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
<div class="card mt-3">
  <div class="card-header">
    <h4>Repasses</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Valor</th>
          <th scope="col">Data de Repasse</th>
          <th scope="col">Repassado</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($data['repasses'] as $repasse) {
        ?>
          <tr>
            <td><?php echo $repasse['id']; ?></td>
            <td>R$ <?php echo str_replace(".", ",", $repasse['val_repasse']); ?></td>
            <td><?php echo date('d/m/Y', strtotime($repasse['dt_repasse']));  ?></td>
            <td><?php echo $repasse['is_repassada'] ? 'Sim' : 'Não'; ?></td>

            <td>
              <form name="myForm" method="post" action="<?php echo URL_APP; ?>/repasse/setRepassado">
                <input type="hidden" name="id" value="<?php echo $repasse['id']; ?>" />
                <input type="hidden" name="contrato_id" value="<?php echo $data['contrato']['id']; ?>" />
                <button type="submit" class="btn btn-success"><i class="bi bi-check"></i></button>
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