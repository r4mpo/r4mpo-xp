<?php

class Database
{
    protected $table;
    protected $pdo;

    public function __construct()
    {
        $this->pdo = $this->getConnection();
    }

    public function getConnection(): PDO
    {
        try {
            $pdo = new PDO("mysql:dbname=portfolio_db;host=localhost", "root", "");
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function all($conditions = null): mixed
    {
        $data = [];

        try {
            $query = "SELECT * FROM " . $this->table . (!empty($conditions) ? " " . $conditions : "");
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }

        return $data;
    }

    public function prepareDataBaseInitial(): array
    {
        $query = "
        SET SQL_MODE = \"NO_AUTO_VALUE_ON_ZERO\";
        START TRANSACTION;
        SET time_zone = \"+00:00\";
        
        -- Criar a tabela github_tbl
        CREATE TABLE IF NOT EXISTS github_tbl (
          id int(11) NOT NULL AUTO_INCREMENT,  -- Definindo a chave primária e AUTO_INCREMENT na criação
          title varchar(50) NOT NULL,
          logo varchar(200) NOT NULL,
          description text NOT NULL,
          doc varchar(200) NOT NULL,
          host varchar(200) DEFAULT NULL,
          PRIMARY KEY (id)  -- Definindo a chave primária
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        -- Inserir dados na tabela github_tbl
        INSERT INTO github_tbl (title, logo, description, doc, host)
        SELECT 'PEOPLEPRO', 'public/assets/img/github/laravel.png', 'Sistema ERP desenvolvido com Laravel e outras tecnologias', 'public/github/peoplepro.html', NULL
        WHERE NOT EXISTS (SELECT 1 FROM github_tbl WHERE id = 1);
        
        INSERT INTO github_tbl (title, logo, description, doc, host)
        SELECT 'MYJOBS', 'public/assets/img/github/laravel-vue.jpg', 'Projeto de microsserviços com Laravel, Vue.JS e Tailwind', 'public/github/myjobs.html', NULL
        WHERE NOT EXISTS (SELECT 1 FROM github_tbl WHERE id = 2);
        
        -- Criar a tabela profiles_tbl
        CREATE TABLE IF NOT EXISTS profiles_tbl (
          id int(11) NOT NULL AUTO_INCREMENT,  -- Definindo a chave primária e AUTO_INCREMENT na criação
          name varchar(50) NOT NULL,
          username varchar(30) NOT NULL,
          birthday date DEFAULT NULL,
          title varchar(50) NOT NULL,
          main varchar(15) NOT NULL,
          skills text NOT NULL,
          presentation_1 text NOT NULL,
          presentation_2 text DEFAULT NULL,
          phone varchar(30) NOT NULL,
          email varchar(40) NOT NULL,
          city varchar(50) NOT NULL,
          uf varchar(2) NOT NULL,
          PRIMARY KEY (id)  -- Definindo a chave primária
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        -- Inserir dados na tabela profiles_tbl
        INSERT INTO profiles_tbl (name, username, birthday, title, main, skills, presentation_1, presentation_2, phone, email, city, uf)
        SELECT 'Erick Agostinho', '@r4mpo', '2002-08-22', 'Desenvolvedor Web Full Stack & Freelancer', 'PHP', 'PHP, JAVASCRIPT, MYSQL, HTML5, CSS3, LARAVEL, CODEIGNITER, SLIM, CAKE, WORDPRESS, BOOTSTRAP, TAILWIND, VUE.JS, JQUERY', 
        'Experiência em desenvolvimento de software com expertise em PHP, MySQL, JavaScript e WordPress. Competente na criação de websites e soluções backend, utilizando ferramentas como PHPStorm, Docker e Git. Experiência em customização de interfaces (HTML5, CSS3, Bootstrap, Tailwind), criação de sistemas e APIs (Laravel) e administração de bancos de dados. Atuou em ambientes remotos e presenciais, com habilidades em otimização de SPAs, e programação de plugins. Experiência adicional em tarefas administrativas e atendimento ao cliente, com forte compromisso com a melhoria contínua e trabalho em equipe.', 
        'Olá! Sou Erick Agostinho, desenvolvedor PHP júnior com 2 anos de experiência em criação de soluções web robustas e eficientes. Tenho sólida experiência com PHP, MySQL e frameworks como Laravel, além de habilidades em HTML, CSS e JavaScript. Procuro novas oportunidades para aplicar minhas competências e enfrentar novos desafios. Vamos conversar about como posso contribuir para seu projeto!',
        '+55 (16) 99342-5009', 'erick1souza1ago04@gmail.com', 'Ribeirão Preto', 'SP'
        WHERE NOT EXISTS (SELECT 1 FROM profiles_tbl WHERE id = 1);
        
        -- Criar a tabela skills_tbl
        CREATE TABLE IF NOT EXISTS skills_tbl (
          id int(11) NOT NULL AUTO_INCREMENT,  -- Definindo a chave primária e AUTO_INCREMENT na criação
          name varchar(50) NOT NULL,
          grade int(3) NOT NULL,
          PRIMARY KEY (id)  -- Definindo a chave primária
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        -- Inserir dados na tabela skills_tbl
        INSERT INTO skills_tbl (name, grade)
        SELECT 'HTML', 100 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 1);
        
        INSERT INTO skills_tbl (name, grade)
        SELECT 'CSS', 60 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 2);
        
        INSERT INTO skills_tbl (name, grade)
        SELECT 'JAVASCRIPT', 80 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 3);
        
        INSERT INTO skills_tbl (name, grade)
        SELECT 'PHP', 100 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 4);
        
        INSERT INTO skills_tbl (name, grade)
        SELECT 'WordPress/CMS', 70 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 5);
        
        INSERT INTO skills_tbl (name, grade)
        SELECT 'MySQL', 87 WHERE NOT EXISTS (SELECT 1 FROM skills_tbl WHERE id = 6);
        
        -- Criar a tabela social_medias_tbl
        CREATE TABLE IF NOT EXISTS social_medias_tbl (
          id int(11) NOT NULL AUTO_INCREMENT,  -- Definindo a chave primária e AUTO_INCREMENT na criação
          url varchar(60) NOT NULL,
          class varchar(15) NOT NULL,
          icon varchar(15) NOT NULL,
          PRIMARY KEY (id)  -- Definindo a chave primária
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        -- Inserir dados na tabela social_medias_tbl
        INSERT INTO social_medias_tbl (url, class, icon)
        SELECT 'https://www.linkedin.com/in/erick-agostinho-684563227/', 'linkedin', 'bi bi-linkedin'
        WHERE NOT EXISTS (SELECT 1 FROM social_medias_tbl WHERE id = 1);
        
        INSERT INTO social_medias_tbl (url, class, icon)
        SELECT 'https://www.github.com/r4mpo/', 'github', 'bi bi-github'
        WHERE NOT EXISTS (SELECT 1 FROM social_medias_tbl WHERE id = 2);
        
        -- Criar a tabela summaries_tbl
        CREATE TABLE IF NOT EXISTS summaries_tbl (
          id int(11) NOT NULL AUTO_INCREMENT,  -- Definindo a chave primária e AUTO_INCREMENT na criação
          html text NOT NULL,
          type int(11) NOT NULL,
          PRIMARY KEY (id)  -- Definindo a chave primária
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
        
        -- Inserir dados na tabela summaries_tbl
        INSERT INTO summaries_tbl (html, type)
        SELECT '<div class=\"summary-item\"><h4>[CST] Análise &amp; Desenvolvimento de Sistemas</h4><h5>06/2021 - 06/2023</h5><p><em>Universidade Paulista (UNIP)</em></p><p>O curso de Análise e Desenvolvimento de Sistemas proporciona uma formação completa em desenvolvimento de software, cobrindo desde a análise de requisitos até a implementação e manutenção de sistemas. Ele foca em técnicas de programação, design de banco de dados e soluções de TI.</p></div>', 1
        WHERE NOT EXISTS (SELECT 1 FROM summaries_tbl WHERE id = 1);
        
        INSERT INTO summaries_tbl (html, type)
        SELECT '<div class=\"summary-item\"><h4>[TÉCNICO] Desenvolvimento de Sistemas</h4><h5>01/2020 - 06/2021</h5><p><em>ETEC Antônio de Pádua Cardoso</em></p><p>Primeiro contato com o mercado de desenvolvimento, conhecendo tecnologias básicas como PHP, HTML E CSS, além de aulas demonstrativas de C# e JavaScript; Aprendizado sobre comandos SQL Server; Básico de design, servidores e pacote office.</p></div>', 1
        WHERE NOT EXISTS (SELECT 1 FROM summaries_tbl WHERE id = 2);
        
        INSERT INTO summaries_tbl (html, type)
        SELECT '<div class=\"summary-item\"><h4>Cursos Livres (Udemy, Alura)</h4><li>PHP: conceitos, lidando com dados, loops e mais (6h)</li><li>PHP Strings: Manipulando Textos com PHP (8h)</li><li>PHP e TDD: testes com PHPUnit (6h)</li><li>Solid com PHP: Princípios da Programação Orientada a Objetos (6h)</li><li>Git e GitHub: compartilhando e colaborando em projetos (8h)</li><li>Docker - Criando e Gerenciando Containers (10h)</li><li>SPA com Vue JS e API com Laravel (17h)</li><li>Desenvolvimento Web Avançado com PHP, Laravel e Vue.JS (57h)</li><li>Desenvolvimento de Plugins para WordPress (2h40)</li><li>PHP do Zero a Maestria + 4 Projetos incríveis (33h)</li></div>', 1
        WHERE NOT EXISTS (SELECT 1 FROM summaries_tbl WHERE id = 3);
        
        INSERT INTO summaries_tbl (html, type)
        SELECT '<div class=\"summary-item\"><h4>Analista Programador PHP</h4><h5>08/2023 - Atualmente</h5><p>Grupo Criar - <em>Ribeirão Preto, São Paulo (Presencial) </em></p><ul><li>Convivência em um ambiente de desenvolvimento de tecnologias de forma presencial. Neste, havia o constante uso de ferramentas como PHPStorm, DataGrip, Docker, Git, Linux. Além disso, foi possível estabelecer soft skills como trabalho em equipe, resolução de problemas e parceria.</li><li>Customização de interfaces responsivas nos sistemas internos da empresa (front-end), visando seguir as recomendações passadas pela equipe de design. Nestas atuações, fiz uso de tecnologias como HTML5, CSS3, JavaScript, Bootstrap, JQuery e outras bibliotecas populares.</li><li>Aprimoramento no Cake e CodeIgniter, frameworks PHP mais objetivos que possibilitaram estabelecer novas conexões com o banco de dados, efetuar requisições curl de forma otimizada, aplicar a programação orientada a objetos de maneira prática para cumprir as missões dentro da equipe.</li><li>Desenvolvimento completo de Applications Programming Interfaces (APIs) com o framework Laravel, em suas versões mais atuais. Acompanhamento por inteiro dos projetos, desde seus planejamentos iniciais até o deploy e, posteriormente, manutenção. Nestes aplicativos construí sistemas de manipulação de dados, autenticação de usuários, operações manuais com SQL e documentação dos respectivos endpoints com Swagger.</li></ul></div>', 2
        WHERE NOT EXISTS (SELECT 1 FROM summaries_tbl WHERE id = 4);
        
        INSERT INTO summaries_tbl (html, type)
        SELECT '<div class=\"summary-item\"><h4>Estagiário de desenvolvimento</h4><h5>07/2022 - 12/2022</h5><p>ELECTRA Informática - <em>Santo André, São Paulo (Remoto)</em></p><ul><li>Auxílio em atividades de nível simplório com HTML5, CSS3 e JavaScript. Subindo arquivos em servidores e disponibilizando para clientes visualizarem, trabalhando para atualizar constantemente landing pages.</li><li>Atuação em conjunto ao desenvolvedor responsável em sistemas PHP, trabalhando para melhorias e correções de ERP programados à base de Laravel. Migração de projetos entre servidores, novas interfaces e manutenções em eventuais problemas nos sistemas legados.</li><li>Versionamento de projetos com Git, utilizando a plataforma do Gitlab, mantendo a estrutura da equipe atualizada, em constantes reuniões de alinhamento. Forte valorização da metodologia ágil Kanban.</li></ul></div>', 2
        WHERE NOT EXISTS (SELECT 1 FROM summaries_tbl WHERE id = 5);
        
        COMMIT;
        ";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $data = $stmt->fetchAll();
            return $data;
        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}