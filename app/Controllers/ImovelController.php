<?php

class ImovelController extends Controller
{

    public function index()
    {
        $model = $this->model('imovel');
        $imoveis = $model->get();

        $this->view('imovel/index', ['imoveis' => $imoveis]);
    }

    public function create()
    {
        $model = $this->model('proprietario');
        $proprietarios = $model->get();

        $this->view('imovel/create', ['proprietarios' => $proprietarios]);
    }

    public function store()
    {
        $model = $this->model('imovel');

        $imovel = $model->store([
            'nome' => $_POST['nome'],
            'endereco' => $_POST['endereco'],
            'proprietario_id' => $_POST['proprietario_id']
        ]);

        //erro
        if (!$imovel) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        //inseriu e redireciona
        header("Location: " . URL_APP . '/imovel/index');
        die();
    }

    // função que exibe detalhes
    // public function show()
    // {
    // }

    public function edit($id)
    {
        $model = $this->model('imovel');
        $imovel = $model->find($id);

        $model = $this->model('proprietario');
        $proprietarios = $model->get();
        $this->view('imovel/edit', [
            'imovel' => $imovel,
            'proprietarios' => $proprietarios
        ]);
    }

    public function update()
    {
        $model = $this->model('imovel');

        $model->update([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'endereco' => $_POST['endereco'],
            'proprietario_id' => $_POST['proprietario_id']
        ]);

        header("Location: " . URL_APP . '/imovel/index');
        die();
    }

    public function destroy()
    {
        if (isset($_POST['id'])) {

            $model = $this->model('imovel');
            $model->delete(intval($_POST['id']));

            header("Location: " . URL_APP . '/imovel/index');
            die();
        }
    }
}
