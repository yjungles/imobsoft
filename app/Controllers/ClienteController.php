<?php

class ClienteController extends Controller
{

    public function index()
    {
        $model = $this->model('cliente');
        $allClientes = $model->get();

        $this->view('cliente/index', ['clientes' => $allClientes]);
    }

    public function create()
    {
        $this->view('cliente/create', []);
    }

    public function store()
    {
        $model = $this->model('cliente');

        $cliente = $model->store([
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
        ]);

        //erro
        if (!$cliente) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        //inseriu e redireciona
        header("Location: " . URL_APP . '/cliente/index');
        die();
    }

    // função que exibe detalhes
    // public function show()
    // {
    // }

    public function edit($id)
    {
        $model = $this->model('cliente');
        $cliente = $model->find($id);
        $this->view('cliente/edit', ['cliente' => $cliente]);
    }

    public function update()
    {
        $model = $this->model('cliente');

        $model->update([
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
        ]);

        header("Location: " . URL_APP . '/cliente/index');
        die();
    }

    public function destroy()
    {
        if (isset($_POST['id'])) {

            $model = $this->model('cliente');
            $model->delete(intval($_POST['id']));

            header("Location: " . URL_APP . '/cliente/index');
            die();
        }
    }
}
