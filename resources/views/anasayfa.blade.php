<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


</head>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 15px;
    }

    .context-menu {
        display: none;
        position: absolute;
        z-index: 10;
    }

    .context-menu--active {
        display: block;
    }
</style>

<body>

<table>
    <?php

    for($i=0;$i<20; $i++){
        for($j=0;$j<10; $j++){
            $dizi[$i][$j]='';
        }
    }


    foreach($a as $kayit){
            $dizi[$kayit['satir']][$kayit['sutun']] = $kayit['veri'];
            $sid = $kayit['sid'];
    }

    echo"<div id=2>";
    for($i=0; $i<11; $i++){
        echo "<tr><td>$i</td>";
        for($j=0; $j<10; $j++)
            echo "<td width=150px onclick='degistir(this,$i,$j,$sid)'>{$dizi[$i][$j]}</td>";
        echo "</tr>";
    }

    echo"</div><table><tr id='1'>
    <td><a href='/sayfagoster/1' oncontextmenu='menu()' >sayfa1</a></td>
    <td><a href='/sayfagoster/2' oncontextmenu='menu()' >sayfa2</a></td>
    <td><a href='/sayfagoster/3' onclick=\"sayfaekle(3,1,'sayfa3')\">+</a></td>

    </tr></table>";

    ?>

</table>
<div id="20" class="context-menu">
<ul>
    <li>sil</li>
    <li>guncelle</li>
</ul>
</div>
<script>

    function menu(){
        document.getElementById("20").style.display = "block";
        var i = document.getElementById("20").style;
        i.visibility = "visible";
        var e = window.event;
        i.left = e.clientX;
        i.right = e.clientY;
            window.event.returnValue = false;
    }

    function degistir(td,i,j,sid){
        var aux = td.innerHTML;
        td.onclick=null;
        td.innerHTML="<input type=text value='"+aux+"' onblur='guncelle(this,"+i+","+j+","+sid+")'>";
    }
    function guncelle(input,i,j,sid){
        var td = input.parentNode;
        td.innerHTML = input.value;
        td.setAttribute('onclick',"degistir(this,"+i+","+j+","+sid+")");
        var x = new XMLHttpRequest(); // adim-1 nesne olustur
        x.onreadystatechange = function() { //adım-2: nesnenin onreadystatechange function'ı oluştur
            if (this.readyState == 4 && this.status == 200) {}
        };
        var tmp = "/kaydet/"+sid+"/"+i+"/"+j+"/"+input.value+"";
        x.open("GET", tmp, true); //adım-3: bağlantı ac
        x.send(); // adım-4: ajax isteği yap, (isteği gönder)

    }

    function sayfaekle(sid,did,sname){
        /*var x = new XMLHttpRequest(); // adim-1 nesne olustur
        x.onreadystatechange = function() { //adım-2: nesnenin onreadystatechange function'ı oluştur
            if (this.readyState == 4 && this.status == 200) {}
        };
        var tmp = "/sayfaekle/"+sid+"/"+did+"/"+sname+"";
        x.open("GET", tmp, true); //adım-3: bağlantı ac
        x.send(); // adım-4: ajax isteği yap, (isteği gönder)*/

        var td = document.createElement('TD'); td.innerHTML ="<a href=\"/sayfagoster/"+sid+"\">"+sname+"</a>";
        document.getElementById('1').appendChild(td);
        var div = document.getElementById('2');
        var parent =div.parentNode;
        parent.removeChild(div);

    }

</script>
</body>
</html>