<?php 
    function sanitize($contents) {
        echo '<code><pre>'.htmlspecialchars($contents).'</pre></code>';
    }
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lijsten</title>
    <style>
        body {
            counter-reset: h2;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #eee;
            color: #333;
        }
        header {
            background: oklch(46% .06 315);
            color: #fff;
            padding: 1rem 2rem;
            text-align: center;
        }

        header a {color:#fff;}
        header a:hover,header a:focus {color:#eee;}
        main {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        dl {
            margin: 0;
            padding: 0;
        }
        dt {
            font-weight: bold;
        }
        dt a {
            color: oklch(46% .06 315);
        }

        dt a:hover,dt a:focus {
            color: oklch(54.59% .144 151.89)
        }
        dt a:hover {
            text-decoration: underline;
        }
        dd {
            margin: 0 0 2em 0;
            color: #555;
        }

        dd > p {margin:0;}

        dl.tests {margin-left:1.5em;}
        dl.tests > div {display: list-item;
    list-style-type: disc;}
        dl.tests code pre {display:inline-block;margin:0;}
        dl.tests dd {font-size:0.8em;color:#666;}


        .testcase h2 {
        counter-increment: h2;
        }

        .testcase h2::before { content: counter(h2) '. '; }

        span[id]{display:none;}
    </style>
</head>
<body>

<header>
    <h1>Semantische lijsten en nep-lijsten</h1>
    <div class="intro">
        <p>Deze pagina toont goede lijsten met ul/ol en foute lijsten die alleen met tekens lijken op een lijst.</p>
    </div>
    <p><a href="/index.php">Terug naar overzicht</a></p>
</header>
<main>
    <section>
        <h2>Goed voorbeeld: ongeordende lijst met ul</h2>
        <p>Goed voorbeeld</p>
        <p>Benodigdheden voor een dagje uit:</p>
        <ul>
            <li>Waterfles</li>
            <li>Zonnebrand</li>
            <li>OV-kaart</li>
            <li>Oplader</li>
        </ul>
    </section>

    <section>
        <h2>Goed voorbeeld: geordende lijst met ol</h2>
        <p>Goed voorbeeld</p>
        <p>Stappen om een account aan te maken:</p>
        <ol>
            <li>Vul je e-mailadres in.</li>
            <li>Kies een wachtwoord.</li>
            <li>Accepteer de voorwaarden.</li>
            <li>Klik op “Account maken”.</li>
        </ol>
    </section>

    <section>
        <h2>Goed voorbeeld: lijst met kop en items samen</h2>
        <p>Goed voorbeeld</p>
        <h3>Veelgestelde vragen</h3>
        <ul>
            <li>Hoe reset ik mijn wachtwoord?</li>
            <li>Waar kan ik mijn facturen vinden?</li>
            <li>Hoe neem ik contact op met support?</li>
        </ul>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met min-tekens</h2>
        <p>Fout voorbeeld</p>
        <p>Benodigdheden voor een dagje uit:</p>
        <p>- Waterfles<br>- Zonnebrand<br>- OV-kaart<br>- Oplader</p>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met een bullet-teken</h2>
        <p>Fout voorbeeld</p>
        <p>Stappen om een account aan te maken:</p>
        <p>• Vul je e-mailadres in.<br>• Kies een wachtwoord.<br>• Accepteer de voorwaarden.<br>• Klik op “Account maken”.</p>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met sterretjes</h2>
        <p>Fout voorbeeld</p>
        <p>Wat je moet meenemen:</p>
        <p>* Waterfles<br>* Zonnebrand<br>* OV-kaart<br>* Oplader</p>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met plusjes</h2>
        <p>Fout voorbeeld</p>
        <p>Checklist voor verzending:</p>
        <p>+ Pakbon printen<br>+ Product controleren<br>+ Doos sluiten<br>+ Label plakken</p>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met pijltjes</h2>
        <p>Fout voorbeeld</p>
        <p>Taken voor vandaag:</p>
        <p>→ Mail beantwoorden<br>→ Document uploaden<br>→ Afspraak plannen</p>
    </section>

    <section>
        <h2>Fout voorbeeld: lijst met zelfgemaakte nummering</h2>
        <p>Fout voorbeeld</p>
        <p>Stappen om je profiel bij te werken:</p>
        <p>1) Naam aanpassen<br>2) Profielfoto uploaden<br>3) Opslaan</p>
    </section>
</main>

</body>
</html>