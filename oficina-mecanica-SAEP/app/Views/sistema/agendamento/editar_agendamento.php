<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Editar Agendamento</title>
    </head>
    <body>
        <h1>Editar Agendamento</h1>

        <form action="<?= base_url('agendamento/atualizar/'.$agendamento['AGE_ID']) ?>" method="POST">
            <label>Data e Hora:</label><br>
            <input type="datetime-local" id="data_hora" name="data_hora" value="<?= $agendamento['AGE_DATA_HORA'] ?>" required>
            <br><br>

            <label>Motivo:</label><br>
            <input type="text" id="motivo" name="motivo" value="<?= $agendamento['AGE_MOTIVO'] ?>" required>
            <br><br>

            <label>Status:</label><br>
            <select id="status" name="status" required>
                <option value="">Selecione um status</option>
                <option value="Pendente" <?= ($agendamento['AGE_STATUS'] == 'Pendente') ? 'selected' : '' ?>>Pendente</option>
                <option value="Confirmado" <?= ($agendamento['AGE_STATUS'] == 'Agendado') ? 'selected' : '' ?>>Agendado</option>
                <option value="Cancelado" <?= ($agendamento['AGE_STATUS'] == 'Cancelado') ? 'selected' : '' ?>>Cancelado</option>
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
            
            <input type="submit" id="editar_agendamento" name="editar_agendamento" value="Salvar Alterações">
        </form>

        <br>
        <a href="<?= base_url('agendamento') ?>"><button>Voltar</button></a>
    </body>
</html>