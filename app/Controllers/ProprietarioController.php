<?php

class ProprietarioController extends Controller
{

    public function index()
    {
        $model = $this->model('proprietario');
        $proprietarios = $model->get();

        $this->view('proprietario/index', ['proprietarios' => $proprietarios]);
    }

    public function create()
    {
        $this->view('proprietario/create', []);
    }

    public function store()
    {
        $model = $this->model('proprietario');

        $proprietario = $model->store([
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'dia_repasse' => $_POST['dia_repasse']
        ]);

        //erro
        if (!$proprietario) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        //inseriu e redireciona
        header("Location: " . URL_APP . '/proprietario/index');
        die();
    }


    public function show($id)
    {
        $model = $this->model('proprietario');
        $proprietario = $model->find($id);

        // $model = $this->model('proprietario');
        // $imoveis = $model->getByProprietarioID($id);

        // $model = $this->model('contrato');
        // $contratos = $model->getByProprietarioID($id);

        $this->view('proprietario/show', [
            'proprietario' => $proprietario,
            // 'imoveis' => $imoveis,
            // 'contratos' => $contratos
        ]);
    }

    public function edit($id)
    {
        $model = $this->model('proprietario');
        $proprietario = $model->find($id);
        $this->view('proprietario/edit', ['proprietario' => $proprietario]);
    }

    public function update()
    {
        $model = $this->model('proprietario');

        $model->update([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'dia_repasse' => $_POST['dia_repasse']
        ]);

        header("Location: " . URL_APP . '/proprietario/index');
        die();
    }

    public function destroy()
    {
        if (isset($_POST['id'])) {

            $model = $this->model('proprietario');
            $model->delete(intval($_POST['id']));

            header("Location: " . URL_APP . '/proprietario/index');
            die();
        }
    }
}
