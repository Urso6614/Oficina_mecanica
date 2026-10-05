<?php
namespace App\Models;
use CodeIgniter\Model;

// Model = representa a tabela no banco
class VeiculoModel extends Model
{
    protected $table = 'VEICULO'; // nome da tabela
    protected $primaryKey = 'VEI_ID'; // chave primária

    // Campos permitidos para INSERT/UPDATE
    protected $allowedFields = [
        // colunas na tabela VEICULO do banco
        'VEI_NOME',
        'VEI_DATA_LANCAMENTO',
        'FK_CLI_ID' // chave estrangeira para CLIENTE
    ];
}