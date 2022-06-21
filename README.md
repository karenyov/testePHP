# Teste Desenvolvedor Fullstack (PHP)
Teste Desenvolvedor Fullstack (PHP)


## Requisitos
- [Docker](https://docs.docker.com/engine/install/).


## Instalação

Baixando o projeto.
```sh
git clone https://github.com/karenyov/testePHP.git
```

Na raiz do projeto abra o terminal e execute o comando:
```sh
docker-compose up -d
```

Alterar o arquivo .env.example (remover o .example) e deixar as configurações do banco conforme o container:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=eletro_db
DB_USERNAME=root
DB_PASSWORD=root
```

Para entrar no container do projeto e executar comandos:
```sh
docker exec -it app bash
```

## Estrutura do Projeto
```sh
.
├── app
│   ├── Console
│   ├── Exceptions
│   ├── Http
│   |   ├── Controllers
│   |   ├── Middleware
│   |   ├── Requests
│   |   ├── Resources
│   |   └── Kernel.php
│   ├── Models
│   ├── Providers
│   └── User.php
├── bootstrap
├── config
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── docker-files
│   ├── mysql
│   ├── nginx
│   │   └── default.conf
├── public
├── resources
│   ├── js
│   ├── lang
│   └── sass
├── routes
├── storage
├── tests
├── vendor
├── .editorconfig
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── docker-compose.yml
├── Dockerfile
├── package.json
├── phpunit.xml
├── README.md
├── server.php
└── webpack.mix.js
```
## Testes
Os testes foram escritos na pasta "./tests" do projeto. Para executá-los, basta estar dentro do container:
```sh
php artisan test
```
