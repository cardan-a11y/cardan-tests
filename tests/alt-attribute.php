<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testpagina alt-attribuut bij afbeeldingsknoppen</title>
    <style>
        body {
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
        nav a {color: oklch(46% .06 315);}
        section {
            margin: 1.5rem 0;
            padding: 1rem 1rem 1rem 1.25rem;
            border-left: 0.4rem solid #9b2331;
            border-radius: 0 6px 6px 0;
            background: #fdf6f6;
        }
        section h2 {margin-top: 0; font-size: 1.2rem; color: #6e1520;}
        .verwacht {
            display: block;
            width: fit-content;
            margin: 0 0 0.75rem;
            padding: 0.1rem 0.5rem;
            font-size: 0.95rem;
            font-weight: 700;
            color: #243040;
            background: #e2e6ea;
            border-radius: 4px;
        }
        input[type="image"] {width: 48px; height: 48px; vertical-align: middle;}
        table {border-collapse: collapse; margin: 0.5rem 0;}
        th, td {border: 1px solid #5c6570; padding: 0.25rem 0.5rem; text-align: left; vertical-align: top;}
        code {background: #f1f1f1; padding: 0 0.2rem;}
    </style>
</head>
<body>
    <header>
        <h1>Testpagina alt-attribuut bij afbeeldingsknoppen</h1>
        <div class="intro"><p>Testpagina voor de W3C ACT-regel 59796f (Image button has non-empty accessible name), getoetst door de crawler van Cardan All-Access (versie 2026-11-10). Elk geval geeft een bekende uitkomst.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Uitleg</h2>
    <p>Een afbeeldingsknop (<code>&lt;input type="image"&gt;</code>) heeft een toegankelijke naam nodig. Zonder naam is niet duidelijk wat de knop doet voor een schermlezergebruiker. De naam komt meestal uit het alt-attribuut, maar kan ook uit aria-label, aria-labelledby of title komen. De standaardnaam die een browser zelf invult (zoals "Verzenden" of "Submit") telt voor deze regel niet mee.</p>
    <p>Elk geval staat in een eigen sectie, met de verwachte uitkomst erbij. Elke knop heeft een uniek id (a1 tot en met a16), zodat hij in de uitkomsten terug te vinden is. Alle knoppen staan in formulieren die niets versturen. Sommige knoppen zijn met opzet zonder naam: die zijn het onderwerp van de test.</p>

    <nav aria-labelledby="inhoud">
        <h2 id="inhoud">Inhoud</h2>
        <ol>
            <li><a href="#geval-1">Geval 1: verwacht passed (alt)</a></li>
            <li><a href="#geval-2">Geval 2: verwacht passed (aria-label)</a></li>
            <li><a href="#geval-3">Geval 3: verwacht passed (aria-labelledby)</a></li>
            <li><a href="#geval-4">Geval 4: verwacht passed (title)</a></li>
            <li><a href="#geval-5">Geval 5: verwacht passed (leeg alt met aria-label)</a></li>
            <li><a href="#geval-6">Geval 6: verwacht passed (bestandsnaam als alt)</a></li>
            <li><a href="#geval-7">Geval 7: verwacht failed (geen alt)</a></li>
            <li><a href="#geval-8">Geval 8: verwacht failed (leeg alt)</a></li>
            <li><a href="#geval-9">Geval 9: verwacht failed (alt met alleen spaties)</a></li>
            <li><a href="#geval-10">Geval 10: verwacht failed (aria-labelledby naar onbekend id)</a></li>
            <li><a href="#geval-11">Geval 11: verwacht failed (leeg aria-label)</a></li>
            <li><a href="#geval-12">Geval 12: verwacht geen uitkomst (verborgen knoppen)</a></li>
            <li><a href="#geval-13">Geval 13: verwacht geen uitkomst (andere elementen)</a></li>
            <li><a href="#overzicht">Overzicht van alle gevallen</a></li>
        </ol>
    </nav>

    <section id="geval-1">
        <h2>Geval 1: verwacht passed (alt)</h2>
        <p class="verwacht">Verwacht: a1 geeft passed. De naam komt uit alt="Zoeken".</p>
        <form action="#geval-1" onsubmit="return false"><input type="image" id="a1" src="knop.png" alt="Zoeken"></form>
    </section>

    <section id="geval-2">
        <h2>Geval 2: verwacht passed (aria-label)</h2>
        <p class="verwacht">Verwacht: a2 geeft passed. De knop heeft geen alt, de naam komt uit aria-label.</p>
        <form action="#geval-2" onsubmit="return false"><input type="image" id="a2" src="knop.png" aria-label="Zoeken"></form>
    </section>

    <section id="geval-3">
        <h2>Geval 3: verwacht passed (aria-labelledby)</h2>
        <p class="verwacht">Verwacht: a3 geeft passed. De knop heeft geen alt, de naam komt via aria-labelledby uit het element lbl3.</p>
        <form action="#geval-3" onsubmit="return false"><input type="image" id="a3" src="knop.png" aria-labelledby="lbl3"></form>
        <p>Label voor geval 3: <span id="lbl3">Zoeken op de website</span></p>
    </section>

    <section id="geval-4">
        <h2>Geval 4: verwacht passed (title)</h2>
        <p class="verwacht">Verwacht: a4 geeft passed. De knop heeft geen alt, de naam komt uit title.</p>
        <form action="#geval-4" onsubmit="return false"><input type="image" id="a4" src="knop.png" title="Zoeken"></form>
    </section>

    <section id="geval-5">
        <h2>Geval 5: verwacht passed (leeg alt met aria-label)</h2>
        <p class="verwacht">Verwacht: a5 geeft passed. Het alt is leeg, maar aria-label geeft een naam.</p>
        <form action="#geval-5" onsubmit="return false"><input type="image" id="a5" src="knop.png" alt="" aria-label="Zoeken"></form>
    </section>

    <section id="geval-6">
        <h2>Geval 6: verwacht passed (bestandsnaam als alt)</h2>
        <p class="verwacht">Verwacht: a6 geeft passed. De naam "knop.png" is niet leeg, dus de regel slaagt. De naam beschrijft het doel van de knop niet: dat toetst deze regel niet, daarvoor is een handmatige controle nodig (WCAG 1.1.1 en 2.4.6).</p>
        <form action="#geval-6" onsubmit="return false"><input type="image" id="a6" src="knop.png" alt="knop.png"></form>
    </section>

    <section id="geval-7">
        <h2>Geval 7: verwacht failed (geen alt)</h2>
        <p class="verwacht">Verwacht: a7 geeft failed. De knop heeft geen alt en ook geen andere naam.</p>
        <form action="#geval-7" onsubmit="return false"><input type="image" id="a7" src="knop.png"></form>
    </section>

    <section id="geval-8">
        <h2>Geval 8: verwacht failed (leeg alt)</h2>
        <p class="verwacht">Verwacht: a8 geeft failed. Het alt is leeg. Bij een afbeeldingsknop maakt een leeg alt de knop niet decoratief.</p>
        <form action="#geval-8" onsubmit="return false"><input type="image" id="a8" src="knop.png" alt=""></form>
    </section>

    <section id="geval-9">
        <h2>Geval 9: verwacht failed (alt met alleen spaties)</h2>
        <p class="verwacht">Verwacht: a9 geeft failed. Het alt bevat alleen spaties, de naam is daardoor leeg.</p>
        <form action="#geval-9" onsubmit="return false"><input type="image" id="a9" src="knop.png" alt="   "></form>
    </section>

    <section id="geval-10">
        <h2>Geval 10: verwacht failed (aria-labelledby naar onbekend id)</h2>
        <p class="verwacht">Verwacht: a10 geeft failed. aria-labelledby verwijst naar een id dat niet bestaat.</p>
        <form action="#geval-10" onsubmit="return false"><input type="image" id="a10" src="knop.png" aria-labelledby="bestaat-niet"></form>
    </section>

    <section id="geval-11">
        <h2>Geval 11: verwacht failed (leeg aria-label)</h2>
        <p class="verwacht">Verwacht: a11 geeft failed. Het alt is leeg en het aria-label ook.</p>
        <form action="#geval-11" onsubmit="return false"><input type="image" id="a11" src="knop.png" alt="" aria-label=""></form>
    </section>

    <section id="geval-12">
        <h2>Geval 12: verwacht geen uitkomst (verborgen knoppen)</h2>
        <p class="verwacht">Verwacht: geen uitkomst voor a12, a13 en a14 (inapplicable). De knoppen zonder naam zijn verborgen voor iedereen of voor hulpsoftware.</p>
        <form action="#geval-12" onsubmit="return false">
            <input type="image" id="a12" src="knop.png" style="display:none">
            <input type="image" id="a13" src="knop.png" style="visibility:hidden">
            <input type="image" id="a14" src="knop.png" aria-hidden="true" tabindex="-1">
        </form>
    </section>

    <section id="geval-13">
        <h2>Geval 13: verwacht geen uitkomst (andere elementen)</h2>
        <p class="verwacht">Verwacht: geen uitkomst voor a15 en a16 (inapplicable). De regel geldt alleen voor input type="image". a15 is een button met een afbeelding erin, a16 is een gewone afbeelding zonder alt.</p>
        <form action="#geval-13" onsubmit="return false"><button type="submit" id="a15"><img src="knop.png" alt="Zoeken" width="48" height="48"></button></form>
        <p><img id="a16" src="knop.png" width="48" height="48"></p>
    </section>

    <h2 id="overzicht">Overzicht van alle gevallen</h2>
    <table>
        <thead>
            <tr><th scope="col">Geval</th><th scope="col">Id</th><th scope="col">Wat er staat</th><th scope="col">Verwachte uitkomst</th></tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>a1</td><td>input type="image" met alt="Zoeken"</td><td>passed</td></tr>
            <tr><td>2</td><td>a2</td><td>input type="image" zonder alt, met aria-label="Zoeken"</td><td>passed</td></tr>
            <tr><td>3</td><td>a3</td><td>input type="image" zonder alt, met aria-labelledby="lbl3" (span met tekst "Zoeken op de website")</td><td>passed</td></tr>
            <tr><td>4</td><td>a4</td><td>input type="image" zonder alt, met title="Zoeken"</td><td>passed</td></tr>
            <tr><td>5</td><td>a5</td><td>input type="image" met alt="" en aria-label="Zoeken"</td><td>passed</td></tr>
            <tr><td>6</td><td>a6</td><td>input type="image" met alt="knop.png"</td><td>passed (naam niet beschrijvend, handmatig toetsen)</td></tr>
            <tr><td>7</td><td>a7</td><td>input type="image" zonder alt</td><td>failed</td></tr>
            <tr><td>8</td><td>a8</td><td>input type="image" met alt=""</td><td>failed</td></tr>
            <tr><td>9</td><td>a9</td><td>input type="image" met alt="   " (alleen spaties)</td><td>failed</td></tr>
            <tr><td>10</td><td>a10</td><td>input type="image" met aria-labelledby="bestaat-niet"</td><td>failed</td></tr>
            <tr><td>11</td><td>a11</td><td>input type="image" met alt="" en aria-label=""</td><td>failed</td></tr>
            <tr><td>12</td><td>a12</td><td>input type="image" zonder alt, met display:none</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>12</td><td>a13</td><td>input type="image" zonder alt, met visibility:hidden</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>12</td><td>a14</td><td>input type="image" zonder alt, met aria-hidden="true" en tabindex="-1"</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>13</td><td>a15</td><td>button met img alt="Zoeken"</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>13</td><td>a16</td><td>img zonder alt</td><td>geen uitkomst (inapplicable)</td></tr>
        </tbody>
    </table>

    </main>
</body>
</html>
