<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Headers-test crawler</title>
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
        table {border-collapse: collapse; margin: 0.5rem 0;}
        th, td {border: 1px solid #5c6570; padding: 0.25rem 0.5rem; text-align: left;}
    </style>
</head>
<body>
    <header>
        <h1>Headers-test crawler</h1>
        <div class="intro"><p>Testpagina voor de crawlerregel id-reference-unique (versie 2026-11-03): zijn de ids in het attribuut headers van een tabelcel uniek op de pagina? Alle gegevens zijn verzonnen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Uitleg</h2>
    <p>Elk geval staat in een eigen sectie, met de verwachte uitkomst erbij. Sommige gevallen bevatten met opzet een dubbele id of een attribuut headers op een element dat geen cel is. Die fouten in de HTML zijn het onderwerp van de test.</p>

    <nav aria-labelledby="inhoud">
        <h2 id="inhoud">Inhoud</h2>
        <ol>
            <li><a href="#geval-1">1 · Failed: dubbele id in headers</a></li>
            <li><a href="#geval-2">2 · Passed: unieke ids</a></li>
            <li><a href="#geval-3">3 · Passed: tabs en extra spaties</a></li>
            <li><a href="#geval-4">4 · Failed: id gedeeld met element buiten de tabel</a></li>
            <li><a href="#geval-5">5 · Niet beoordeeld: headers op element dat geen cel is</a></li>
            <li><a href="#geval-6">6 · Niet beoordeeld: headers leeg of alleen witruimte</a></li>
            <li><a href="#geval-7">7 · Failed: th met headers en gedeelde id</a></li>
        </ol>
    </nav>

    <section id="geval-1">
        <h2>1 · Failed: twee th met dezelfde id</h2>
        <p class="verwacht">Verwacht: de td geeft failed, met de drie th als verwezen elementen (de twee met h1 eerst).</p>
        <table><tr><th id="h1">Prijs</th><th id="y1">Jaar</th><th id="h1">Prijs met btw</th></tr>
        <tr><td headers="y1 h1">10</td></tr></table>
    </section>

    <section id="geval-2">
        <h2>2 · Passed: alle ids in headers zijn uniek</h2>
        <p class="verwacht">Verwacht: passed.</p>
        <table><tr><th id="p2">Product</th><th id="q2">Aantal</th></tr><tr><td headers="p2 q2">Appel</td></tr></table>
    </section>

    <section id="geval-3">
        <h2>3 · Passed: een lijst met tabs en extra spaties</h2>
        <p class="verwacht">Verwacht: passed.</p>
        <table><tr><th id="a3">A</th><th id="b3">B</th></tr><tr><td headers="  a3	 b3 ">x</td></tr></table>
    </section>

    <section id="geval-4">
        <h2>4 · Failed: een id in headers wordt gedeeld met een element buiten de tabel</h2>
        <p class="verwacht">Verwacht: failed.</p>
        <p id="x4">Tekst buiten de tabel</p>
        <table><tr><th id="x4">Kop</th></tr><tr><td headers="x4">waarde</td></tr></table>
    </section>

    <section id="geval-5">
        <h2>5 · Niet beoordeeld: headers op een element dat geen cel is</h2>
        <p class="verwacht">Verwacht: geen uitkomst van deze regel voor deze elementen.</p>
        <table headers="h1"><caption headers="h1">Bijschrift</caption><tr headers="h1"><td>1</td></tr></table>
        <div headers="h1">Div</div>
    </section>

    <section id="geval-6">
        <h2>6 · Niet beoordeeld: headers met alleen witruimte of leeg</h2>
        <p class="verwacht">Verwacht: geen uitkomst van deze regel voor deze cellen.</p>
        <table><tr><td headers="   ">1</td><td headers="">2</td></tr></table>
    </section>

    <section id="geval-7">
        <h2>7 · Een th die zelf headers heeft, met een gedeelde id</h2>
        <p class="verwacht">Verwacht: de th met headers geeft failed.</p>
        <table><tr><th id="k7">Kop 1</th><th id="k7">Kop 2</th></tr><tr><th headers="k7">Rijkop</th><td>v</td></tr></table>
    </section>

    </main>
</body>
</html>
