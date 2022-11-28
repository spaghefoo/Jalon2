// Fichier crée par sofiane

var stre = "";
var auto = document.querySelector('#auto');
var xxx = document.getElementsByClassName('xxx');
elemente = document.getElementById('elements');





//sofiane - permet de recuperer la valeur de du champ et de mettre les valeurs...
function autoComplete(input)
{

    input.addEventListener('input', function(e)
    {

        //s- on recup la veleurs
        let value = input[0].value;
        stre = value;

        console.log(stre);  
        // on clean
        deleteEverything();
        // puis on affiche
        for(let i = 0; i < array.length; i++) // pour la valeur complete qu'on recup
        {
            if(array[i][0].toUpperCase().includes(stre.toUpperCase())) // on met en majuscules comme ça peut importe si c'est majuscule ou minuscule
            //(includes est sensible à la casse.)
            {
                // on cree etc...(flemme d'expliquer c'est chiant mais en gros on place les elements dans la div a la suite)
                let element = document.createElement('b');
                element.innerHTML = '<br />'+array[i][0]+'<br />';
                element.className    = 'xxx';
                document.getElementById('elements').appendChild(element);           
            }
        }
    });
}

// Permet de clean la div avant de reafficher
function deleteEverything()
{
    //s - Supprimer tous les premiers elements de la liste jusqu'a ce qui en a plus
 while(document.getElementById('elements').hasChildNodes())
 {
    document.getElementById('elements').removeChild(document.getElementById('elements').firstChild);
 }
}

// sofiane - Fonction qui permet de recuperer la listes des secteurs...(ou traversées plus tar)
function req()
{
    // Recupere le fichier en XMLHTTPrequest
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            array2 = JSON.parse(this.responseText);
            console.log(array2);
        }
    }; 
    xhttp.open("GET", "./modele/search.inc.php", false);
    xhttp.send();

    return array2;
}

//let array = ['1', '2', '3'];
let array = req();
