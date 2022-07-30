# TesteTecnicoSantri

## Considerações:

-Escolhi fazer essa pequena aplicação utilizando a arquitetura API REST e estrutura MVC;<br/>
-A aplicação foi desenvolvida em PHP puro utilizando o composer/psr4;<br/>
-Para rodar a api localmente utilizei o xampp. E o Insomnia para testar requisições;<br />
-Arquivos nomeados no plural = model;<br/>
-Arquivos nomeados no singular = controller;<br/>


## Melhorias:

-Para o login, criei uma autenticação por JTW, um metodo seguro e consolidado no mercado</br>
-Ao cadastrar um novo usuário, adicionei a opção de cadastrar tambem as autorizações (nas instruções não estava sendo pedido)"<br/>


## EndPoints da API:

A API conta com N endpoints/funções sendo elas:

### localhost/public/api/auth/login:

**login:** <br/>
Faz login por JWT;<br/>
Método: POST;<br/>
Recebe:<br/><br/>
{<br/>
	"login":"MARIA",
	"password":"123"
<br/>}


