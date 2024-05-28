<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Pracownia</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/tabulator-tables@5.5.3/dist/css/tabulator.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://unpkg.com/tabulator-tables@5.5.3/dist/js/tabulator.min.js"></script>
  <style>

@media (max-width: 768px) {
  .navbar-nav {
    flex-direction: column;
  }
  .nav-item {
    text-align: center;
  }
}
  body {
            background-color: #666;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-top:10px;
        }

        .wrapper {
            display: flex;
            justify-content: center; 
          width:99%;
        }

        .main-sidebar,
        .content-wrapper,
        .main-header,
        .footer, .top-header {
            border: 1px solid #fff;
            border-radius: 5px;
        }

        .main-sidebar {
            background-color: #343a40;
            color: #fff;
            width: 250px;
             margin-top: 5px;
             margin-bottom: 5px;
             margin-left: 0px;
             margin-right: 5px;
             padding:15px;
             box-shadow: 0 0 8px rgba(0,0,0,0.5);
        }

        .content-wrapper {
            background-color: #343a40;
            box-shadow: 0 0 8px rgba(0,0,0,0.5);
            color: #fff;
            flex-grow: 1;
            padding: 20px;
        }

        .main-header {
            padding: 10px;
            background-color: #2c3137;
        }

        .main-header h2 {
            float: right;
            margin: 5px;
            color: #fff;
        }

        .logo {
            width: 6%;
            float: left;
        }


        .footer {
            background-color: #2c3137;
            box-shadow: 0 0 8px rgba(0,0,0,0.5);
            color: #fff;
            text-align: center;
            padding: 10px;
            width: 98%;
        }

        #currentDate {
            color: #fff; /* Kolor daty */
        }

        .wrapper,
 
        .content-wrapper,
        .main-header
         {
            margin-top: 5px; 
            margin-left: 10px; 
            margin-bottom: 5px; 
            margin-right: 10px; 
        }
        .footer , .top-header {
          margin-left:10px;
          margin-right: 15px;
          margin-bottom:10px;
          width: calc(100% - 25px);
        }

  .sidebar {
    background-color: #343a40;
    border:1px solid #fff;
    margin-left:10px;
    margin-right: 10px;
    margin-bottom: 10px;
    border-radius:5px;
          color: #ffffff;
  }

  .sidebar button {
    padding: 10px;
    text-decoration: none;
    color: #ffffff;
    margin-left:auto;
    margin-right:auto;
    width:100%;
  }


  #tab { 
    border:1px solid #fff;
    border-radius:5px;
    width:100%;
    margin-left:15px;
    margin-right: 15px;
  }
  #tab tr , #tab td {

    border:1px solid #fff;
    text-align:center;
  }
.top-header{
    padding:10px;
    min-height: 115px;
  }
  .top-header h2 {
    float: right;
    margin:5px;
  }
  .logo{
  width:6%;
  float: left;
  }
  td input {
    border:none;
    text-align:center;
  }
  td button{
    margin:5px;
  }


  #timer{
    position: absolute;
    padding:15px;
    text-align: right;
    width:50%;
    top:50px;
    right:15px;
  }

 .tabulator {
  border: 1px solid #fff;
  border-radius: 5px;
  margin:10px;
  }
  .czas {
    color:red;
  }
.nav-item {
  margin:5px;
}

.nav-item button {
  width:100%;
  font-size:17px;
}
.nav-item button:hover {
    color:#666;
  font-size:18px;
} 

  </style>
</head>
<body>
<header class="top-header container-fluid bg-dark text-white">
  <img class="logo" src="https://www.zso5.gliwice.pl/wp-content/uploads/2014/06/logo3.png" alt="Zespół Szkół Ogólnokształcących nr 5 im. Armii Krajowej w Gliwicach">
  <h2>Aplikacja Pracownia</h2>  
  <div id="timer"></div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <!-- Tutaj umieść swoją listę nawigacji -->
        </ul>
      </div>
    </div>
  </nav>
</header>   

<div class="wrapper">
  <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark main-sidebar">
    <div class="position-sticky">
      <ul class="nav flex-column">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">Menu</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <button onclick="strona('dash')" class="btn btn-secondary">
              <i class="bi bi-house-door-fill"></i>
              Dashboard
            </button>
          </li>
          <li class="nav-item">
            <button onclick="strona('users')" class="btn btn-secondary">
              <i class="bi bi-people-fill"></i>
              Lista uczniów
            </button>
          </li>
          <li class="nav-item">
            <button onclick="strona('list')" class="btn btn-secondary active">
              <i class="bi bi-pc-display-horizontal"></i>
              Lista komputerów
            </button>
          </li>
          <li class="nav-item">
            <button onclick="strona('plan')" class="btn btn-secondary">
              <i class="bi bi-card-list"></i>
              Plan lekcji
            </button>
          </li>
          <li class="nav-item">
            <button onclick="strona('spr')" class="btn btn-secondary">
              <i class="bi bi-emoji-smile-fill"></i>
              Sprawdziany
            </button>
          </li>
          <li class="nav-item">
            <button onclick="strona('dyz')" class="btn btn-secondary">
              <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
              Dyżury
            </button>
          </li>
        </ul>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="main-header">
    <form id="uczen" onsubmit="return validateForm()" class="needs-validation">
  <div class="row g-3">
    <div class="col-md-6">
      <label for="imie" class="form-label">Imię:</label>
      <input type="text" class="form-control form-control-sm" id="imie" name="imie" required>
      <div class="invalid-feedback">Pole Imię jest wymagane.</div>
    </div>
    
    <div class="col-md-6">
      <label for="nazwisko" class="form-label">Nazwisko:</label>
      <input type="text" class="form-control form-control-sm" id="nazwisko" name="nazwisko" required>
      <div class="invalid-feedback">Pole Nazwisko jest wymagane.</div>
    </div>
    
    <div class="col-md-6">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control form-control-sm" id="email" name="email">
      <div class="invalid-feedback">Proszę podać prawidłowy adres email.</div>
    </div>
    
    <div class="col-md-6">
      <label for="klasa" class="form-label">Klasa:</label>
      <input type="text" class="form-control form-control-sm" id="klasa" name="klasa">
    </div>
    
    <div class="col-md-6">
      <label for="stanowisko" class="form-label">Stanowisko:</label>
      <select class="form-select form-control-sm" id="stanowisko" name="stanowisko">
        <option value="uczen">Uczeń</option>
        <option value="nauczyciel">Nauczyciel</option>
        <option value="administracja">Administracja</option>
      </select>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    
    <table id="tab" class="table table-dark"></table>
    <div id="dataTable"></div>
  </div>
</div>
<footer class="footer" id="footer">
  <p>Strona stworzona przez Marcin Mika | Dzisiaj: <span id="currentDate"></span></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
const dataTable = "dataTable";
f =  document.getElementById("tab");
t =  document.getElementById(dataTable);
f.style.display= "none";

function validateForm() {
    var imie = document.getElementById("imie").value;
    var nazwisko = document.getElementById("nazwisko").value;
    var email = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (imie == "" || nazwisko == "") {
      alert("Imię i nazwisko są wymagane!");
      return false;
    }

    if (email !== "" && !email.match(emailRegex)) {
      alert("Nieprawidłowy adres email!");
      return false;
    }
  }


function e(a) {
  console.log(a);
}

async function getJson(url) {
  const response = await fetch(url);
  const obj = await response.json();
    return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve(obj);
    }, 500);
  });
}


function strona(a) {
  links = document.querySelectorAll("nav div ul li button");
  s="";

  if(a == "dash") { 
    f.style.display= "box";
    links[0].classList.add("active");
    links[1].classList.remove("active");
    links[2].classList.remove("active");
    links[3].classList.remove("active");
    links[4].classList.remove("active");
    links[5].classList.remove("active");

    s+= "<tr>";
    s+= "<td colspan='4'>ekran</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>&nbsp;</td>";
    s+= "<td colspan='2'>ekran</td>";
    s+= "<td>&nbsp;</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>8</td>";
    s+= "<td colspan='2' rowspan='8'>&nbsp;</td>";
    s+= "<td>9</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>7</td>";
    s+= "<td>10</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>6</td>";
    s+= "<td>11</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>5</td>";
    s+= "<td>12</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>4</td>";
    s+= "<td>13</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>3</td>";
    s+= "<td>14</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>2</td>";
    s+= "<td>15</td>";
    s+= "</tr>";
    s+= "<tr>";
    s+= "<td>1</td>";
    s+= "<td>16</td>";
    s+= "</tr>";

    f.innerHTML = s;
  }

  if(a == "list") { 
    // lista komputerów 
    links[0].classList.remove("active");
    links[1].classList.remove("active");
    links[2].classList.add("active");
    links[3].classList.remove("active");
    links[4].classList.remove("active");
    links[5].classList.remove("active");
    getJson("API/PCS").then(obj => {
        var table = new Tabulator("#"+dataTable, {
      layout:"fitDataFill",
      height:"440px",
      data:obj, 
      autoColumns:true,
      });
    });
  }

  if(a == "plan") { 
    links[0].classList.remove("active");
    links[1].classList.remove("active");
    links[2].classList.remove("active");
    links[3].classList.add("active");
    links[4].classList.remove("active");
    links[5].classList.remove("active");
    getJson("API/PLANS").then(obj => {
      k = Object.keys(obj).map(function(key) {
         return { key: key, value: obj[key] };
       });
       for (const element of obj) {
        if(element.dzien  == 1) { element.dzien ="Poniedziałek"; }
        if(element.dzien  == 2) { element.dzien ="Wtorek"; }
        if(element.dzien  == 3) { element.dzien ="Środa"; }
        if(element.dzien  == 4) { element.dzien ="Czwartek"; }
        if(element.dzien  == 5) { element.dzien ="Piątek"; }
        element.ustawienia = "<button class='btn btn-primary btn-sm' type='button' onclick='e("+element.ustawienia+")'>przypisz klasę</button>";
       }

  var table = new Tabulator("#"+dataTable, {
    layout:"fitDataFill",
    footerElement:"<button>Custom Button</button>",
    height:"440px",
    data:obj, 
    groupBy:"dzien",
    groupStartOpen:false,
    columns:[
        {title:"id", field:"Pid", editor:"input"},
        {title:"Początek lekcji", field:"start", editor:"input"},
        {title:"Koniec lekcji", field:"koniec", editor:"input"},
        {title:"lekcja", field:"lekcja", editor:"input"},
        {title:"ustawienia",field:"ustawienia", formatter:"html",width:200},
    ],
    });

  });
  }

  if(a == "users") {
    links[0].classList.remove("active");
    links[1].classList.add("active");
    links[2].classList.remove("active");
    links[3].classList.remove("active");
    links[4].classList.remove("active");
    links[5].classList.remove("active");
    getJson("API/USERS").then(obj => {

    k = Object.keys(obj).map(function(key) {
         return { key: key, value: obj[key] };
       });
       for (const element of obj) {
        element.ustawienia = "<button class='btn btn-primary btn-sm' type='button' onclick='e("+element.ustawienia+")'>przypisz komputer</button>";
       }

  var table = new Tabulator("#"+dataTable, {
    layout:"fitDataFill",
    height:"440px",
    data:obj, 
    groupBy:"klasa",
    footerElement:"<button>Custom Button</button>",
    groupStartOpen:false,
    columns:[
        {title:"id", field:"id", editor:"input"},
        {title:"imie", field:"imie", editor:"input"},
        {title:"nazwisko", field:"nazwisko", editor:"input"},
        {title:"mail", field:"mail", editor:"input"},
        {title:"ustawienia",field:"ustawienia", formatter:"html",width:200},
    ],
    });

  });

  }
  if(a == "spr") {
    links[0].classList.remove("active");
    links[1].classList.remove("active");
    links[2].classList.remove("active");
    links[3].classList.remove("active");
    links[4].classList.add("active");
    links[5].classList.remove("active");
  }
  if(a == "dyz") {
    links[0].classList.remove("active");
    links[1].classList.remove("active");
    links[2].classList.remove("active");
    links[3].classList.remove("active");
    links[4].classList.remove("active");
    links[5].classList.add("active");
  }
}

function formatujDate(date) {
    const dniTygodnia = ['Niedziela', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobota'];

    const dzienTygodnia = dniTygodnia[date.getDay()];
    const godziny = dodajZero(date.getHours());
    const minuty = dodajZero(date.getMinutes());
    const sekundy = dodajZero(date.getSeconds());

    return `${dzienTygodnia} ${godziny}:${minuty}:${sekundy}`;
}

function dodajZero(cyfra) {
    return cyfra < 10 ? `0${cyfra}` : cyfra;
}

function czyMiedzyGodzinami(start, end) {
    const obecnaData = new Date();
    const obecnaGodzina = obecnaData.getHours();
    const obecneMinuty = obecnaData.getMinutes();
    const obecneSekundy = obecnaData.getSeconds();

    const [startGodzina, startMinuty] = start.split(':').map(Number);
    const [endGodzina, endMinuty] = end.split(':').map(Number);

    const czasStartowy = new Date();
    czasStartowy.setHours(startGodzina, startMinuty, 0);

    const czasKoncowy = new Date();
    czasKoncowy.setHours(endGodzina, endMinuty, 0);

    const obecnyCzas = new Date();
    obecnyCzas.setHours(obecnaGodzina, obecneMinuty, obecneSekundy);

    return obecnyCzas >= czasStartowy && obecnyCzas <= czasKoncowy;
}

function sekundyNaCzas(milisekundy) {
    const sekundy = Math.floor(milisekundy / 1000);
    const godziny = Math.floor(sekundy / 3600);
    const minuty = Math.floor((sekundy % 3600) / 60);
    const pozostaleSekundy = sekundy % 60;
    const formatGodzin = dodajZero(godziny);
    const formatMinut = dodajZero(minuty);
    const formatSekund = dodajZero(pozostaleSekundy);
    return `${formatGodzin}:${formatMinut}:${formatSekund}`;
}


function timer() {
  getJson("API/PLANS").then(obj => {
    t =  document.getElementById("timer");
  data = new Date();
  s= "";
    k = Object.keys(obj).map(function(key) {
         return { key: key, value: obj[key] };
       });
       for (const element of obj) {
        if (czyMiedzyGodzinami(element.start, element.koniec)) {
          const [godziny, minuty, sekundy] = element.koniec.split(':');
          const dataZCzasem = new Date();
          dataZCzasem.setHours(parseInt(godziny, 10), parseInt(minuty, 10), parseInt(sekundy, 10));
          s += " lekcja: "+ element.lekcja + " <br>do końca lekcji: <strong class='czas'> " + sekundyNaCzas(dataZCzasem -  data) + "</strong>";
          break;
        } 
  
       }

t.innerHTML = s ;

  });
}
setInterval(timer,2000);

</script>
</body>
</html>