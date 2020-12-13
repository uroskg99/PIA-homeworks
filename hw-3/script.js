var btn1 = document.getElementById('submit');
var btn2 = document.getElementById('dugme-pravila');

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
        "odgovor1": "1915",
        "odgovor2": "1914",
        "odgovor3": "1918",
        "odgovor4": "1922"
    },
    {
        "pitanje": "Izbaci uljeza:",
        "odgovor1": "HTML",
        "odgovor2": "JavaScript",
        "odgovor3": "CSS",
        "odgovor4": "PHP"
    },
    {
        "pitanje": "Katalonija je deo:",
        "odgovor1": "Portugala",
        "odgovor2": "Maroka",
        "odgovor3": "Spanije",
        "odgovor4": "Tunisa"
    },
    {
        "pitanje": "Had je bog cega?",
        "odgovor1": "Rata",
        "odgovor2": "Vode",
        "odgovor3": "Podzemnog sveta",
        "odgovor4": "Ljubavi"
    },
    {
        "pitanje": "Ko je otkrio penicilin?",
        "odgovor1": "Johan Mendel",
        "odgovor2": "Marija Kiri",
        "odgovor3": "Luj Paster",
        "odgovor4": "Aleksandar Fleming"
    },
    {
        "pitanje": "Koliko ima kostiju u telu odraslog coveka?",
        "odgovor1": "206",
        "odgovor2": "270",
        "odgovor3": "301",
        "odgovor4": "223"
    },
    {
        "pitanje": "Koji je najveci grad Amerike?",
        "odgovor1": "Vasington",
        "odgovor2": "Njujork",
        "odgovor3": "Boston",
        "odgovor4": "Filadelfija"
    },
    {
        "pitanje": "Kako se zove glavni glumac u filmu John Wick?",
        "odgovor1": "Keanu Reeves",
        "odgovor2": "Liam Neeson",
        "odgovor3": "Christian Bale",
        "odgovor4": "Tom Hardy"
    }
]`

pitanja = JSON.parse(pitanjaJSON);
console.log(pitanja[0].odgovor1);
