

function loginApi() {
    var login = document.getElementById("loginValue").value;
    var password = document.getElementById("passwordValue").value;
   
  $.ajax({
  url: "https://localhost/TesteTecnicoSantri/public/api/auth/login",
  method: 'POST',
  data: JSON.stringify({'login':login, 'password':password}),
  })
  .done(function( data ) {
   if(data.status == 'erro') {
        return toastr["error"]("Atenção", "Usuario não autenticado!");
   };
    
    localStorage.setItem('user_token_jwt', data.data)
    window.location.href = "../App/views/pesquisa_usuarios.html";
  });
}


function getAllUsers() {
    
    $.ajax({
    url: "https://localhost/TesteTecnicoSantri/public/api/user/searchUser/",
    method: 'GET',
    headers: {
        'Authorization': 'Bearer '  + localStorage.getItem('user_token_jwt')
    },
    }).done(function(data) {
        
        var user = data.data;
        $(user).each(function(i) {

            if( user[i].ATIVO == "S") {
                user[i].ATIVO = "Sim";
            }
            
        
            $('#userlist').append(
                "<tr id='trlist'>" +
                "<td>" + user[i].NOME_COMPLETO + "</td>" +
                "<td>" + user[i].LOGIN + "</td>" +
                "<td>" + user[i].ATIVO + "</td>" +
                "<td>" + 
                "<button onclick='deleteUser()' id='" + user[i].USUARIO_ID + "' class='w3-button w3-theme w3-margin-top'><i class='fas fa-user-times'></i></button>" +
                "<button class='w3-button w3-theme w3-margin-top w3-margin-left'><i class='fas fa-edit'></i></button>" +
                "</td>" +
                "</tr>"
            )
            
        });
    })

}


function searchUser() {
    $('#userlist').html("");
    var userToSearch = document.getElementById("userToSearch").value;
    $.ajax({
    url: "https://localhost/TesteTecnicoSantri/public/api/user/searchUser/" + userToSearch,
    method: 'GET',
    headers: {
        'Authorization': 'Bearer '  + localStorage.getItem('user_token_jwt')
    },
    }).done(function(data) {
        if(data.status == "erro") {

            return $('#userlist').append(
                "<span>" + data.data + "<span>" 
            )

        }
            
        var user = data.data;
        $(user).each(function(i) {

            if( user[i].ATIVO == "S") {
                user[i].ATIVO = "Sim";
            }
        
         
            $('#userlist').append(
                
                "<tr id='trlist'>" +
                "<td>" + user[i].NOME_COMPLETO + "</td>" +
                "<td>" + user[i].LOGIN + "</td>" +
                "<td>" + user[i].ATIVO + "</td>" +
                "<td>" + 
                "<button onclick='deleteUser()' id='" + user[i].USUARIO_ID + "' class='w3-button w3-theme w3-margin-top'><i class='fas fa-user-times'></i></button>" +
                "<button class='w3-button w3-theme w3-margin-top w3-margin-left'><i class='fas fa-edit'></i></button>" +
                "</td>" +
                "</tr>"
            )
        });
    })
}

function newUser() {

    var fullName = document.getElementById("fullName").value;
    var newLogin = document.getElementById("newLogin").value;
    var newPassword = document.getElementById("newPassword").value;
    var autorizations = [];

    $.each($("input[name='atribute[]']:checked"), function(){ 
        autorizations.push($(this).val());

    });
    autorizations = Object.assign({}, autorizations);
    autorizations = JSON.stringify(autorizations);

    
    data = JSON.stringify({'login':newLogin, 'password':newPassword, 'fullname':fullName, 'autorizations': autorizations})
    data = data.replace("\"[", "{");
    data = data.replace("]\"", "}");
    data = data.replace(/[\\]/g, '');
    data = data.replace(":\"{", ":{");
    data = data.replace("}\"", "}");
    
    
    
    $.ajax({
        url: "https://localhost/TesteTecnicoSantri/public/api/user/registerNewUser/",
        method: 'POST',
        headers: {
            'Authorization': 'Bearer '  + localStorage.getItem('user_token_jwt')
        },
        data: data,
        })
        .done(function( data ) {
            toastr["success"]("", data.data);
           
        });

 
}

function deleteUser() {

    $(document).on('click', '.w3-button', function (){
       
        $.ajax({
            url: "https://localhost/TesteTecnicoSantri/public/api/user/deleteUserById/" + this.id,
            method: 'GET',
            headers: {
                'Authorization': 'Bearer '  + localStorage.getItem('user_token_jwt')
            },
            })
            .done(function( data ) {
                location. reload()
    
            });
    });
      
   

}

