<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Veículo</title>
    </head>
    <body>
        <h1>Editar Veículo</h1>

        <form action="<?= base_url('veiculo/atualizar/'.$veiculo['VEI_ID']) ?>" method="POST">
            <label>Nome:</label><br>
            <input type="text" id="nome" name="nome" value="<?= $veiculo['VEI_NOME'] ?>" required>
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
            <input type="date" id="data_lancamento" name="data_lancamento" value="<?= $veiculo['VEI_DATA_LANCAMENTO'] ?>" required>
            <br><br>
            <input type="submit" id="editar_veiculo" name="editar_veiculo" value="Salvar Alterações">
        </form>

        <br>
        <a href="<?= base_url('veiculo') ?>"><button>Voltar</button></a>
    </body>
</html>