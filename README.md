# conveniatest

Teste prático WEB DEV com PHP & Laravel5

Instruções para iniciar o projeto:
1 Setar banco de dados (teste feito com: Mariadb)
  1.1 Criar externamente um banco de dados (o meu foi criado como 'convenia)
  1.2 Definir as configurações em Config > database.php !IMPORTANTE definições em .env não irão funcionar
  1.3 As minhas definições estão como: driver -> Mysql, database -> convenia, host -> 127.0.0.1, user -> root, senha -> (sem vazia)
  
2 Migration & Seeder
  2.1 Rodar os seguintes comandos no terminal:
    2.1.1 php artisan migrate //cria as tabelas
    2.1.2 php artisan db:seed --class=SellersTableSeeder //dados de teste dos vendedores
    2.1.3 php artisan db:seed --class=SalesTableSeeder   //dados de teste das vendas
  2.2 A ordem é necessária pois os dados das vendas são linkados ao dos vendedores, uma espécie de simulação à foreign keys, não as utilizei para deixar o projeto simplificado.
  
Agora que todos os dados iniciais já foram definidos, vamos ao modo de funcionamento da api

  5 Views, são elas Frame, Home, List, Sale, Details
      Frame é a base, onde está a estrutura base da aplicação, os estilos globais, links para Bootstrap, Jquery e Ajax (sei que não precisava usar nenhum deles mas eu não resisti)
      Home é a pagina inicial, onde contem 3 links, para a lista de vendedores, lista de vendas e criação de um anúncio de venda
      List é a listagem versátil tanto para as vendas quando aos vendedores, dela pode acessar as outras funções, como excluir um dado (com suporte a session flash), e no caso das vendas, alterar ou ver detalhes de um item.
      Sale é a view responsável por criar a venda, em 3 passos, o primeiro, escolher o vendedor o qual você deseja cadastrar o produto no nome, o segundo, definir as informações básicas do produto, o terceiro, confirmar as informações de taxação (que são criadas a partir do "Model" responsável, e com ajax, passados por JSON para a view a partir do evento Change no campo do preço). Sale também é usada para modificar um anúncio, a fim de reutilizar o código.
      Details faz o que foi proposto inicialmente, mostra na mesma view todos os dados do vendedor, o preço, junto com o valor da taxa, cotação, valor líquido e bruto, um campo de descrição, simulando uma página de produto de um e-commerce, por exemplo.
  
  São 4 controllers, um para cada view (excluindo o Frame), HomeController apenas retorna a view Home, ListController define qual lista deve ser exibida e tem um método delete($type, $id) que apaga qualquer item, independente de Anuncio ou Vendedor, DetailsController contem o método load() que carrega sua view correspondente passando por variáveis os itens da Venda, de seu vendedor e a cotação completa. Por fim, SaleController contém os métodos sale() que retona a view Sale passando um array de vendedores para selecionar e uma variavel $sale, que será usada no caso da view ser chamada para um upload, um método que retorna um array de comissão em JSON, usado para a conversão em tempo real (não é o método mais eficiente, foi apenas para fazer uma demonstração da api rest mesmo), e por último, o método save, tanto para updates quando para novos registros.
  
  Models, apenas Sales e Sellers, sem nenhuma modificação, apenas a criação de uma pasta para models, porque não gosto de deixar meus models jogados por aí haha
  
  Diretório Logic é onde costumo colocar o que seriam meus Models, porém que não estão ligados com nenhuma tabela, nenhum join ou nada do tipo, em outras palavras, são as regras de negócio. Nesse diretório tem um arquivo chamado CalcCommission, essa é a classe responsável por devolver para os controllers a taxa, a taxa em porcentagem, preço líquido e bruto produto, formatados ou não, e um array com todos esses items. A taxa '8.5' fica salva em um arquivo config (apenas para simulação também).
  
  
  Comecei o projeto ontem (09/06/2017), por volta de meia noite, fui até umas 4:30h, depois disso, não tive muito tempo livre, diria que em mais umas 2 horas eu terminei, então, realizei o projeto em um tempo total de 6h30 (e mais de uma hora para escrever esse readme haha), enfim, espero que goste.
