const dugme1 = document.getElementById('submit');
const dugme2 = document.getElementById('dugme-pravila');


if (dugme1){
    dugme1.addEventListener('click', promeniStranu1);
    
}

if (dugme2){
    dugme2.addEventListener('click', promeniStranu2);
}


function promeniStranu1(){
    imeIgraca = document.getElementById('text-input').value;
    if (imeIgraca != ""){
        window.location.href = "instructions.html";
        
        if (localStorage.getItem('niz') == null){
            localStorage.setItem('niz', '[]');
        }

        if (localStorage.getItem('brojIgraca') == null){
            localStorage.setItem('brojIgraca', '-1');
        }

        var brojIgracaString = JSON.parse(localStorage.getItem('brojIgraca'));
        var brojIgraca = parseInt(brojIgracaString);
        brojIgraca += 1;
        var izlazniBrojIgraca = brojIgraca.toString();
        localStorage.setItem('brojIgraca', izlazniBrojIgraca);


        

        var prethodniNiz = JSON.parse(localStorage.getItem('niz'));
        var prethodniNizObj = {};
        prethodniNizObj["ime"] = imeIgraca;
        prethodniNiz.push(prethodniNizObj);

        localStorage.setItem('niz', JSON.stringify(prethodniNiz));

    } else {
        var napomena = document.getElementById('napomena');
        napomena.innerHTML = "Neispravan unos!";
        napomena.style.cssText = 'color: red; font-weight: bold; text-transform: uppercase';
    }
}


function promeniStranu2(){
    window.location.href = "quiz-questions.html";
}


var pitanjaJS, pitanjaJSunos;

fetch('pitanja.json')
		.then(function (response) {
			return response.json()
		}).
		then(function (data) {
			pitanjaJS = data;
		});

fetch('pitanjaUnos.json')
		.then(function (response) {
			return response.json()
		}).
		then(function (data) {
			pitanjaJSunos = data;
		});



var mesajPitanja, trenutniIndeksPitanja, mesajPitanjaUnos;
var trenutniIndeksPitanjaUnos;
trenutniIndeksPitanjaUnos = -1;
var brojPoena = 0;
var dodaj;
var brojPoenaDiv;



const pitanje = document.getElementById('pitanje');
const ponudjeniOdgovori = document.getElementById('ponudjeni-odgovori');
const proveriDugme = document.getElementById('proveri');
const ceoDivPitanja = document.getElementById('ceoDivPitanja');
const sledecePitanjeDugme = document.getElementById('nastavi');
const odustaniDugme = document.getElementById('odustani');
const zapocniIgru = document.getElementById('zapocniIgru');
const unos = document.getElementById('unos');
const lista = document.getElementById('lista');
konacanBrojPoena = document.getElementById('konacanBrojPoena');

const tajmer = document.getElementById('tajmer');
const vidiTabelu = document.getElementById('vidiTabelu');
const vratiPocetak = document.getElementById('vratiPocetak');
const rangTabela = document.getElementById('rangTabela');
const restartujKviz = document.getElementById('restartujKviz');

var vremeZaOdgovor = 20;

var istekloVreme;
var istekloVremeUnos;
var vremeOdgovora;


if (zapocniIgru){


    zapocniIgru.addEventListener('click', pocniIgru);

    odustaniDugme.addEventListener('click', brojPoenaStrana);


    sledecePitanjeDugme.addEventListener('click', () => {
        if (trenutniIndeksPitanjaUnos < 3){
            trenutniIndeksPitanja++;
            if (trenutniIndeksPitanja < 8){
                clearTimeout(istekloVreme);
                clearInterval(vremeOdgovora);
                postaviPitanje();
            } else {
                clearTimeout(istekloVreme);
                clearTimeout(istekloVremeUnos);
                clearInterval(vremeOdgovora);
                nastaviIgruUnos();
            }
        } else {
            clearTimeout(istekloVremeUnos);
            clearInterval(vremeOdgovora);
            brojPoenaStrana();
        }
        
        
    });

    function brojPoenaStrana(){
        brojPoenaDiv = document.getElementById('brojPoena');
        brojPoenaDiv.classList.remove('sakrij');
        ceoDivPitanja.classList.add('sakrij');
        tajmer.classList.add('sakrij');
        vidiTabelu.classList.remove('sakrij');
        vratiPocetak.classList.remove('sakrij');
        konacanBrojPoena.innerHTML = brojPoena;

        var trenutniIgrac = JSON.parse(localStorage.getItem('brojIgraca'));
        var trenutniBrojIgraca = parseInt(trenutniIgrac);


        var privremeniNiz = JSON.parse(localStorage.getItem('niz'));
        privremeniNiz[trenutniBrojIgraca]["poeni"] = brojPoena;
        localStorage.setItem('niz', JSON.stringify(privremeniNiz));




        var konacniNiz = JSON.parse(localStorage.getItem('niz'));

        konacniNiz.sort(function(a, b) {
            if (b["poeni"] > a["poeni"]) {
                return 1;
            }

            if (b["poeni"] < a["poeni"]) {
                return -1;
            }

            if (b["poeni"] == a["poeni"]) {
                if (b["ime"].toLowerCase() > a["ime"].toLowerCase()){
                    return -1;
                } else {
                    return 1;
                }
            }
        });

       
        
        
        

        for (var i = 0; i < 10; i++){
            

            var napraviNoviClan = document.createElement('li');
            var imeIgracaTrenutnog = document.createTextNode(konacniNiz[i]["ime"]);
            napraviNoviClan.appendChild(imeIgracaTrenutnog);

            var napraviClanSpan = document.createElement('span');
            var brojPoenaTrenutnog = document.createTextNode(konacniNiz[i]["poeni"]);
            napraviClanSpan.appendChild(brojPoenaTrenutnog);
            napraviNoviClan.appendChild(napraviClanSpan);
            

            lista.appendChild(napraviNoviClan);
        }

    }


    function pocniIgru(){
        tajmer.classList.remove('sakrij');
        zapocniIgru.classList.add('sakrij');
        ponudjeniOdgovori.classList.remove('sakrij');
        pitanje.classList.remove('sakrij');
        sledecePitanjeDugme.classList.remove('sakrij');
        odustaniDugme.classList.remove('sakrij');
        mesajPitanja = pitanjaJS.sort(() => Math.random() - .5);
        mesajPitanjaUnos = pitanjaJSunos.sort(() => Math.random() - .5);
        trenutniIndeksPitanja = 0;
        postaviPitanje();
    }

    function promeniVreme(){
        vremeZaOdgovor--;
        tajmer.innerHTML = vremeZaOdgovor;
    }

    function postaviPitanje(){
        restartuj();
        
        vremeZaOdgovor = 20;
        tajmer.innerHTML = vremeZaOdgovor;
        vremeOdgovora = setInterval(promeniVreme, 1000);

        prikaziPitanje(mesajPitanja[trenutniIndeksPitanja]);
        istekloVreme = setTimeout(vremeIstekaPitanje, 20000);
    }


    function restartuj(){
        while (ponudjeniOdgovori.firstChild) {
            ponudjeniOdgovori.removeChild(ponudjeniOdgovori.firstChild);
        }
        unos.value = '';
        unos.classList.remove('tacno');
        unos.classList.remove('netacno');
    }

    function restartujUnos(){
        unos.remove();
    }

    function prikaziPitanje(postaviPitanje){
        pitanje.innerText = postaviPitanje.pitanje;
        postaviPitanje.odgovori.forEach(odgovor => {
            const dugme = document.createElement('button');
            dugme.innerText = odgovor.tekst;
            dugme.classList.add('odgovori');
            if (odgovor.tacno) {
                dugme.dataset.tacno = odgovor.tacno;
            }
            dugme.addEventListener('click', izaberiOdgovor);
            ponudjeniOdgovori.appendChild(dugme);
        });
    }

    function izaberiOdgovor(e){
        const izabranOdgovor = e.target;
        const tacno = izabranOdgovor.dataset.tacno;
        if (tacno == "true"){
            brojPoena++;
        } 
        Array.from(ponudjeniOdgovori.children).forEach(dugme => {
            statusOdgovora(dugme, dugme.dataset.tacno); 
        });
        
        if (trenutniIndeksPitanja < 7){
            clearTimeout(istekloVreme);
            clearInterval(vremeOdgovora);
            var postavitiPitanje = setTimeout(postaviPitanje, 1000);
            trenutniIndeksPitanja++;
        } else {
            clearTimeout(istekloVreme);
            clearInterval(vremeOdgovora);
            var nastavitiSaUnosom = setTimeout(nastaviIgruUnos, 1000);
        }
    }

    function statusOdgovora(element, tacno){
        ocistiStatus(element);
        if (tacno == "true"){
            element.classList.add('tacno');
        } else {
            element.classList.add('netacno');
        }
    }

    function ocistiStatus(element){
        element.classList.remove('tacno');
        element.classList.remove('netacno');
    }

    function nastaviIgruUnos(){
        ponudjeniOdgovori.classList.add('sakrij');
        unos.classList.remove('sakrij');
        proveriDugme.classList.remove('sakrij');
        trenutniIndeksPitanjaUnos++;
        postaviPitanjeUnos();
    }

    function postaviPitanjeUnos(){
        restartuj();

        vremeZaOdgovor = 20;
        tajmer.innerHTML = vremeZaOdgovor;
        vremeOdgovora = setInterval(promeniVreme, 1000);

        prikaziPitanjeUnos(mesajPitanjaUnos[trenutniIndeksPitanjaUnos]);
        istekloVremeUnos = setTimeout(vremeIstekaPitanjeUnos, 20000);
    }

    function prikaziPitanjeUnos(postaviPitanje){
        pitanje.innerText = postaviPitanje.pitanje;
        const input = document.createElement('input')
    }

    proveriDugme.addEventListener('click', proveriOdgovor);

    function proveriOdgovor(){
        var unosTekst = unos.value;
        if (unosTekst == mesajPitanjaUnos[trenutniIndeksPitanjaUnos]["odgovor"]){
            unos.classList.add('tacno');
            brojPoena++;
        } else {
            unos.classList.add('netacno');
        }
        if (trenutniIndeksPitanjaUnos < 3){
            clearTimeout(istekloVremeUnos);
            clearInterval(vremeOdgovora);
            setTimeout(postaviPitanjeUnos, 1000);
            trenutniIndeksPitanjaUnos++;
        } else {
            clearInterval(vremeOdgovora);
            clearTimeout(istekloVremeUnos)
            setTimeout(brojPoenaStrana, 1000);
        }
    }

    function vremeIstekaPitanje(){
        clearInterval(vremeOdgovora);


        if (trenutniIndeksPitanja < 7){
            trenutniIndeksPitanja++;
            postaviPitanje();
        } else {
            nastaviIgruUnos();
        }
    }

    function vremeIstekaPitanjeUnos(){
        clearInterval(vremeOdgovora);

        if (trenutniIndeksPitanjaUnos < 3){
            trenutniIndeksPitanjaUnos++;
            postaviPitanjeUnos();
        } else {
            brojPoenaStrana();
        }
    }

    vratiPocetak.addEventListener('click', () => {
        window.location.href = "quiz.html";
    });

    vidiTabelu.addEventListener('click', prikaziTabelu);

    function prikaziTabelu(){
        brojPoenaDiv.classList.add('sakrij');
        vidiTabelu.classList.add('sakrij');
        vratiPocetak.classList.add('sakrij');
        rangTabela.classList.remove('sakrij');
        clearInterval(vremeOdgovora);
        clearTimeout(istekloVremeUnos);
        clearTimeout(istekloVreme);
    }

    restartujKviz.addEventListener('click', () => {
        window.location.href = "quiz.html";
    });

    
}
