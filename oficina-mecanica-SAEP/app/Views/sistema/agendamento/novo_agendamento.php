<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Novo Agendamento</title>
    </head>
    <body>
        <h1>Novo Agendamento</h1>
        <form action="<?= base_url('agendamento/inserir') ?>" method="POST">
            <label>Data e Hora:</label><br>
            <input type="datetime-local" id="data_hora" name="data_hora" required>

            <br><br>

            <label>Motivo:</label><br>
            <input type="text" id="motivo" name="motivo" placeholder="Motivo..." required>

            <br><br>

            <label>Status:</label><br>
            <select id="status" name="status" required>
                <option value="">Selecione um status</option>
                <option value="Pendente">Pendente</option>
                <option value="Confirmado">Agendado</option>
                <option value="Cancelado">Cancelado</option>
            </select>

            <br><br>
            
            <label>Veículo:</label><br>
            <select id="veiculo" name="veiculo" required>
                <option value="">Selecione um veículo</option>
                <?php foreach($veiculo as $vei): ?>
                    <option value="<?= $vei['VEI_ID'] ?>"><?= $vei['VEI_NOME'] ?></option>
                <?php endforeach; ?>
            </select>
            
            <br><br>
            <label>Cliente:</label><br>
            <select id="cliente" name="cliente" required>
                <option value="">Selecione um cliente</option>
                <?php foreach($cliente as $cli): ?>
                    <option value="<?= $cli['CLI_ID'] ?>"><?= $cli['CLI_NOME'] ?></option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <label>Data de Nascimento:</label><br>
            <input type="date" id="data_nascimento" name="data_nascimento" required>

            <br><br>

            <input type="submit" id="cadastrar_agendamento" name="cadastrar_agendamento" value="Cadastrar">
        </form>
        <br>
        <a href="<?= base_url('agendamento') ?>"><button>Voltar</button></a>
    </body>
</html>