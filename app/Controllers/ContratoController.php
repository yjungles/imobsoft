<?php

class ContratoController extends Controller
{

    public function index()
    {
        $model = $this->model('contrato');
        $contratos = $model->get();

        $this->view('contrato/index', ['contratos' => $contratos]);
    }

    public function create()
    {
        $model = $this->model('imovel');
        $imoveis = $model->get();

        $model = $this->model('cliente');
        $clientes = $model->get();

        $this->view('contrato/create', [
            'imoveis' => $imoveis,
            'clientes' => $clientes
        ]);
    }

    public function store()
    {
        $model = $this->model('contrato');

        $fields = $this->prepareFields($_POST);



        $contratoId = $model->store($this->prepareFields($_POST));


        //gera mensalidades
        $this->geraMensalidades($fields, $contratoId);

        //gera mensalidades
        $this->geraRepasses($fields, $contratoId);


        //erro
        if (!$contratoId) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            die();
        }

        //inseriu e redireciona
        header("Location: " . URL_APP . '/contrato/show/' . $contratoId);
        die();
    }

    public function show($id)
    {

        $model = $this->model('contrato');
        $contrato = $model->find($id);

        $model = $this->model('repasse');
        $repasses = $model->getByContratoId($id);

        $model = $this->model('mensalidade');
        $mensalidades = $model->getByContratoId($id);

        $this->view('contrato/show', [
            'contrato' => $contrato,
            'repasses' => $repasses,
            'mensalidades' => $mensalidades
        ]);
    }

    public function edit($id)
    {
        $model = $this->model('contrato');
        $contrato = $model->find($id);

        $model = $this->model('imovel');
        $imoveis = $model->get();

        $model = $this->model('cliente');
        $clientes = $model->get();

        $this->view('contrato/edit', [
            'contrato' => $contrato,
            'imoveis' => $imoveis,
            'clientes' => $clientes
        ]);
    }

    public function update()
    {
        $model = $this->model('contrato');
        $model->update($this->prepareFields($_POST));

        header("Location: " . URL_APP . '/contrato/index');
        die();
    }

    public function destroy()
    {
        if (isset($_POST['id'])) {

            $model = $this->model('contrato');
            $model->delete(intval($_POST['id']));

            header("Location: " . URL_APP . '/contrato/index');
            die();
        }
    }

    private function prepareFields($post)
    {
        $fields = [
            'dt_inicio' => $this->prepareDate($post['dt_inicio']),
            'dt_fim' =>   $this->prepareDate($post['dt_fim']),

            'tx_administracao' => $this->prepareMoney($post['tx_administracao']),
            'val_aluguel' => $this->prepareMoney($post['val_aluguel']),
            'val_condominio' => $this->prepareMoney($post['val_condominio']),
            'val_iptu' => $this->prepareMoney($post['val_iptu']),

            'cliente_id' => $post['cliente_id'],
            'imovel_id' => $post['imovel_id']
        ];
        if (isset($post['id'])) {
            $fields['id'] = $post['id'];
        }
        return $fields;
    }

    private function prepareMoney($field)
    {
        return  str_replace(",", ".", str_replace(".", "", $field));
    }

    private function prepareDate($field)
    {
        $date = DateTime::createFromFormat('d/m/Y', $field);

        return $date->format('Y-m-d');
    }


    function getQtdMeses($from, $to)
    {
        $month_in_year = 12;
        $date_from = getdate(strtotime($from));
        $date_to = getdate(strtotime($to));
        return ($date_to['year'] - $date_from['year']) * $month_in_year -
            ($month_in_year - $date_to['mon']) +
            ($month_in_year - $date_from['mon']);
    }

    private function geraMensalidades($fields, $contratoId)
    {
        $dataInicio = $fields['dt_inicio'];
        $dataFim = $fields['dt_fim'];

        $qtdParcelas = $this->getQtdMeses($dataInicio, $dataFim);
        $diaInicio = intval(date('d', strtotime($dataInicio)));

        $valorParcela = floatval($fields['val_aluguel']) + floatval($fields['val_iptu']) +  floatval($fields['val_condominio']);

        //se não começar no primeiro dia do mes, calcula parcela proporcional
        $proporcaoPrimeiroMes =  $valorParcela;

        if ($diaInicio != 1) {
            $proporcaoPrimeiroMes = ((30 - $diaInicio) * $valorParcela) / 30;
        }

        $model = $this->model('mensalidade');

        //cria a primeira
        $dataVencimento = date('Y-m-', strtotime("$dataInicio +1 Months")) . '01';
        $model->store([
            'dt_vencimento' => $dataVencimento,
            'val_mensalidade' => $proporcaoPrimeiroMes,
            'contrato_id' =>  $contratoId,
            'is_paga' => 0
        ]);

        //cria as subsequentes
        for ($i = 0; $i < $qtdParcelas; $i++) {
            $dataVencimento = date('Y-m-d', strtotime("$dataVencimento +1 Months"));
            $model->store([
                'dt_vencimento' => $dataVencimento,
                'val_mensalidade' => $valorParcela,
                'contrato_id' =>  $contratoId,
                'is_paga' => 0
            ]);
        }
    }

    private function geraRepasses($fields, $contratoId)
    {
        $dataInicio = $fields['dt_inicio'];
        $dataFim = $fields['dt_fim'];

        $qtdParcelas = $this->getQtdMeses($dataInicio, $dataFim);
        $diaInicio = intval(date('d', strtotime($dataInicio)));


        $model = $this->model('cliente');
        $cliente = $model->find($fields['cliente_id']);
        
        
        $diaRepasseCliente = str_pad($cliente['dia_repasse'], 2, "0", STR_PAD_LEFT);
       

        $valorParcela = floatval($fields['val_aluguel']) + floatval($fields['val_iptu']) -  floatval($fields['tx_administracao']);

        //se não começar no primeiro dia do mes, calcula parcela proporcional
        $proporcaoPrimeiroMes =  $valorParcela;

        if ($diaInicio != 1) {
            $proporcaoPrimeiroMes = ((30 - $diaInicio) * $valorParcela) / 30;
        }

        $model = $this->model('repasse');

        //cria a primeira
        $dataVencimento = date('Y-m-', strtotime("$dataInicio +1 Months")) . $diaRepasseCliente;
        $model->store([
            'dt_repasse' => $dataVencimento,
            'val_repasse' => $proporcaoPrimeiroMes,
            'contrato_id' =>  $contratoId,
            'is_repassada' => 0
        ]);

        //cria as subsequentes
        for ($i = 0; $i < $qtdParcelas; $i++) {
            $dataVencimento = date('Y-m-d', strtotime("$dataVencimento +1 Months"));
            $model->store([
                'dt_repasse' => $dataVencimento,
                'val_repasse' => $valorParcela,
                'contrato_id' =>  $contratoId,
                'is_repassada' => 0
            ]);
        }
    }
}
