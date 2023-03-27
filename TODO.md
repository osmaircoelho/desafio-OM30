# Projeto Cadastro Pacientes

Padrão para commits:

Utilizar o padrão "Conventional Commits" para uma melhor organização e entendimento dos commits.
Exemplo de commit com o padrão "Conventional Commits":

feat: add endpoint for patient creation

This commit adds a new endpoint for creating patients with all the necessary fields and their respective validations.

-------------------------------------------
### TODO
#### Legenda [X] => 'Done!' [X] => 'Tested'
### Requisitos 
- [ ] Obrigatoriamente para o desenvolvimento do back-end utilizar o framework Laravel.
- [ ] [X] Obrigatoriamente a API deve estar nos padrões RESTful.
- [ ] Desenvolver uma listagem de pacientes com busca, do qual deve-se permitir a adição, edição, visualização e exclusão de cada um dos pacientes.
- [ ] [X] Cada paciente deve ter um endereço cadastrado em uma tabela à parte.
- [ ] Utilizar para banco de dados PostgreSQL e Redis (Cache e Queue).
- [ ] [X] Utilizar migration, factory, faker e seeder.
- [ ] [X] Criar um endpoint para listagem onde seja possível consultar pacientes pelo nome ou CPF.
- [ ] [X] Criar um endpoint para obter os dados de um único pacientes (paciente e seu endereço).
- [ ] [X] Criar endpoints de cadastro contendo os campos e suas respectivas validações
        (Obs: use tudo que o framework(Laravel) te oferece para não criar códigos repetidos e desnecessários):
- [ ] [X] Criar endpoints de atualização de paciente contendo os campos e suas respectivas validações
- [ ] [X] Criar um endpoint para excluir um paciente (paciente e seu endereço).
- [ ] [X] Criar um endpoint para consulta de CEP que implemente a API do ViaCEP e faça cache (Redis) dos dados para futuras consultas
- [ ] [X] Criar um endpoint que faça importação de dados (pacientes) via arquivo .csv e seja processada em queue assincronamente.
- [ ] [X] Utilizar docker e docker-compose para execução do projeto (queremos avaliar seu conhecimento, seja criativo e não use o Laravel Sail).

### Diferenciais que você pode entregar no seu projeto:
- [X] Utilizar algum padrão para commits;
- [ ] Possuir cobertura de testes unitários de 80% do código (PHP Unit);
- [ ] Integrar a aplicação ao Laravel Horizon para o monitoramento das queues;
- [ ] Utilizar o supervisord para o gerenciamento dos serviços necessários para o desenvolvimento e a execução do projeto;
- [ ] Utilizar elasticsearch para busca otimizada de pacientes;
- [ ] [X] Paginar a listagem de pacientes;

### Entrega
#### A entrega deve ser feita em um repositório público no GitHub, que deve conter:
- [X] O código do projeto versionado no github em repositório público.
- [X] [ ] O projeto deve ser entregue de forma "containerizada", com banco de dados (postgres, redis, e php), lembrando das
    configurações necessárias para execução dos testes.
- [X] O projeto deve ter em sua pasta root, uma collection do insomnia nomeada (endpoints.json) contendo endpoints necessários para os testes e a avaliação do desafio.
- [X] Deixe o .env.exemple configurado de maneira que o avaliador possa apenas criar uma cópia do mesmo e rodar o projeto sem perder tempo tentando entender como configurar seu projeto.
- [X] O projeto deve ter em sua pasta root, um arquivo nomeado import.csv contento o template necessário para a importação.
- [X] Um arquivo README que descreva o que foi feito e as etapas para rodar o projeto, executar os testes e gerar o code coverage.

### Done ✓
###### Requisitos
- [X] Obrigatoriamente para o desenvolvimento do back-end utilizar o framework Laravel.
- [X] Obrigatoriamente a API deve estar nos padrões RESTful.
- [X] Desenvolver uma listagem de pacientes com busca, do qual deve-se permitir a adição, edição, visualização e exclusão de cada um dos pacientes.
- [X] Cada paciente deve ter um endereço cadastrado em uma tabela à parte.
- [X] Utilizar para banco de dados PostgreSQL e Redis (Cache e Queue).
- [X] Utilizar migration, factory, faker e seeder.
- [X] Criar um endpoint para listagem onde seja possível consultar pacientes pelo nome ou CPF.
- [X] Criar um endpoint para obter os dados de um único pacientes (paciente e seu endereço).
- [X] Criar endpoints de cadastro contendo os campos e suas respectivas validações
  (Obs: use tudo que o framework(Laravel) te oferece para não criar códigos repetidos e desnecessários):
- [X] Criar endpoints de atualização de paciente contendo os campos e suas respectivas validações
- [X] Criar um endpoint para excluir um paciente (paciente e seu endereço).
- [X] Criar um endpoint para consulta de CEP que implemente a API do ViaCEP e faça cache (Redis) dos dados para futuras consultas
- [X] Criar um endpoint que faça importação de dados (pacientes) via arquivo .csv e seja processada em queue assincronamente.
- [X] Utilizar docker e docker-compose para execução do projeto (queremos avaliar seu conhecimento, seja criativo e não use o Laravel Sail).
###### Diferenciais que você pode entregar no seu projeto:
- [X] Utilizar algum padrão para commits;
- [ ] Possuir cobertura de testes unitários de 80% do código (PHP Unit);
- [ ] Integrar a aplicação ao Laravel Horizon para o monitoramento das queues;
- [ ] Utilizar o supervisord para o gerenciamento dos serviços necessários para o desenvolvimento e a execução do projeto;
- [ ] Utilizar elasticsearch para busca otimizada de pacientes;
- [X] Paginar a listagem de pacientes;
### Entrega
###### A entrega deve ser feita em um repositório público no GitHub, que deve conter:
- [X] O código do projeto versionado no github em repositório público.
- [X] O projeto deve ser entregue de forma "containerizada", com banco de dados (postgres, redis, e php), lembrando das
  configurações necessárias para execução dos testes.
- [X] O projeto deve ter em sua pasta root, uma collection do insomnia nomeada (endpoints.json) contendo endpoints necessários para os testes e a avaliação do desafio.
- [X] Deixe o .env.exemple configurado de maneira que o avaliador possa apenas criar uma cópia do mesmo e rodar o projeto sem perder tempo tentando entender como configurar seu projeto.
- [X] O projeto deve ter em sua pasta root, um arquivo nomeado import.csv contento o template necessário para a importação.
- [X] Um arquivo README que descreva o que foi feito e as etapas para rodar o projeto, executar os testes e gerar o code coverage.

