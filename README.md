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
docker-compose up -d --build
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

Entrar no container e executar o seguintes comandos:
```sh
docker exec -it app bash #entrando no container

composer install #instalar as dependências via composer

#preparando a estrutura do laravel e do database
php artisan key:generate
php artisan migrate
php artisan db:seed
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
│   ├── Repositories
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

## Estrutura Database
![alt text](https://github.com/karenyov/testePHP_API/blob/main/database.jpg)

## ENDPOINTS

### ENDPOINT - `api/marcas`

#### [POST] - `api/marcas`
| Parâmetro | Descrição |
|---|---|
| `nome` | Nome da Marca |

+ Request (application/json)

    + Body

            {
                "nome": "Brastemp",
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": {
                    "id": 2,
                    "nome": "Brastemp"
                },
                "message": "Marca encontrada com sucesso."
            }


#### [GET] - `api/marcas`
+ Request (application/json)

    + Headers

            `api/marcas`

+ Response 200 (application/json)

        {
            "success": true,
            "data": [
                {
                    "id": 2,
                    "nome": "dsadasdasdad"
                },
                {
                    "id": 4,
                    "nome": "Samsung"
                },
                {
                    "id": 5,
                    "nome": "LG"
                },
            ],
            "message": "Marcas carregadas com sucesso."
        }

#### [PUT] - `api/marcas/{id}`
| Parâmetro | Descrição |
|---|---|
| `nome` | Nome da Marca |

+ Request (application/json)

    + Body

            {
                "nome": "Brastemp",
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": {
                    "id": 2,
                    "nome": "Brastemp"
                },
                "message": "Marca alterada com sucesso."
            }

#### [DELETE] - `api/marcas/{id}`
+ Request (application/json)

    + Headers

            `api/marcas/{id}`

+ Response 200 (application/json)

        {
            "success": true,
            "data": [],
            "message": "Marca deletada com sucesso."
        }


### ENDPOINT - `api/eletrodomesticos`

#### [POST] - `api/eletrodomesticos`

| Parâmetro | Descrição |
|---|---|
| `nome` | Nome do Eletrodoméstico |
| `descricao` | Descrição do Eletrodoméstico |
| `tensao` | Tensão do Eletrodoméstico |
| `marca_id` | Marca do Eletrodoméstico |

+ Request (application/json)

    + Body

            {
                "nome": "Geladeira",
                "descricao": "Geladeira duas portas",
                "tensao": "220",
                "marca_id": "1"
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": {
                    "id": 1,
                    "marca_id": 1,
                    "nome": "Geladeira",
                    "descricao": "Geladeira duas portas",
                    "tensao": 220,
                    "marca": "Brastemp"
                },
                "message": "Eletrodoméstico encontrada com sucesso."
            }

#### [GET] - `api/eletrodomesticos`
+ Request (application/json)

    + Headers

            `api/eletrodomesticos`

+ Response 200 (application/json)

        {
            "success": true,
            "data": [
                {
                    "id": 1,
                    "marca_id": 1,
                    "nome": "Geladeira",
                    "descricao": "Geladeira duas portas",
                    "tensao": 220,
                    "marca": "Brastemp"
                },
                {
                    "id": 2,
                    "marca_id": 2,
                    "nome": "Geladeira",
                    "descricao": "Geladeira uma porta",
                    "tensao": 220,
                    "marca": "LG"
                }
            ],
            "message": "Eletrodoméstico carregadas com sucesso."
        }


#### [PUT] - `api/eletrodomesticos/{id}`
| Parâmetro | Descrição |
|---|---|
| `nome` | Nome do Eletrodoméstico |
| `descricao` | Descrição do Eletrodoméstico |
| `tensao` | Tensão do Eletrodoméstico |
| `marca_id` | Marca do Eletrodoméstico |

+ Request (application/json)

    + Body

            {
                "nome": "Geladeira",
                "descricao": "Geladeira duas portas",
                "tensao": "220",
                "marca_id": "1"
            }

+ Response 200 (application/json)

    + Body

            {
                "success": true,
                "data": {
                    "id": 1,
                    "marca_id": 1,
                    "nome": "Geladeira",
                    "descricao": "Geladeira duas portas",
                    "tensao": 220,
                    "marca": "Brastemp"
                },
                "message": "Eletrodoméstico alterado com sucesso."
            }


#### [DELETE] - `api/eletrodomesticos/{id}`
+ Request (application/json)

    + Headers

            `api/eletrodomesticos/{id}`

+ Response 200 (application/json)

        {
            "success": true,
            "data": [],
            "message": "Eletrodoméstico deletado com sucesso."
        }

## Testes
Os testes foram escritos na pasta "./tests" do projeto. Para executá-los, basta estar dentro do container:
```sh
php artisan test
```

## Comandos úteis
```sh
# lista os containers dessa aplicação
docker-compose ps
# acessa o terminal do container php
docker container exec -it app bash
# para os containers
docker-compose stop
# para e remove os containers
docker-compose down
```

## Acessando a API
Por padrão a porta configurada no docker é a 8100 (http://localhost:8100/api).
