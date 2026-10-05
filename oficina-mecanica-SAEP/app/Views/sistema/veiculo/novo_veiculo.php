<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Veículo</title>
    </head>
    <body>
        <h1>Novo Veículo</h1>
        <form action="<?= base_url('veiculo/inserir') ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" placeholder="Nome..." required>

            <br><br>

            <label>Cliente:</label><br>
            <select id="cliente" name="cliente" required>
                <option value="">Selecione um cliente</option>
                <?php foreach($cliente as $cli): ?>
                    <option value="<?= $cli['CLI_ID'] ?>"><?= $cli['CLI_NOME'] ?></option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <label>Data de Lançamento:</label><br>
            <input type="date" id="data_lancamento" name="data_lancamento" required>

            <br><br>

            <input type="submit" id="cadastrar_veiculo" name="cadastrar_veiculo" value="Cadastrar">
        </form>
        <br>
        <a href="<?= base_url('veiculo') ?>"><button>Voltar</button></a>
    </body>
</html>