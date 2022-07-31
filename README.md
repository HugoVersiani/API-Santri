# Teste Técnico Santri

## Considerações:

-Escolhi fazer essa aplicação utilizando a arquitetura API REST e estrutura MVC;<br/>
-A aplicação foi desenvolvida em PHP puro com o composer/psr4;<br/>
-Para rodar a API localmente usei o XAMPP. E o Insomnia para testar requisições;<br />
-Arquivos nomeados no plural = model;<br/>
-Arquivos nomeados no singular = controller;<br/>
-Com exceção da página de login(index) todas as views estão na pasta Views. Fiquei na dúvida se deveria deixar o front end separado da API mas decidi colocar tudo no mesmo repositório.

## Melhorias e Diferenciais:

-Para o login, criei uma **autenticação por JTW**, um metodo seguro e consolidado no mercado;</br>
-Ao cadastrar um novo usuário, adicionei a opção de cadastrar tambem as autorizações (nas instruções não estava sendo pedido);<br/>
-Criei a função de deletar usuário  (nas instruções não estava sendo pedido);<br/>
-As requisições estão sendo feitas no formato **JSON** utilizando **AJAX/JQuery;**<br/>
-Por fim, adicionei uma **navbar** com o logotipo do cliente e realoquei a caixa de busca e o botão de cadastrar novo usuário,<br/>
de maneira qua a visualização fique mais agradável. **Ajustei as margens laterais e coloquei um botão "voltar"** na tela final de cadastro de usuário.



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

<br/>
<br/>
<br/>

### localhost/public/api/auth/searchUser:

**searchUser:** <br/>
Exibe/procura por usuarios pelo nome, caso o nome seja igual a vazio, ela exibe a lista completa;<br/>
Método: GET;<br/>
Recebe: name</br>


<br/>
<br/>
<br/>

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

<br/>
<br/>
<br/>

### localhost/public/api/auth/deleteUserById:

**deleteUserById:** <br/>
Deleta usuários pelo Id;<br/>
Método: Get;<br/>
Recebe: Id<br/>



