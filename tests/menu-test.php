<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testpagina menu-items</title>
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
        [role="menu"] {margin: 0.5rem 0; padding-left: 1.5rem;}
        [role="menu"] li {min-height: 1.6em;}
        table {border-collapse: collapse; margin: 0.5rem 0;}
        th, td {border: 1px solid #5c6570; padding: 0.25rem 0.5rem; text-align: left; vertical-align: top;}
    </style>
</head>
<body>
    <header>
        <h1>Testpagina menu-items</h1>
        <div class="intro"><p>Testpagina voor de W3C ACT-regel m6b1q3 (Menuitem has non-empty accessible name), getoetst door de crawler van Cardan All-Access (versie 2026-11-05). Elk geval geeft een bekende uitkomst.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Uitleg</h2>
    <p>Elk geval staat in een eigen sectie, met de verwachte uitkomst erbij. Alle menu-items van één geval staan in een eigen menu. Elk menu-item heeft een uniek id (m1 tot en met m12), zodat het in de uitkomsten terug te vinden is. Sommige menu-items zijn met opzet leeg: die zijn het onderwerp van de test.</p>

    <nav aria-labelledby="inhoud">
        <h2 id="inhoud">Inhoud</h2>
        <ol>
            <li><a href="#geval-1">Geval 1: verwacht passed</a></li>
            <li><a href="#geval-2">Geval 2: verwacht passed</a></li>
            <li><a href="#geval-3">Geval 3: verwacht passed</a></li>
            <li><a href="#geval-4">Geval 4: verwacht failed</a></li>
            <li><a href="#geval-5">Geval 5: verwacht failed</a></li>
            <li><a href="#geval-6">Geval 6: verwacht failed</a></li>
            <li><a href="#geval-7">Geval 7: verwacht geen uitkomst</a></li>
            <li><a href="#geval-8">Geval 8: verwacht geen uitkomst</a></li>
            <li><a href="#geval-9">Geval 9: verwacht geen uitkomst</a></li>
            <li><a href="#overzicht">Overzicht van alle gevallen</a></li>
        </ol>
    </nav>

    <section id="geval-1">
        <h2>Geval 1: verwacht passed</h2>
        <p class="verwacht">Verwacht: m1 geeft passed. De naam komt uit de tekst "Nieuw".</p>
        <ul role="menu"><li role="menuitem" id="m1">Nieuw</li></ul>
    </section>

    <section id="geval-2">
        <h2>Geval 2: verwacht passed</h2>
        <p class="verwacht">Verwacht: m2 geeft passed. Het menu-item heeft geen tekst, de naam komt uit aria-label.</p>
        <ul role="menu"><li role="menuitem" id="m2" aria-label="Opslaan"></li></ul>
    </section>

    <section id="geval-3">
        <h2>Geval 3: verwacht passed</h2>
        <p class="verwacht">Verwacht: m3 geeft passed. Het menu-item heeft geen tekst, de naam komt via aria-labelledby uit het element lbl3.</p>
        <ul role="menu"><li role="menuitem" id="m3" aria-labelledby="lbl3"></li></ul>
        <p>Label voor geval 3: <span id="lbl3">Afdrukken</span></p>
    </section>

    <section id="geval-4">
        <h2>Geval 4: verwacht failed</h2>
        <p class="verwacht">Verwacht: m4 geeft failed. Het menu-item is leeg.</p>
        <ul role="menu"><li role="menuitem" id="m4"></li></ul>
    </section>

    <section id="geval-5">
        <h2>Geval 5: verwacht failed</h2>
        <p class="verwacht">Verwacht: m5 geeft failed. Het menu-item bevat alleen spaties.</p>
        <ul role="menu"><li role="menuitem" id="m5">     </li></ul>
    </section>

    <section id="geval-6">
        <h2>Geval 6: verwacht failed</h2>
        <p class="verwacht">Verwacht: m6 geeft failed. Het lege menu-item staat met CSS buiten beeld, maar is niet verborgen voor hulpsoftware.</p>
        <ul role="menu"><li role="menuitem" id="m6" style="position:absolute; left:-9999px"></li></ul>
    </section>

    <section id="geval-7">
        <h2>Geval 7: verwacht geen uitkomst</h2>
        <p class="verwacht">Verwacht: geen uitkomst voor m7 en m8 (inapplicable). Ze hebben een andere rol dan menuitem.</p>
        <ul role="menu"><li role="menuitemcheckbox" id="m7"></li><li role="menuitemradio" id="m8"></li></ul>
    </section>

    <section id="geval-8">
        <h2>Geval 8: verwacht geen uitkomst</h2>
        <p class="verwacht">Verwacht: geen uitkomst voor m9, m10 en m11 (inapplicable). De lege menu-items zijn verborgen.</p>
        <ul role="menu"><li role="menuitem" id="m9" style="display:none"></li><li role="menuitem" id="m10" style="visibility:hidden"></li><li role="menuitem" id="m11" aria-hidden="true"></li></ul>
    </section>

    <section id="geval-9">
        <h2>Geval 9: verwacht geen uitkomst</h2>
        <p class="verwacht">Verwacht: geen uitkomst voor m12 (inapplicable). De regel geldt alleen voor HTML-elementen, en m12 is een SVG-element.</p>
        <div role="menu"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><g role="menuitem" id="m12"></g></svg></div>
    </section>

    <h2 id="overzicht">Overzicht van alle gevallen</h2>
    <table>
        <thead>
            <tr><th scope="col">Geval</th><th scope="col">Id</th><th scope="col">Wat er staat</th><th scope="col">Verwachte uitkomst</th></tr>
        </thead>
        <tbody>
            <tr><td>1</td><td>m1</td><td>menuitem met tekst "Nieuw"</td><td>passed</td></tr>
            <tr><td>2</td><td>m2</td><td>menuitem zonder tekst, met aria-label="Opslaan"</td><td>passed</td></tr>
            <tr><td>3</td><td>m3</td><td>menuitem zonder tekst, met aria-labelledby="lbl3" (span met tekst "Afdrukken")</td><td>passed</td></tr>
            <tr><td>4</td><td>m4</td><td>leeg menuitem</td><td>failed</td></tr>
            <tr><td>5</td><td>m5</td><td>menuitem met alleen spaties</td><td>failed</td></tr>
            <tr><td>6</td><td>m6</td><td>leeg menuitem buiten beeld (position:absolute; left:-9999px)</td><td>failed</td></tr>
            <tr><td>7</td><td>m7</td><td>leeg menuitemcheckbox</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>7</td><td>m8</td><td>leeg menuitemradio</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>8</td><td>m9</td><td>leeg menuitem met display:none</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>8</td><td>m10</td><td>leeg menuitem met visibility:hidden</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>8</td><td>m11</td><td>leeg menuitem met aria-hidden="true"</td><td>geen uitkomst (inapplicable)</td></tr>
            <tr><td>9</td><td>m12</td><td>SVG-element g met role="menuitem", zonder naam</td><td>geen uitkomst (inapplicable)</td></tr>
        </tbody>
    </table>

    </main>
</body>
</html>
