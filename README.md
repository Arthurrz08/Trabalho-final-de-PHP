# Projeto Filmes

Este é um sistema simples para gerenciar uma lista de filmes. Você pode adicionar, editar, excluir e filtrar filmes por gênero, além de ver a média das notas dadas aos filmes.

---

## O que ele faz?

- Mostra todos os filmes cadastrados.
- Permite cadastrar novos filmes com nome, ano, gênero e nota (de 1 a 5).
- Permite editar as informações de um filme.
- Permite excluir filmes.
- Filtra filmes pelo gênero selecionado.
- Mostra a média das notas dos filmes cadastrados.

---

## Como usar?

1. **Preparar o banco de dados**

   - Crie um banco chamado `projeto_filmes`.
   - Execute o script SQL que está na pasta `sql/database.sql` para criar a tabela de filmes.

2. **Rodar o projeto**

   - Coloque os arquivos no seu servidor local (como XAMPP, WAMP, etc).
   - Abra o arquivo `index.php` no navegador.
   - Use o formulário para adicionar filmes.
   - Use os botões para editar ou excluir filmes.
   - Use o filtro para escolher filmes de um gênero específico.

---

## Tecnologias usadas

- PHP para a lógica do sistema.
- Banco de dados PostgreSQL para armazenar os dados.
- Bootstrap para o visual.
- JavaScript para o filtro de filmes.

---

## Estrutura básica do projeto

- `index.php` — página principal com a lista e formulário de cadastro.
- `inserir.php` — salva um filme novo no banco.
- `editar.php` — permite editar um filme.
- `atualizar.php` — atualiza o filme no banco.
- `excluir.php` — remove um filme.
- `classes/` — arquivos PHP que cuidam da conexão e do acesso ao banco.
- `css/style.css` — estilos personalizados.
- `js/script.js` — código para filtrar os filmes na página.
- `sql/database.sql` — script para criar o banco e a tabela.

---

Se tiver dúvidas ou quiser ajudar a melhorar, fique à vontade para mexer no código!
