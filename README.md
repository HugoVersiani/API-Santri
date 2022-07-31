# TesteTecnicoSantri

## Considerações:

-Escolhi fazer essa pequena aplicação utilizando a arquitetura API REST e estrutura MVC;<br/>
-A aplicação foi desenvolvida em PHP puro utilizando o composer/psr4;<br/>
-Para rodar a API localmente utilizei o xampp. E o Insomnia para testar requisições;<br />
-Arquivos nomeados no plural = model;<br/>
-Arquivos nomeados no singular = controller;<br/>


## Melhorias e Diferenciais:

-Para o login, criei uma autenticação por JTW, um metodo seguro e consolidado no mercado;</br>
-Ao cadastrar um novo usuário, adicionei a opção de cadastrar tambem as autorizações (nas instruções não estava sendo pedido);<br/>
-Criei a função de deletar usuário  (nas instruções não estava sendo pedido);<br/>
-As requisições estão sendo feitas no formato JSON utilizando AJAX/JQuery;<br/>



## EndPoints da API:

A API conta com 4 endpoints/funções sendo elas:

### localhost/public/api/auth/login:

**login:** <br/>
Faz login por JWT;<br/>
Método: POST;<br/>
Recebe:<br/><br/>
{<br/>
	"login":"MARIA",
	"password":"123"
<br/>}

### localhost/public/api/auth/searchUser:

**searchUser:** <br/>
Exibe/procura por usuarios pelo nome, caso o nome seja igual a vazio, ela exibe a lista completa;<br/>
Método: GET;<br/>
Recebe: name</br>


### localhost/public/api/auth/registerNewUser:

**registerNewUser:** <br/>
Faz o cadastro de um novo usuário;<br/>
Método: POST;<br/>
Recebe:<br/><br/>
{<br/>
	"login":"Joaozinho",
 "password":"5656",
 "fullname":"Joao Pereira Silva",
 "autorizations":{
													"0":"cadastrar_clientes",
												 "1":"excluir_clientes",
												 "2":"cadastrar_fornecedores"
								}
}
<br/>}


### localhost/public/api/auth/deleteUserById:

**deleteUserById:** <br/>
Deleta usuários pelo Id;<br/>
Método: Get;<br/>
Recebe: Id<br/>



