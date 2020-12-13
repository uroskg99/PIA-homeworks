var btn1 = document.getElementById('submit');


btn1.addEventListener('click', () => {
    var ime = document.getElementById('text-input').value;
    if (ime != ""){
        window.location.href = "instructions.html";
    } else {
        var napomena = document.getElementById('napomena');
        napomena.innerHTML = "Neispravan unos!";
        napomena.style.cssText = 'color: red; font-weight: bold; text-transform: uppercase';
    }
});
