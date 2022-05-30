<?php

class RepasseController extends Controller
{
    public function setRepassado()
    {
        $model = $this->model('repasse');
        $model->setRepassado($_POST['id']);

        header("Location: " . URL_APP . '/contrato/show/' . $_POST['contrato_id']);
        die();
    }
}
