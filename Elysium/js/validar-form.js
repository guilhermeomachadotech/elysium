const form = document.querySelector('form');
const nome=document.querySelector('#nome');
const email=document.querySelector('#email');
const msg=document.querySelector('#msg');

form.addEventListener('submit',(event)=>{
    event.preventDefault();
    
    //Verifica se o nome está vazio
    if (nome.value==='') {
        alert("Preencha o campo nome");
        nome.focus();
        return;
    }
    if (nome.value.length<10) {
        alert("Nome inválido");
        nome.focus();
        return;
    }
    //Verficação de email
    
    /*if (email.value==='') {
        alert('Preencha o campo email');
        email.focus()
        return;
    }*/
    if (validarEmail(email.value)) {
        alert('Email Inválido');
        email.focus()
        return;
    }
    //Vefiricação de mensagen
    if (msg.value==='') {
        msg.focus();
        alert('Preencha o campo mensagem');
        return;
    }
    if (msg.value<10) {
        alert('Mensagem inválida');
        msg.focus();
        return;
    }
    //Se tudo estiver certo, envie o form
    form.submit();
});
//Função de validação de email
function validarEmail(email) {
    //Criar uma regex para validar email
    const emailRegex=new RegExp(
        //Verficar cada elemento do email :user 12 @ gmail. com. br
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    );
    if (emailRegex.test(email)) {
        return false;
    }
    return true;
    
}