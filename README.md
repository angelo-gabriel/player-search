# player-search

Código feito para aprendizado de PHP e SQL. Para utilizar, é necessário ter o banco de dados rodando.    
Comando para copiar o arquivo CSV para o PostgreSQL(exemplo):
```
COPY player_data(name, nationality, club, goals, assists)
FROM 'C:\caminho-para-o-csv\'
DELIMITER ','
CSV HEADER;
```
O projeto utiliza PDO para conexão com o banco de dados, e realiza operação simples de consulta  
por meio de um formulário.  
Utilizado PHP puro e CSS para estilização.
