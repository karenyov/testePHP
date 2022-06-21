# Teste Desenvolvedor Fullstack (PHP)
Teste Desenvolvedor Fullstack (PHP)


## Requisitos



## Instalação

Baixando o projeto.
```sh
git clone https://github.com/karenyov/testePHP.git
```

Na raiz do projeto abra o terminal e execute o comando:
```sh
docker-compose up -d
```

Entrar no container do projeto:
```sh
docker exec -it app bash
```

No container, instalar o composer:
```sh
composer install
```

Executar os comandos iniciais para criar o database
```sh
php artisan migrate
php artisan db:seed
```
