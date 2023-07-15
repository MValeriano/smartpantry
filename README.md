---
title: Smartpantry
description: Trabalho de Conclusão de Curso
tags:
  - php
  - laravel
  - postgresql
---

## ✨ Features

- PHP
- Laravel
- Postgres

# SmartPantry

## Trabalho de Conclusão de Curso

Este projeto é um trabalho de conclusão de curso para o curso de Pós-graduação Lato Sensu em Desenvolvimento Web Full Stack - PUC-MINAS intitulado "SmartPantry - Um Sistema Inteligente de Gerenciamento de Despensa" desenvolvido por Marcelo Valeriano.

O SmartPantry é um sistema web que auxilia os usuários no gerenciamento de suas despensas, listas de compras e produtos de supermercado. Ele oferece recursos como cadastro de produtos, criação de listas de compras, rastreamento de produtos vencidos e compartilhamento de listas entre usuários.

## Documentação swagger

https://smartpantry.up.railway.app/api/documentation

## Url para teste

https://smartpantry.up.railway.app/

## Funcionalidades Principais

- Cadastro de produtos com informações detalhadas (nome, descrição, peso, unidade de medida, etc.).
- Criação de listas de compras com produtos selecionados da despensa.
- Notificações de produtos próximos à data de vencimento.
- Compartilhamento de listas de compras com outros usuários.
- Visualização do histórico de compras e despensa.

## Pré-requisitos

- PHP >= 7.4
- Laravel >= 8.x
- Banco de dados postgresql

## Instalação

1. Faça o clone deste repositório para sua máquina local.
2. Navegue até a pasta do projeto: `cd smartpantry`.
3. Execute o comando `composer install` para instalar as dependências do projeto.
4. Crie um banco de dados postgresql para o projeto.
5. Copie o arquivo `.env.example` e renomeie para `.env`. Edite este arquivo e configure as informações do banco de dados.
6. Execute o comando `php artisan key:generate` para gerar uma nova chave de aplicativo.
7. Execute o comando `php artisan migrate` para criar as tabelas do banco de dados.
8. Execute o comando `php artisan serve` para iniciar o servidor de desenvolvimento.

## Uso

- Acesse o aplicativo no seu navegador em `http://localhost:8000`.
- Crie uma conta ou faça login se já tiver uma.
- Explore as funcionalidades do SmartPantry, adicione produtos à despensa, crie listas de compras e gerencie sua conta.
- Aproveite a experiência de gerenciamento inteligente da despensa!

## Contribuição

Contribuições são bem-vindas! Se você tiver sugestões, correções de bugs ou melhorias para o SmartPantry, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto é licenciado sob a [Licença MIT](https://opensource.org/licenses/MIT).