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
