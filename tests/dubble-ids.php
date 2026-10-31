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
    <title>Dubbele id-verwijzingen</title>
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


        .testcase {
            margin: 1.5rem 0;
            padding: 1rem 1rem 1rem 1.25rem;
            border-left: 0.4rem solid #5c6570;
            border-radius: 0 6px 6px 0;
            background: #f7f8f9;
        }

        .testcase h2 {
            counter-increment: h2;
            margin-top: 0;
        }

        .testcase h2::before { content: counter(h2) '. '; }

        .testcase--failed {
            border-left-color: #9b2331;
            background: #fdf6f6;
        }

        .testcase--failed h2 { color: #6e1520; }

        .testcase--passed {
            border-left-color: #1d6b3a;
            background: #f4faf6;
        }

        .testcase--passed h2 { color: #0f4d28; }

        .testcase--quiet {
            border-left-color: #5c6570;
            background: #f6f7f8;
        }

        .testcase--quiet h2 { color: #243040; }

        .expectation {
            display: inline-block;
            margin: 0 0.4rem 0 0;
            padding: 0.1rem 0.5rem;
            font-size: 0.8rem;
            font-weight: 700;
            line-height: 1.4;
            border-radius: 4px;
            vertical-align: baseline;
        }

        .testcase .expectation {
            display: block;
            width: fit-content;
            margin: 0 0 0.75rem;
            font-size: 0.95rem;
        }

        .is-failed .expectation,
        .testcase--failed .expectation {
            color: #6e1520;
            background: #f3d4d8;
        }

        .is-passed .expectation,
        .testcase--passed .expectation {
            color: #0f4d28;
            background: #d4edd9;
        }

        .is-quiet .expectation,
        .testcase--quiet .expectation {
            color: #243040;
            background: #e2e6ea;
        }

        span[id]{display:none;}

        .testcase form,
        .testcase p {
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>Dubbele id-verwijzingen</h1>
        <div class="intro"><p>Testpagina voor cardan-id-reference-unique: list en form, plus aria-labelledby en andere id-verwijzingen. Dubbele verwijzing naar een uniek id is goed. Een dubbel id waarnaar verwezen wordt is fout.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('<input list="x">');?> wijst naar twee <?php sanitize('<datalist id="x">');?></dt>
            <dd>cardan-id-reference-unique — verwacht: failed op de input</dd>
        </div>
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('<button form="f">');?> wijst naar twee <?php sanitize('<form id="f">');?></dt>
            <dd>cardan-id-reference-unique — verwacht: failed op de button</dd>
        </div>
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('<label for="mail">');?> wijst naar twee <?php sanitize('<input id="mail">');?></dt>
            <dd>cardan-id-reference-unique — verwacht: failed op het label</dd>
        </div>
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('aria-labelledby="titel status"');?> waarvan status twee keer bestaat</dt>
            <dd>cardan-id-reference-unique — verwacht: failed op de button. Eén gedeeld id in de lijst is genoeg.</dd>
        </div>
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('aria-describedby="regel"');?> wijst naar twee elementen</dt>
            <dd>cardan-id-reference-unique — verwacht: failed op de input</dd>
        </div>
        <div class="is-failed">
            <dt><span class="expectation">Failed</span> <?php sanitize('aria-errormessage="bedrag-fout"');?> wijst naar twee elementen</dt>
            <dd>cardan-id-reference-unique — verwacht: failed op de input. Dit attribuut is één id, geen lijst.</dd>
        </div>
        <div class="is-passed">
            <dt><span class="expectation">Passed</span> <?php sanitize('aria-labelledby="plan-naam plan-prijs"');?> wijst naar twee unieke id's</dt>
            <dd>cardan-id-reference-unique — verwacht: passed op de button</dd>
        </div>
        <div class="is-passed">
            <dt><span class="expectation">Passed</span> Twee buttons met <?php sanitize('aria-labelledby="uitleg"');?> naar hetzelfde unieke id</dt>
            <dd>cardan-id-reference-unique — verwacht: passed op beide buttons. Dubbele verwijzing mag.</dd>
        </div>
        <div class="is-passed">
            <dt><span class="expectation">Passed</span> <?php sanitize('aria-errormessage="bedrag-fout bedrag-hint"');?> is één id</dt>
            <dd>cardan-id-reference-unique — verwacht: passed. De spatie maakt er geen lijst van, ook al bestaat bedrag-fout twee keer.</dd>
        </div>
        <div class="is-quiet">
            <dt><span class="expectation">Geen melding</span> Twee <?php sanitize('<p id="los">');?> waar niets naar wijst</dt>
            <dd>cardan-id-reference-unique — de regel kijkt hier niet naar. Een id waar niets naar wijst valt erbuiten.</dd>
        </div>
    </dl>

    <div class="testcase testcase--failed">
        <h2>Failed — input list="x" met twee datalist id="x"</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>De input verwijst met list naar id x. Twee datalist-elementen dragen dat id.</p>
        <label>
            Stad
            <input list="x" name="stad">
        </label>
        <datalist id="x">
            <option value="Utrecht">
            <option value="Arnhem">
        </datalist>
        <datalist id="x">
            <option value="Groningen">
            <option value="Maastricht">
        </datalist>
    </div>

    <div class="testcase testcase--failed">
        <h2>Failed — button form="f" met twee form id="f"</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>De knop staat buiten de formulieren en verwijst met form naar id f. Twee form-elementen dragen dat id.</p>
        <button type="button" form="f">Verstuur</button>
        <form id="f" action="/tests/dubble-ids.php" method="get">
            <p>Eerste formulier.</p>
        </form>
        <form id="f" action="/tests/dubble-ids.php" method="get">
            <p>Tweede formulier.</p>
        </form>
    </div>

    <div class="testcase testcase--failed">
        <h2>Failed — label for="mail" met twee input id="mail"</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>Het label verwijst naar id mail. Twee input-elementen dragen dat id.</p>
        <label for="mail">E-mail</label>
        <input id="mail" type="email" name="mail-a" autocomplete="off">
        <input id="mail" type="email" name="mail-b" autocomplete="off">
    </div>

    <div class="testcase testcase--failed">
        <h2>Failed — aria-labelledby met één gedeeld id in de lijst</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>titel bestaat één keer. status bestaat twee keer. Eén gedeeld id in de lijst is een fout op de button.</p>
        <p id="titel">Bestelling 1234</p>
        <p id="status">Verzonden</p>
        <p id="status">Betaald</p>
        <button type="button" aria-labelledby="titel status">Details</button>
    </div>

    <div class="testcase testcase--failed">
        <h2>Failed — aria-describedby naar een dubbel id</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>De input verwijst naar id regel. Twee alinea's dragen dat id.</p>
        <label>
            Wachtwoord
            <input type="password" name="wachtwoord" autocomplete="off" aria-describedby="regel">
        </label>
        <p id="regel" hidden>Minstens acht tekens.</p>
        <p id="regel">Minstens twaalf tekens.</p>
    </div>

    <div class="testcase testcase--failed">
        <h2>Failed — aria-errormessage naar een dubbel id</h2>
        <p class="expectation">Verwacht: failed</p>
        <p>aria-errormessage is één id, geen lijst. bedrag-fout bestaat twee keer, dus de input faalt.</p>
        <label>
            Bedrag
            <input type="text" name="bedrag" autocomplete="off" aria-invalid="true" aria-errormessage="bedrag-fout">
        </label>
        <p id="bedrag-fout">Alleen hele euro's.</p>
        <p id="bedrag-fout">Het bedrag is te hoog.</p>
    </div>

    <div class="testcase testcase--passed">
        <h2>Passed — aria-labelledby naar twee unieke id's</h2>
        <p class="expectation">Verwacht: passed</p>
        <p>Een lijst van id's mag. plan-naam en plan-prijs bestaan allebei één keer.</p>
        <p id="plan-naam">Basisabonnement</p>
        <p id="plan-prijs">10 euro per maand</p>
        <button type="button" aria-labelledby="plan-naam plan-prijs">Kies</button>
    </div>

    <div class="testcase testcase--passed">
        <h2>Passed — twee elementen verwijzen naar hetzelfde unieke id</h2>
        <p class="expectation">Verwacht: passed</p>
        <p>uitleg bestaat één keer. Twee buttons mogen naar datzelfde id verwijzen.</p>
        <p id="uitleg">Vraag het aan de balie.</p>
        <button type="button" aria-labelledby="uitleg">Hulp bij het formulier</button>
        <button type="button" aria-labelledby="uitleg">Hulp bij de betaling</button>
    </div>

    <div class="testcase testcase--passed">
        <h2>Passed — aria-errormessage met een spatie is één id</h2>
        <p class="expectation">Verwacht: passed</p>
        <p>De waarde bedrag-fout bedrag-hint is één id. Dat id heeft geen element, ook al bestaat bedrag-fout twee keer op deze pagina.</p>
        <label>
            Ander bedrag
            <input type="text" name="ander-bedrag" autocomplete="off" aria-invalid="true" aria-errormessage="bedrag-fout bedrag-hint">
        </label>
        <p id="bedrag-hint">Zonder centen.</p>
    </div>

    <div class="testcase testcase--quiet">
        <h2>Geen melding — dubbel id waar niets naar wijst</h2>
        <p class="expectation">Verwacht: geen melding</p>
        <p>Twee alinea's delen id los. Geen label, list, form of ARIA-attribuut wijst ernaar. Deze regel meldt dat niet.</p>
        <p id="los">Thee uit de heuvels.</p>
        <p id="los">Koffie van de kust.</p>
    </div>

    </main>
</body>
</html>
