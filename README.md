# API de Cadastro de Pacientes

Um sistema de API para cadastro de pacientes com endereço e cadastro de fotos em geral também pode incluir recursos para
realizar consultas usando o nome ou CPF do paciente. Ele pode permitir que os profissionais de saúde obtenham informações 
detalhadas sobre um único paciente, adicionem novos registros, excluam pacientes e atualizem informações existentes.
Além disso, o sistema pode ter a capacidade de importar dados de arquivos CSV para facilitar a integração com outros sistemas. 

## 🚀 Começando

Essas instruções permitirão que você obtenha uma cópia do projeto em operação na sua máquina local para fins de desenvolvimento e teste.

Consulte **[Implantação](#-implanta%C3%A7%C3%A3o)** para saber como implantar o projeto.

### 📋 Pré-requisitos

[Git](https://git-scm.com/downloads) - Site para download do Git <br>
[Docker](https://www.docker.com/products/docker-desktop/) - Site para download do Docker 


### 🔧 Instalação

Uma série de exemplos passo-a-passo que informam o que você deve executar para ter um ambiente de desenvolvimento em execução.

```
1 - Clone o repositorio 
digite no prompt de comando 
git clone git@github.com:osmaircoelho/desafio-OM30.git
 
2 - Entre na pasta do projeto  
cd desafio-OM30

3 - copie o arquivo .env.example para .env
cp .env.example .env 

4 - Com o docker instalado digite
docker-compose up -d

5 - Entre no prompt interativo
docker-compose exec app bash

6 - Instale as dependencias
composer install

7 - Instale as dependencias NPM
npm install

8 - Gera a Laravel app key
php artisan key:generate

9 - Rode as migration e as seed
php artisan migrate --seed

10 - Digite no nanvegador
localhost:80 
```

## ⚙️ Executando os testes (Não esta totalmente coberto)

```
php artisan test
```
## 🛠️ Construído com

Mencione as ferramentas que você usou para criar seu projeto

* [Laravel](https://laravel.com/docs/8.x) - O framework web usado
* [Docker](https://docs.docker.com/) - Plataforma open source que facilita a criação e administração de ambientes isolados.

## ✒️ Autores

* **Desenvolvedor** - [Osmair Coelho](https://github.com/osmaircoelho)

## 📄 Licença

Este projeto está sob a licença GNU General Public License v3.0 (GNU GPLv3) - veja o arquivo [GNU.ORG](https://www.gnu.org/licenses/gpl-3.0.pt-br.html) para detalhes.
## 🎁 Expressões de gratidão

* Obrigado OM30 pelo desafio! 🦾📢;
---
⌨️ com ❤️ por [Osmair Coelho](https://github.com/osmaircoelho/) 😊
