## Sobre Projeto-Monaco

É um projeto teste para a empresa Prodigious, no mesmo foi utilizado uma dashboard já pronta.

## Como executar o projeto?

- Baixe e instale o [composer](https://getcomposer.org/).

- Baixe e instale o [xampp](https://www.apachefriends.org/pt_br/index.html).  
Inicialize o Xampp e depois Apache e MySQL.

- Importe a base que está na pasta BD no repositório.
- Você também pode criar as tabelas diretamente pelo CMD (Prompt de Comando).
	- Primeiro é necessário que crie o banco de dados com o nome "monaco" (SEM ASPAS).
	- Entre no diretório em que o sistema está pelo CMD (Prompt de Comando) e colocar comando <code>php artisan migrate</code>.
	- Antes de executar o projeto necessitamos gerar uma nova key para isso executamos <code>php artisan key:generate</code>.

- Ainda no diretório em que o sistema está pelo CMD (Prompt de Comando).  
    Coloque o comando <code>php artisan serve</code> e aperte enter.
    
- Entre no navegador da sua escolha e coloque <code>localhost:8000</code>

## Tecnologias utilizadas

Abaixo estão as tecnologias utilizadas e a sua documentação: 

- [Php](http://php.net/docs.php)
- [Laravel](https://laravel.com/docs/5.7)
- [MySQL](https://dev.mysql.com/doc/)
- [Bootstrap](https://getbootstrap.com/docs/4.1/getting-started/introduction/)

## Criador

Matheus Delgado Vieira