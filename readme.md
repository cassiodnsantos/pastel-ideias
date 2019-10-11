# Hello World!
Olá Avaliador!

Para Realizar o processo de Avaliação deste Projeto, siga os passos listados Abaixo.

# Clonar o Projeto!
Url para Clonar o Projeto https://github.com/cassiodnsantos/pastel-ideias.git

## Configurações do Projeto ##
Após o término do clone, se o projeto não conter o arquivo **.env** ,acesse a pasta do projeto e renomeie o arquivo **.env_rename** para **.env**.
Este arquivo **.env** contém algumas configurações pré-definidas como conexão ao banco de dados e configurações para o envio do e-mail(**Mailtrap**).

Finalizando as configurações do arquivo **.env**, acesse a pasta via terminal e execute os comandos abaixo:

```
composer update
php artisan migrate --seed // irá criar as tabelas e irá cadastrar serie de pasteis
php artisan serve
```
# EndPoints #
Logo abaixo, temos os endpoints utilizado no projeto. Porém, há um arquivo **Api_Pastelaria.postman_collectionJson** no diretório **public/file/** que pode ser importado no POSTMAN.


## CLIENTES ##
### Client/Create - POST ###
* **Url**  : http://localhost:8000/api/clients
* **Envio :** - **Json** array : {"name":"Teste","email":"teste@gmail.com","phone":"111111111","dateofbirth":"1986-05-15","address":"Avenida Paulista","neighborhood":"Centro","zipecode":"01010001"}.
* **Retorno:** mensagem 200 - json {"result": "success_store"}.

### Client/Show - GET ###
* **Url:**  : http://localhost:8000/api/clients/{id}
* **{id}:** : int - id do Cliente;
* **Retorno:** array: dados do cliente e pedidos dentro do id informado.

### Client/Update - PUT ###
* **Url**  : http://localhost:8000/api/clients/{id}
* **Envio :** - **Json** array : {"name":"Teste","email":"teste@gmail.com","phone":"111111111","dateofbirth":"1986-05-15","address":"Avenida Paulista","neighborhood":"Centro","zipecode":"01010001"}.
* **Retorno:** mensagem 200 - json {"result": "success_update"}.

### Client/Delete - DELETE ###
* **Url:**  : http://localhost:8000/api/clients/{id}
* **{id}:** : int - id do Cliente;
* **Retorno:** mensagem 200 - json {"result": "success_delete"}

### Client/Index - GET ###
* **Url**  : http://localhost:8000/api/clients
* **Params** - **page** = int: número da página a ser exibido / **per_page** = int: número de registros por página.
* **Retorno:** array: lista de clientes dentro dos filtros realizados.

## PASTEIS ##

### Pastry/Create - POST ###
* **Url**  : http://localhost:8000/api/pastries
* **Envio :** - **Json** array : {"name":"Pastel Bauru","price":"8","photo":"pastel_bauru.jpg"}.
* **Retorno:** mensagem 200 - json {"result": "success_store"}.

### Pastry/Show - GET ###
* **Url:**  : http://localhost:8000/api/pastries/{id}
* **{id}:** : int - id do Pastel;
* **Retorno:** array: dados do pasteis, pedidos e clientes dentro do id informado.

### Pastry/Update - PUT ###
* **Url**  : http://localhost:8000/api/pastries/{id}
* **Envio :** - **Json** array : {"name":"Pastel Bauru de Bauro","price":"15","photo":"pastel-bauru.jpg"}.
* **Retorno:** mensagem 200 - json {"result": "success_update"}.

### Pastry/Delete - DELETE ###
* **Url:**  : http://localhost:8000/api/pastries/{id}
* **{id}:** : int - id do Pastel;
* **Retorno:** mensagem 200 - json {"result": "success_delete"}

### Pastry/Index - GET ###
* **Url**  : http://localhost:8000/api/pastries
* **Params** - **page** = int: número da página a ser exibido / **per_page** = int: número de registros por página.
* **Retorno:** array: lista de pastéis dentro dos filtros realizados.
## PEDIDOS ##

### Order/Create - POST ###
* **Url**  : http://localhost:8000/api/orders
* **Envio :** - **Json** array : {"client_id":"1","pastry_id":[{"pastry_id":"1"},{"pastry_id":"2"}]}.

### Order/Show - GET ###
* **Url:**  : http://localhost:8000/api/orders/{id}
* **{id}:** : int - id do Pedido;
* **Retorno:** array: dados do pedido, pasteis e clientes dentro do id informado.

### Order/Update - PUT ###
* **Url**  : http://localhost:8000/api/orders/{id}
* **Envio :** - **Json** array : {"client_id":"1","pastry_id":[{"pastry_id":"7"}]}

### Order/Delete - DELETE ###
* **Url:**  : http://localhost:8000/api/orders/{id}
* **{id}:** : int - id do Pedido;
* **Retorno:** mensagem 200 - json {"result": "success_delete"}

### Order/Index - GET ###
* **Url**  : http://localhost:8000/api/orders
* **Params** - **page** = int: número da página a ser exibido / **per_page** = int: número de registros por página.
* **Retorno:** array: lista de pedidos dentro dos filtros realizados.


# ENVIO DE E-MAIL #
Ao Cadastrar um pedido, o Sistema Envia E-mail para o Cliente.
Conforme mencionado anteriormente, as configurações para o envio de e-mail estão pré-definidas no arquivo **.env** e estão utiiando a ferramenta **Mailtrap**.

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=8a6f18a36d13d4
MAIL_PASSWORD=44f451e695a744
MAIL_ENCRYPTION=null
```
### Processando Fila de Envio de E-mails ###

```
php artisan queue:work
```

### Visualizando os E-mails ###
Se não houve alteração no arquivo **.env**, é possivel visualizar os e-mails enviados para o sistema através dos dados abaixo.
* Acessar o link https://mailtrap.io/

