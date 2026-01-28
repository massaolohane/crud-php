/* =========================
   MOSTRAR / OCULTAR SENHA
========================= */
function toggleSenha(){
    const input = document.getElementById("senha");
    const eye = document.getElementById("eye");

    if(!input || !eye) return;

    if(input.type === "password"){
        input.type = "text";
        eye.innerText = "👁";
    }else{
        input.type = "password";
        eye.innerText = "🙈";
    }
}


/* =========================
   MENSAGEM GLOBAL
========================= */
function mostrarMensagem(texto, tipo){
    const box = document.getElementById("msg");
    if(!box) return;

    box.innerHTML = texto;
    box.className = tipo;
    box.style.display = "block";

    setTimeout(()=>{
        box.style.display = "none";
    },3000);
}

/* =========================
   VALIDAR CRIAR / EDITAR
========================= */
function validarUsuario(){
    const nome = document.getElementById("nome");
    const email = document.getElementById("email");
    const senhaField = document.getElementById("senha");

    if(!nome || !email) return true;

    if(nome.value.trim() === "" || email.value.trim() === ""){
        mostrarMensagem("Preencha nome e email", "erro");
        return false;
    }

    if(senhaField && senhaField.value.trim().length < 4){
        mostrarMensagem("Senha deve ter no mínimo 4 caracteres", "erro");
        return false;
    }

    return true;
}

/* =========================
   VALIDAR LOGIN
========================= */
function validarLogin(){
    const email = document.getElementById("email");
    const senha = document.getElementById("senha");

    if(!email || !senha) return true;

    if(email.value.trim() === "" || senha.value.trim() === ""){
        mostrarMensagem("Preencha todos os campos", "erro");
        return false;
    }

    return true;
}

/* =========================
   DARK / LIGHT MODE
========================= */
function toggleTheme(){
    document.body.classList.toggle("light");

    const btn = document.getElementById("themeBtn");

    if(document.body.classList.contains("light")){
        localStorage.setItem("theme","light");
        if(btn) btn.innerText = "☀";
    }else{
        localStorage.setItem("theme","dark");
        if(btn) btn.innerText = "🌙";
    }
}

if(localStorage.getItem("theme") === "light"){
    document.body.classList.add("light");
    const btn = document.getElementById("themeBtn");
    if(btn) btn.innerText = "☀";
}


function atualizarIcone(){
    const btn = document.getElementById("themeBtn");
    if(!btn) return;

    btn.innerText = document.body.classList.contains("light") ? "☀" : "🌙";
}

if(localStorage.getItem("theme") === "light"){
    document.body.classList.add("light");
}

atualizarIcone();
