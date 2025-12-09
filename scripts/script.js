function showReg() {
    document.getElementById("modal-registro").style.display = "flex";
}

function showEsq() {
    document.getElementById("modal-senha").style.display = "flex";
}

function mudarTema() {
    var ativo = document.documentElement.getAttribute("data-tema") 
    if(ativo == "escuro"){
        localStorage.removeItem('tema')
        document.documentElement.setAttribute("data-tema","claro");
        document.getElementById("tema").innerHTML = '<i class="bi bi-brightness-high-fill"></i>';
        localStorage.setItem('tema','claro')
    } else{
        localStorage.removeItem('tema')
        document.documentElement.setAttribute("data-tema","escuro");
        document.getElementById("tema").innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
        localStorage.setItem('tema','escuro')
    }
}

window.onload = () => {
    let tema = localStorage.getItem('tema') || 'escuro';

    document.documentElement.setAttribute("data-tema", tema);

    if (tema == 'escuro') {
        document.getElementById("tema").innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
    } else {
        document.getElementById("tema").innerHTML = '<i class="bi bi-brightness-high-fill"></i>';
    }
}