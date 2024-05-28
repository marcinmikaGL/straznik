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
    body {
    background-color:#666;
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

  .sidebar a {
    padding: 10px;
    text-decoration: none;
    color: #ffffff;
  }

  .sidebar a.active {
    background-color: #007bff;
    color: #ffffff;
  }
  #tab { 
    border:1px solid #fff;
    border-radius:5px;
    width:100%;
  }
  #tab tr , #tab td {

    border:1px solid #fff;
    text-align:center;
  }
  header {
    padding:10px;
    margin-bottom:10px;
    min-height: 115px;
  }
  header h2 {
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
    right:0;
    padding:15px;
    text-align: right;
    width:50%;
    top:35px;
    margin-top:5px;
  }
  .content  {
    min-height: 450px;
  }
 .tabulator {
  border: 1px solid #fff;
  border-radius: 5px;
  }
  .czas {
    color:red;
  }
  </style>
</head>
<body>
  <header class="container-fluid bg-dark text-white">
  <img class="logo" src="https://www.zso5.gliwice.pl/wp-content/uploads/2014/06/logo3.png" alt="Zespół Szkół Ogólnokształcących nr 5 im. Armii Krajowej w Gliwicach">
  <h2>Aplikacja Pracownia</h2>  
  <div id="timer">
    </div>
  </header>

  <main class="container-fluid">
    <div class="row">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
        <div class="position-sticky">
          <ul class="nav flex-column">
      
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" onclick="strona('dash')" class="nav-link" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" onclick="strona('users')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Lista uczniów
        </a>
      </li>
      <li>
        <a href="#" onclick="strona('list')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Lista komputerów
        </a>
      </li>
      <li>
        <a href="#" onclick="strona('plan')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Plan lekcji
        </a>
      </li>
      <li>
        <a href="#" onclick="strona('spr')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Sprawdziany
        </a>
      </li>
      <li>
        <a href="#" onclick="strona('dyz')" class="nav-link text-white">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
          Dyżury
        </a>
      </li>
    </ul>
  </div>
    </nav>
      <div class="col-md-9 content">

      <table id="tab" class="table table-dark">
      </table>
  
       <div id="dataTable"></div>
      </div>    
    
    </div>
    </div>
  </main>

  <footer class="container-fluid bg-dark text-white">
    <p id="cr">Marcin Mika Copyright &copy; 2024</p>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>
const dataTable = "dataTable";
f =  document.getElementById("tab");
t =  document.getElementById(dataTable);
f.style.display= "none";
links = document.querySelectorAll("nav div ul li a");



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