// Fichier crée par sofiane

var stre = "";
var suggestion = document.getElementsByClassName('suggestion');





//sofiane - permet de recuperer la valeur de du champ et de mettre les valeurs...
function autoComplete(input)
{
    // sofiane - definition des variables
    var elemente = document.getElementById('elements');


    input.addEventListener('input', function(e)
    {

        //s- on recup la valeurs

        // DEFINITION DES VARIABLES
        var value = input[0].value;
        var stretrim = value.toUpperCase().trim();
        //console.log(value);  
        // on clean
        deleteEverything();
        // on met la valeur en majuscule et on retire les espaces.
        // puis on affiche
        for(let i = 0; i < array.length; i++) // pour la valeur complete qu'on recup
        {
            if(array[i][0].toUpperCase().includes(stretrim)) // on met en majuscules comme ça peut importe si c'est majuscule ou minuscule
            //(includes est sensible à la casse.)
            {
                let element = document.createElement('b');
                // on cree etc...(flemme d'expliquer c'est chiant mais en gros on place les elements dans la div a la suite)
                element.innerHTML = '<br />'+array[i][0]+'<br />';
                element.className  = 'suggestion';
                element.name = array[i][0]; // on met l'attribut name a ce qu'on a mis tout à l'heure
                elemente.appendChild(element);  
                element.style.cursor = 'pointer';
                
                // si un de ces elements sont cliqués...
                element.addEventListener('click', function(e)
                {
                    SuggestClick(e); // on appelle cette fonction avec l'element qu'on a cliqué
                });
            }
        }
    });
}


function SuggestClick(element)
{
    // on recupere les champs texte
    var champ = document.querySelectorAll('input[type=text]');
    let target = element.target.name; // on recupere l'attribut name qu'on a mis précédemment
    //console.log(target);
    champ[0].value = target; // et on set la valeur du champ a celle du nom
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
