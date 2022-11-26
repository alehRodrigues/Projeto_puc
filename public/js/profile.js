$('#password_confirmation, #password').on('input', () => {
    
    if($('#password_confirmation').val() !== '' || $('#password').val() !== '') {

        $("#formSignup").validate().destroy();

        $("#formSignup").validate({
            rules: {
                password: "required",
                password_confirmation:{
                    equalTo: "#password"
                }
            },
            messages: {
                username: "Por favor informe um nome de usuário",
                email: "Por favor informe um email válido",
                password: "Por favor informe uma senha",
                password_confirmation: "As senhas não conferem",
            }
        });
    }
    else
    {
        $("#formSignup").validate().destroy();
    
        $("#formSignup").validate({
            messages: {
                username: "Por favor informe um nome de usuário",
                email: "Por favor informe um email válido",
                password: "Por favor informe uma senha",
                password_confirmation: "As senhas não conferem",
            }
        });
    }
});


