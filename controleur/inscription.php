<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/creation.inc.php";

$titre = "Créer un compte";

createUser(); //VARIABLES A REMPLIR SVPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP


include("$racine/vue/entete.html.php");
include("$racine/vue/pied.html.php");
include("$racine/vue/");

?>