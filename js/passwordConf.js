var pass = document.getElementById("pass"),passc = document.getElementById("passc");

function verifyPassc() {
    if (pass.value !== passc.value) {
        passc.setCustomValidity("Passwords Don't Match");
    } else {
        passc.setCustomValidity("");
    }
}

passc.onchange = verifyPassc;
pass.onkeyup = verifyPassc;
pass.onchange = verifyPassc;
passc.onkeyup = verifyPassc;