<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de Churrasco</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
.dark-row {
  background-color: #f8f9fa; /* Cor de fundo para linhas escuras */
}
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Calculadora de Churrasco</h2>

    <div class="mx-auto">
      <div class="mb-3">
        <label for="categoryFilter">Filtrar por Categoria:</label>
        <select id="categoryFilter" class="form-control" onchange="filterTable()">
          <option value="all">Todas</option>
          <option value="Comida">Comida</option>
          <option value="Bebida">Bebida</option>
          <option value="Adicionais">Adicionais</option>
        </select>
      </div>

      <?php
        $custo_total = 0;
        // Obter dados do formulário
        $num_homem = $_POST['num_homem'];
        $num_mulher = $_POST['num_mulher'];
        $num_crianca = $_POST['num_crianca'];

        // Calcular a quantidade de carne necessária
        $carne_por_pessoa = 400; // em gramas
        $linguica_por_pessoa = 200; // em gramas
        $pao_por_pessoa = 0.3; // em unidades
        $cerveja_por_pessoa = 3; // em latas
        $refrigerante_por_pessoa = 0.5; // em litros

        // Adicionar cálculos para novos itens
        $farofa_por_pessoa = 100; // em gramas
        $queijo_coalho_por_pessoa = 150; // em gramas
        $tomate_por_pessoa = 0.35; // em unidades
        $pimentao_por_pessoa = 0.1; // em unidades
        $cebola_por_pessoa = 0.26; // em unidades
        $azeite_por_pessoa = 20; // em ml
        $vinagre_por_pessoa = 10; // em ml

        $farofa_total = ($num_homem + $num_mulher + $num_crianca) * $farofa_por_pessoa;
        $queijo_coalho_total = ($num_homem + $num_mulher + $num_crianca) * $queijo_coalho_por_pessoa;
        $tomate_total = ($num_homem + $num_mulher + $num_crianca) * $tomate_por_pessoa;
        $pimentao_total = ($num_homem + $num_mulher + $num_crianca) * $pimentao_por_pessoa;
        $cebola_total = ($num_homem + $num_mulher + $num_crianca) * $cebola_por_pessoa;
        $azeite_total = ($num_homem + $num_mulher + $num_crianca) * $azeite_por_pessoa;
        $vinagre_total = ($num_homem + $num_mulher + $num_crianca) * $vinagre_por_pessoa;
        $carne_total = ($num_homem * $carne_por_pessoa) + ($num_mulher * $carne_por_pessoa * 0.75) + ($num_crianca * $carne_por_pessoa * 0.5);
        $linguica_total = ($num_homem * $linguica_por_pessoa) + ($num_mulher * $linguica_por_pessoa * 0.5) + ($num_crianca * $linguica_por_pessoa * 0.5);
        $pao_total = ($num_homem * $pao_por_pessoa) + ($num_mulher * $pao_por_pessoa * 0.75) + ($num_crianca * $pao_por_pessoa * 0.5);
        $cerveja_total = ($num_homem * $cerveja_por_pessoa) + ($num_mulher * $cerveja_por_pessoa * 0.5);
        $refrigerante_total = ($num_homem * $refrigerante_por_pessoa * 0.75) + ($num_mulher * $refrigerante_por_pessoa * 0.75) + ($num_crianca * $refrigerante_por_pessoa);

        // Adicionando preços
        $preco_carne_por_kg = 80; // preço estimado por kg
        $preco_linguica_por_kg = 20; // preço estimado por kg
        $preco_pao_por_unidade = 1; // preço estimado por unidade
        $preco_cerveja_por_lata = 3; // preço estimado por lata
        $preco_refrigerante_por_litro = 6; // preço estimado por litro

        // Adicionando preços para novos itens
        $preco_farofa_por_kg = 10; // preço estimado por kg
        $preco_queijo_coalho_por_kg = 25; // preço estimado por kg
        $preco_tomate_por_unidade = 1.5; // preço estimado por unidade
        $preco_pimentao_por_unidade = 2; // preço estimado por unidade
        $preco_cebola_por_unidade = 1; // preço estimado por unidade
        $preco_azeite_por_ml = 0.1; // preço estimado por ml
        $preco_vinagre_por_ml = 0.05; // preço estimado por ml

        // Cálculo do carvão
        $carvao_por_pessoa = 2; // em kg
        $preco_carvao_por_kg = 5; // preço estimado por kg
        $carvao_total = ($num_homem + $num_mulher + $num_crianca) * $carvao_por_pessoa;
        $custo_carvao = $carvao_total * $preco_carvao_por_kg;

        // Cálculo do saco de gelo
        $saco_de_gelo_por_saco = 10; // em kg
        $preco_saco_de_gelo = 20; // preço por saco de gelo
        $quantidade_sacos_de_gelo = 2;
        $custo_saco_de_gelo = $preco_saco_de_gelo * $quantidade_sacos_de_gelo;

        // Adicionando os custos de comida, bebida, adicionais e outros, carvão e saco de gelo ao custo total
        $custo_total += ($carne_total/1000) * $preco_carne_por_kg + ($linguica_total/1000) * $preco_linguica_por_kg + $pao_total * $preco_pao_por_unidade
            + $cerveja_total * $preco_cerveja_por_lata + $refrigerante_total * $preco_refrigerante_por_litro
            + ($farofa_total/1000) * $preco_farofa_por_kg + ($queijo_coalho_total/1000) * $preco_queijo_coalho_por_kg + $tomate_total * $preco_tomate_por_unidade
            + $pimentao_total * $preco_pimentao_por_unidade + $cebola_total * $preco_cebola_por_unidade
            + $azeite_total * $preco_azeite_por_ml + $vinagre_total * $preco_vinagre_por_ml
            + $custo_carvao + $custo_saco_de_gelo;

        // Exibir resultados usando o Bootstrap com linhas alternadas
        echo '<div class="table-responsive">';
        echo '<table id="churrascoTable" class="table table-bordered mt-4">';
        echo '<thead class="thead-dark"><tr><th class="text-center">Categoria</th><th class="text-center">Item</th><th class="text-center">Quantidade por pessoa</th><th class="text-center">Homens</th><th class="text-center">Mulheres</th><th class="text-center">Crianças</th><th class="text-center">Total</th></tr></thead>';
        echo '<tbody>'; 

          // Comida
          echoCategoryRow('Comida', 'Carne', $carne_por_pessoa . ' g', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), round($carne_total / 1000) . ' kg');
          echoCategoryRow('Comida', 'Linguiça', $linguica_por_pessoa . ' g', $num_homem, round($num_mulher * 0.5), round($num_crianca * 0.5), round($linguica_total / 1000) . ' kg');
          // Adicionais
          echoCategoryRow('Adicionais', 'Azeite', $azeite_por_pessoa . ' ml', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $azeite_total . ' ml');
          echoCategoryRow('Adicionais', 'Farofa', $farofa_por_pessoa . ' g', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), round($farofa_total / 1000) . ' kg');
          echoCategoryRow('Adicionais', 'Vinagre', $vinagre_por_pessoa . ' ml', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $vinagre_total . ' ml');
          // Bebida
          echoCategoryRow('Bebida', 'Cerveja', $cerveja_por_pessoa . ' latas', $num_homem, round($num_mulher * 0.5), 0, $cerveja_total . ' latas');
          echoCategoryRow('Bebida', 'Refrigerante', $refrigerante_por_pessoa . ' litros', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $refrigerante_total . ' litros');
          // Mais itens de Comida
          echoCategoryRow('Comida', 'Queijo Coalho', $queijo_coalho_por_pessoa . ' g', $num_homem, round($num_mulher * 0.5), round($num_crianca * 0.5), round($queijo_coalho_total / 1000) . ' kg');
          echoCategoryRow('Adicionais', 'Tomate', $tomate_por_pessoa . ' unidades', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $tomate_total . ' unidades');
          echoCategoryRow('Adicionais', 'Pimentão', $pimentao_por_pessoa . ' unidades', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $pimentao_total . ' unidades');
          echoCategoryRow('Adicionais', 'Cebola', $cebola_por_pessoa . ' unidades', $num_homem, round($num_mulher * 0.75), round($num_crianca * 0.5), $cebola_total . ' unidades');
    
          // Exibindo linha com o custo do carvão
          echoCategoryRow('Adicionais', 'Carvão', $carvao_por_pessoa . ' kg', $num_homem, round($num_mulher * 0.5), round($num_crianca * 0.5), 'R$ ' . number_format($custo_carvao, 2));

          // Exibindo linha com o custo do saco de gelo
          echoCategoryRow('Outros', 'Saco de Gelo', $saco_de_gelo_por_saco . ' kg', '', '', '', 'R$ ' . number_format($custo_saco_de_gelo, 2));

          // Exibindo a linha com o custo total geral
            echo '<tr class="dark-row"><td colspan="6" class="text-right"><strong>Total Geral</strong></td><td>R$ ' . number_format($custo_total, 2) . '</td></tr>';

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
          function echoCategoryRow($category, $item, $quantidadePorPessoa, $homens, $mulheres, $criancas, $total) {
            static $count = 0;
            $class = ($count % 2 == 0) ? 'dark-row' : '';
            echo "<tr class='$class'><td>$category</td><td>$item</td><td>$quantidadePorPessoa</td><td>$homens</td><td>$mulheres</td><td>$criancas</td><td>$total</td></tr>";
            $count++;
          }
          ?>
        </div>
      </div>
      <script>
    function filterTable() {
      var categoryFilter = document.getElementById('categoryFilter').value;
      var table = document.getElementById('churrascoTable');
      var rows = table.getElementsByTagName('tr');
      
      for (var i = 1; i < rows.length; i++) { // Começando de 1 para pular a linha de cabeçalho
        var categoryCell = rows[i].getElementsByTagName('td')[0];
        var displayStyle = (categoryFilter === 'all' || categoryCell.textContent === categoryFilter) ? '' : 'none';
        rows[i].style.display = displayStyle;
      }
    }
  </script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>