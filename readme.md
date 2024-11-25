### Objetivo

#### O objetivo do projeto é criar um ambiente propício à manutenção de um portfólio dinâmico e simples.

### **Tecnologias**

#### - PHP
- HTML
- CSS
- MySQL
- JavaScript

### **Estrutura de Pastas**

#### * .htacess -> Responsável por auxiliar nas URLs amigáveis definidas no arquivo de rotas;
* index.php -> Arquivo raiz do projeto;
* controllers -> Diretório com controladores. Arquivos responsáveis por processar dados + operações do server-side;
* models -> Diretório com modelos. Representam espelhos para tabelas do banco de dados relacional;
* router -> Armazena as URLs amigáveis do sistema;
* views -> Aplicam-se à parte visual do projeto, contendo HTML, CSS e JavaScript;
* public -> Arquivos de acesso público, como folhas de estilo;
* core -> arquivos de núcleo, como rotas ou bases para conexões com bancos de dados;
* utils -> utilitários do sistema;

### Instalação

#### * Começar clonando projeto do github: https://github.com/r4mpo/r4mpo-xp.git;

* Configure o .env: Copiar e colar o .env.exemple e preencher seguindo suas configurações de ambiente;
* Apontando para o projeto, deve-se rodar o composer install, para lidar com as bibliotecas do projeto;
