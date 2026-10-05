<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\VeiculoModel;
use App\Models\ClienteModel;

// Vincula o Veículo com seu respectivo Cliente (FK_CLI_ID)
class VeiculoController extends BaseController
{
    // Exibe a listagem de veículos
    public function index()
    {
        // Instancia o Model de veículos
        $model = new VeiculoModel();

        // Verifica se o formulário de pesquisa foi enviado
        if ($this->request->getPost('botao_pesquisar')) {

            // Recupera o texto digitado pelo usuário
            $pesquisar = $this->request->getPost('pesquisar');

            // Busca os veículos juntamente com o nome do cliente
            // que é o proprietário de cada veículo
            $dados['veiculo'] = $model
                ->select('VEICULO.*, CLIENTE.CLI_NOME')

                // Relaciona VEICULOS com CLIENTES pela chave estrangeira
                ->join(
                    'CLIENTE',
                    'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID'
                )

                // Agrupa as condições da pesquisa
                ->groupStart()

                    // Pesquisa pela Nome
                    ->like('VEICULO.VEI_NOME', $pesquisar)

                    // Pesquisa pela data de nascimento
                    ->orLike('VEICULO.VEI_DATA_LANCAMENTO', $pesquisar)

                    // Também permite pesquisar pelo nome do cliente
                    ->orLike('CLIENTE.CLI_NOME', $pesquisar)

                ->groupEnd()

                // Executa a consulta
                ->findAll();
        }
        else {

            // Caso não exista pesquisa, busca todos os veículos
            // juntamente com o nome dos respectivos clientes
            $dados['veiculo'] = $model
                ->select('VEICULO.*, CLIENTE.CLI_NOME')
                ->join(
                    'CLIENTE',
                    'CLIENTE.CLI_ID = VEICULO.FK_CLI_ID'
                )
                ->findAll();
        }

        // Carrega a View de veículos
        return view('sistema/veiculo/index', $dados);
    }


    // Exibe o formulário para cadastrar um novo veículo
    public function novo()
    {
        // Instancia o Model de clientes
        $clienteModel = new ClienteModel();

        // Busca todos os clientes cadastrados
        // Esses dados serão utilizados em um campo SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega o formulário de cadastro do veículo
        return view('sistema/veiculo/novo_veiculo', $dados);
    }


    // Insere um novo veículo
    public function inserir()
    {
        // Instancia o Model de veículos
        $model = new VeiculoModel();

        // Recupera os dados enviados pelo formulário
        $dados = [
            'VEI_NOME' => $this->request->getPost('nome'),
            'VEI_DATA_LANCAMENTO' => $this->request->getPost('data_lancamento'),
            

            // Guarda o ID do cliente escolhido no formulário
            // como chave estrangeira do veículo
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Insere o veículo no banco
        $model->insert($dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo cadastrado com sucesso!');
    }


    // Exibe o formulário de edição
    public function editar($id)
    {
        // Instancia o Model de veículos
        $veiculoModel = new VeiculoModel();

        // Instancia o Model de clientes
        $clienteModel = new ClienteModel();

        // Busca o veículo que será editado
        $dados['veiculo'] = $veiculoModel->find($id);

        // Busca todos os clientes para preencher o SELECT
        $dados['cliente'] = $clienteModel->findAll();

        // Carrega a View de edição
        return view('sistema/veiculo/editar_veiculo', $dados);
    }


    // Atualiza um veículo
    public function atualizar($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Recupera os novos dados do formulário
        $dados = [
            'VEI_NOME' => $this->request->getPost('nome'),
            'VEI_DATA_LANCAMENTO' => $this->request->getPost('data_lancamento'),
            'FK_CLI_ID' => $this->request->getPost('cliente')
        ];

        // Atualiza o veículo pelo ID
        $model->update($id, $dados);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo atualizado com sucesso!');
    }


    // Exclui um veículo
    public function excluir($id)
    {
        // Instancia o Model
        $model = new VeiculoModel();

        // Exclui o veículo pelo ID
        $model->delete($id);

        // Redireciona para a listagem
        return redirect()
            ->to(base_url('veiculo'))
            ->with('success', 'Veículo excluído com sucesso!');
    }
}