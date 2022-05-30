<?php

class MensalidadeController extends Controller
{
    public function setPaga()
    {
        $model = $this->model('mensalidade');
        $model->setPaga($_POST['id']);

        header("Location: " . URL_APP . '/contrato/show/' . $_POST['contrato_id']);
        die();
    }
}
