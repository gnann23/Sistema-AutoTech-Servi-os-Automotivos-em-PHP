<?php


//Função para formatar valores monetários no padrão R$ XX,XX
function formatarMoeda($valor) {
    return 'R$ ' . number_format($valor, 2, ',', '.');
}

echo "========================================\n";
echo "      AUTOTECH SERVIÇOS AUTOMOTIVOS     \n";
echo "========================================\n\n";

echo formatarMoeda("");
$numOrcamento = rand(1000, 9999);
$dataAtual = date('d/m/Y H:i');

//ENTRADA DE DADOS ---

//Dados do Cliente
echo "--- Dados do Cliente ---\n";
$nomeCliente = readline("Nome do cliente: ");
$telefoneCliente = readline("Telefone de contato: ");

//Dados do Veículo
echo "\n--- Dados do Veículo ---\n";
$modeloVeiculo = readline("Modelo: ");
$marcaVeiculo = readline("Marca: ");
$anoVeiculo = (int) readline("Ano: ");
$placaVeiculo = readline("Placa: ");
$kmVeiculo = (float) readline("Quilometragem atual: ");

//Serviço
echo "\n--- Detalhes do Serviço ---\n";
$descricaoServico = readline("Descrição do serviço: ");
$vlrHoraMaoObra = (float) readline("Valor da mão de obra por hora (R\)): ");
$qtdHorasServico = (int) readline("Quantidade de horas previstas: ");

//Peças
echo "\n--- Peças ---\n";
$nomePeca = readline("Nome da peça: ");
$vlrUnitarioPeca = (float) readline("Valor unitário da peça (R\)): ");
$qtdPecas = (int) readline("Quantidade de peças: ");

//Materiais Adicionais
echo "\n--- Materiais Adicionais ---\n";
$vlrMateriaisAdicionais = (float) readline("Estimativa para materiais adicionais (R\)): ");

//PROCESSAMENTO (CÁLCULOS - RF04, RF05, RF07) ---
$totalMaoObra = $vlrHoraMaoObra * $qtdHorasServico;
$totalPecas = $vlrUnitarioPeca * $qtdPecas;
$vlrTotalOrcamento = $totalMaoObra + $totalPecas + $vlrMateriaisAdicionais;
$vlrParcela3x = $vlrTotalOrcamento / 3;

//SAÍDA DE DADOS 
echo "\n";
echo "====================================================================\n";
echo "               AUTOTECH - COMPROVANTE DE ORÇAMENTO                  \n";
echo "====================================================================\n";
echo "Orçamento Nº : {$numOrcamento}\n";
echo "Data/Hora    : {$dataAtual}\n";
echo "--------------------------------------------------------------------\n";
echo "CLIENTE\n";
echo "Nome     : {$nomeCliente}\n";
echo "Telefone : {$telefoneCliente}\n";
echo "--------------------------------------------------------------------\n";
echo "VEÍCULO\n";
echo "Modelo / Marca : {\(modeloVeiculo} / {\)marcaVeiculo}\n";
echo "Ano / Placa    : {\(anoVeiculo} | Placa: {\)placaVeiculo}\n";
echo "Quilometragem  : " . number_format($kmVeiculo, 0, ',', '.') . " km\n";
echo "--------------------------------------------------------------------\n";
echo "DETALHAMENTO DO SERVIÇO\n";
echo "Descrição : {$descricaoServico}\n";
echo "Mão de Obra ({$qtdHorasServico}h x " . formatarMoeda($vlrHoraMaoObra) . ") : " . formatarMoeda($totalMaoObra) . "\n";
echo "Peça ({$qtdPecas}x {$nomePeca})          : " . formatarMoeda($totalPecas) . "\n";
echo "Materiais Adicionais                  : " . formatarMoeda($vlrMateriaisAdicionais) . "\n";
echo "--------------------------------------------------------------------\n";
echo "RESUMO FINANCEIRO\n";
echo "VALOR TOTAL ESTIMADO : " . formatarMoeda($vlrTotalOrcamento) . "\n";
echo "OPÇÃO DE PARCELAMENTO: 3x de " . formatarMoeda($vlrParcela3x) . "\n";
echo "====================================================================\n";
echo "            Orçamento válido por 7 dias úteis.                      \n";
echo "====================================================================\n";