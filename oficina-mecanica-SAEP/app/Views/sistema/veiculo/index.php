<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Lista de Veículos</title>
    </head>
    <body>
        <h1>Lista de Veículos</h1>

        <form method="POST" action="<?= base_url('veiculo') ?>">
            <input type="search" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
            <input type="submit" id="botao_pesquisar" name="botao_pesquisar" value="Filtrar">
        </form>

        <br>

        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Data de Lançamento</th>
                <th>Cliente</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>

            <?php foreach($veiculo as $vei): ?>
                <tr>
                    <td><?= $vei['VEI_NOME'] ?></td>
                    <td><?= $vei['VEI_DATA_LANCAMENTO'] ?></td>
                    <td><?= $vei['CLI_NOME'] ?></td>
                    <td><a href="<?= base_url('veiculo/editar/'.$vei['VEI_ID']) ?>">Editar</a></td>
                    <td><a href="<?= base_url('veiculo/excluir/'.$vei['VEI_ID']) ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <a href="<?= base_url('veiculo/novo') ?>"><button>Cadastrar Veículo</button></a>
        <br><br>
        <a href="<?= base_url('inicio') ?>"><button>Voltar</button></a>
    </body>
</html>