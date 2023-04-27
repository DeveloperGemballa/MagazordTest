<<<<<<< HEAD
=======

>>>>>>> 469f57f8c2a5aa33a548591f868f766da0a0f7e6
# Magazord BackEnd TEST

Este projeto tem como base ser uma avaliação de desempenho e de habilidades com o backend para entrar na equipe magazord e contribuir com a empresa! O projeto é um sistema simples que usa o gerenciador de dependências "Composer" e o padrão "MVC" (Model, View & Controller). O sistema tem 2 CRUDs sendo eles: o CRUD de contatos e o de pessoas que se relacionam tendo assim um banco de dados relacional. O projeto dá opções de salvar, editar e excluir cadastros tanto de pessoas como de contatos.

## Requisitos para uso

- PHP 7.4 ou superior
- Composer
- MySQL

OBS: e github para baixar o projeto


### Configuração do ambiente

- Abra o CMD e acesse a pasta onde deseja instalar o projeto
- Clone o repositório: git clone https://github.com/DeveloperGemballa/MagazordTest.git
- Entre no diretório do projeto: cd MagazordTest
- Instale as dependências: composer install
- Crie o arquivo .env a partir do exemplo: cp .env.example .env
- Configure as variáveis de ambiente no arquivo .env:   DB_DATABASE=magazord
                                                        DB_USERNAME=root
                                                        DB_PASSWORD=
- Gere uma nova chave para a aplicação: php artisan key:generate
- Rode as migrações: php artisan migrate
- Inicie o servidor de desenvolvimento: php artisan serve


## Uso

O sistema tem o cadastro disponível para dois itens, sendo eles os contatos e as pessoas, onde uma pessoa pode ter vários contatos. O sistema faz a verificação de dados como CPF e retorna a validação gerando uma mensagem de erro ou de sucesso dependendo do conteúdo, ao salvar ele o leva para a página inicial de seu respectivo cadastro para visualizar o cadastro feito, sendo que também há uma caixa de pesquisa que procura por itens semelhantes ao que foi digitado em cada um dos cadastros. Há a opção de excluir ou editar um cadastro já existente que também fazem validação para o conteúdo informado.

# Tecnologias utilizadas

- Laravel
- googleAPIS
- MySQL
- Bootstrap
- JQuery

# Autor

- Matheus Gemballa Gullini
- contato: [+55(47)98830-2840] -> também Whatsapp
- e-mail: matheusgemballagullini07@gmail.com

## Licença

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

### Erros encontrados por: Matheus Gemballa Gullini(autor)

- A arquitetura MVC foi interpretada errada e foi necessárias alterações para corrigir.
