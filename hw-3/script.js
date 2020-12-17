const btn1 = document.getElementById('submit');
const btn2 = document.getElementById('dugme-pravila');


if (btn1){
    btn1.addEventListener('click', promeniStranu1);
}

if (btn2){
    btn2.addEventListener('click', promeniStranu2);
}


function promeniStranu1(){
    var ime = document.getElementById('text-input').value;
    if (ime != ""){
        window.location.href = "instructions.html";
    } else {
        var napomena = document.getElementById('napomena');
        napomena.innerHTML = "Neispravan unos!";
        napomena.style.cssText = 'color: red; font-weight: bold; text-transform: uppercase';
    }
}

function promeniStranu2(){
    window.location.href = "quiz-questions.html";
}

const pitanjaJSON = `[
    {
        "pitanje": "Koje godine je poceo prvi svetski rat?",
        "odgovori": [
            { "tekst": "1915", "tacno": "false"},
            { "tekst": "1914", "tacno": "true"},
            { "tekst": "1918", "tacno": "false"},
            { "tekst": "1925", "tacno": "false"}
        ]
    },
    {
        "pitanje": "Izbaci uljeza:",
        "odgovori": [
            { "tekst": "JavaScript", "tacno": "false"},
            { "tekst": "CSS", "tacno": "false"},
            { "tekst": "HTML", "tacno": "false"},
            { "tekst": "PHP", "tacno": "true"}
        ]
    },
    {
        "pitanje": "Katalonija je deo:",
        "odgovori": [
            { "tekst": "Portugala", "tacno": "false"},
            { "tekst": "Maroka", "tacno": "false"},
            { "tekst": "Spanije", "tacno": "true"},
            { "tekst": "Tunisa", "tacno": "false"}
        ]
    },
    {
        "pitanje": "Had je bog cega?",
        "odgovori": [
            { "tekst": "Rata", "tacno": "false"},
            { "tekst": "Vode", "tacno": "false"},
            { "tekst": "Ljubavi", "tacno": "false"},
            { "tekst": "Podzemnog sveta", "tacno": "true"}
        ]
    },
    {
        "pitanje": "Ko je otkrio penicilin?",
        "odgovori": [
            { "tekst": "Johan Mendel", "tacno": "false"},
            { "tekst": "Marija Kiri", "tacno": "false"},
            { "tekst": "Luj Paster", "tacno": "false"},
            { "tekst": "Aleksandar Fleming", "tacno": "true"}
        ]
    },
    {
        "pitanje": "Koliko ima kostiju u telu odraslog coveka?",
        "odgovori": [
            { "tekst": "206", "tacno": "true"},
            { "tekst": "227", "tacno": "false"},
            { "tekst": "223", "tacno": "false"},
            { "tekst": "210", "tacno": "false"}
        ]
    },
    {
        "pitanje": "Koji je najveci grad Amerike?",
        "odgovori": [
            { "tekst": "Filadelfija", "tacno": "false"},
            { "tekst": "Njujork", "tacno": "true"},
            { "tekst": "Boston", "tacno": "false"},
            { "tekst": "Vasington", "tacno": "false"}
        ]
    },
    {
        "pitanje": "Kako se zove glavni glumac u filmu John Wick?",
        "odgovori": [
            { "tekst": "Keanu Reeves", "tacno": "true"},
            { "tekst": "Liam Neeson", "tacno": "false"},
            { "tekst": "Christian Bale", "tacno": "false"},
            { "tekst": "Tom Hardy", "tacno": "false"}
        ]
    }
]`

const pitanjaJSONunos = `[
    {
        "pitanje": "Najvisa planina na svetu je:",
        "odgovor": "Mont Everest"
    },
    {
        "pitanje": "Kada je poceo Prvi srpski ustanak?",
        "odgovor": "1804"
    },
    {
        "pitanje": "Dovrsi izreku - Lopta je: ",
        "odgovor": "okrugla"
    },
    {
        "pitanje": "Ko je sastavio Azbuku?",
        "odgovor": "Vuk Stefanovic Karadzic"
    }
]`

var pitanjaJS = JSON.parse(pitanjaJSON);
var pitanjaJSunos = JSON.parse(pitanjaJSONunos);
var mesajPitanja, trenutniIndeksPitanja
var trenutniIndeksPitanjaUnos;
trenutniIndeksPitanjaUnos = -1;
var pitanje = document.getElementById('pitanje');
var ponudjeniOdgovori = document.getElementById('ponudjeni-odgovori');
var brojPoena = 0;
var proveriDugme = document.getElementById('proveri');
const mesajPitanjaUnos = pitanjaJSunos.sort(() => Math.random() - .5);

var sledecePitanjeDugme = document.getElementById('nastavi');
var odustaniDugme = document.getElementById('odustani');
var zapocniIgru = document.getElementById('zapocniIgru');
var unos = document.getElementById('unos');
zapocniIgru.addEventListener('click', pocniIgru);

sledecePitanjeDugme.addEventListener('click', () => {
    trenutniIndeksPitanja++;
    console.log(brojPoena);
    if (trenutniIndeksPitanja < 8){
        postaviPitanje();
    } else {
        nastaviIgruUnos();
    }
    if (trenutniIndeksPitanjaUnos == 3){
        brojPoenaStrana();
    }
});


function pocniIgru(){
    zapocniIgru.classList.add('sakrij');
    ponudjeniOdgovori.classList.remove('sakrij');
    pitanje.classList.remove('sakrij');
    sledecePitanjeDugme.classList.remove('sakrij');
    odustaniDugme.classList.remove('sakrij');
    mesajPitanja = pitanjaJS.sort(() => Math.random() - .5);
    trenutniIndeksPitanja = 0;
    postaviPitanje();
}

function postaviPitanje(){
    restartuj();
    prikaziPitanje(mesajPitanja[trenutniIndeksPitanja]);
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
    prikaziPitanjeUnos(mesajPitanjaUnos[trenutniIndeksPitanjaUnos]);
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
        brojPoena++;
    }
}
