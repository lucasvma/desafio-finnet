# Desafio Finnet

>Uma empresa precisa importar faturas por meio de um arquivo CSV e notificar os clientes que ela está disponível para ser paga.
Essa empresa necessita agrupar as faturas pelo CPF ou CNPJ do cliente.
Para cada fatura agrupada o cliente receberá um email informando que a consolidação dessas faturas está disponível.
A empresa pode posteriormente consultar essas faturas disponíveis mediante a autenticação.

### Solução
Com base nos requisitos deste projeto, observamos que:
 - Podemos utilizar o MailTrap para fazer o envio dos emails de notificação;
 - Podemos utilizar JWT para fazer a autenticação da empresa;
 - Não precisa ser uma arquitetura/framework robusto para resolver o problema.

#### Desenho da solução
<p align="center">
  <img src="https://i.imgur.com/KE1cozf.jpg" width="500" /><br>
  (Diagrama de Casos de Uso)
</p>

#### Projeto de Dados
<p align="center">
  <img src="https://i.imgur.com/Mep6x5H.png" width="500" /><br>
  (Modelo Lógico do Banco de Dados)
</p>

#### Ferramentas e Tecnologias Utilizadas

Seguindo esses requisitos, iremos trabalhar com as seguintes ferramentas e tecnologias:
 - PHP 7.2
 - Slim 3 Framework
 - Banco de dados SQLite

Nossas dependências:
```json
"slim/slim": "3.*",
"doctrine/orm": "^2.7",
"oscarotero/psr7-middlewares": "^3.21",
"monolog/monolog": "^2.1",
"firebase/php-jwt": "^5.2",
"tuupola/slim-jwt-auth": "^3.4",
"phpmailer/phpmailer": "^6.1"
```
### Instalação com Docker
Baixe a imagem [desafio-finnet.tar](https://drive.google.com/file/d/11LDgE98ATWZQJ41R5Llf71l7zz6UabWs/view?usp=sharing).
Carrege a imagem com esse comando:
```bash
docker load -i desafio-finnet.tar
```
Copie o IMAGE ID da imagem carregada com o comando:
```bash
docker images
```
Cole o IMAGE ID da imagem nesse último comando:
```bash
docker run -d -p 8000:8000 <IMAGE ID>
```
Pronto.

### Instalação sem Docker 
Para instalar o sistema basta executar os seguintes comandos:
```bash
#Baixar o projeto
git clone https://github.com/leonammp/desafio-finnet/
cd desafio-finnet

#Instalar as dependências
composer install
```
Para executar, na pasta do sistema, vamos criar um servidor php no localhost na porta 8000 com este comando:
```bash
php -S localhost:8000
```
### Postman
Agora já está tudo rodando.

No [Postman](https://www.postman.com/downloads/), vamos importar as rotas que iremos utilizar. Siga os passos:
 - Clique em Import;
 - Escolha o arquivo 'desafio-finnet.postman_collection.json' que se encontra [nesse link](https://drive.google.com/file/d/1a9LFpPlamBpxXEeV_LZFm2-4S9byZgSg/view?usp=sharing);
 - Pronto.
 
### Rotas
No total, temos 6 rotas na aplicação. Todas elas estão na versão 1 (/v1/).

#### Para adicionar uma empresa no banco:
 - http://localhost:8000/v1/company (POST)
   - {"name": "finnet", "password": 1234}

#### Para fazer login:
  * http://localhost:8000/v1/login (POST)
    * {"name": "finnet", "password": 1234}

#### Para importar o CSV (/public/upload) para o banco de dados:
 * http://localhost:8000/v1/importCSV (GET)

#### Para enviar os email notificando os clientes:
 * http://localhost:8000/v1/sendEmails (GET)
   * *estamos enviando apenas para os 5 primeiros clientes para não acabar a cota do MailTrap hehe ;)

#### Para visualizar as faturas consolidadas por CPF/CNPJ dos clientes:
  * http://localhost:8000/v1/invoices (GET)
    * Headers
      * {"X-Token": "< auth-jwt que você recebeu em /login >"}






