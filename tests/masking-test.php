<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maskeertest crawler</title>
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
        nav ol {columns: 2; font-size: 0.9rem;}
        nav a {color: oklch(46% .06 315);}
        .groep {
            margin: 2.5rem 0 1rem;
            padding-bottom: 0.25rem;
            border-bottom: 2px solid oklch(46% .06 315);
        }
        section {
            margin: 1.5rem 0;
            padding: 1rem 1rem 1rem 1.25rem;
            border-left: 0.4rem solid #9b2331;
            border-radius: 0 6px 6px 0;
            background: #fdf6f6;
        }
        section h2 {margin-top: 0; font-size: 1.2rem; color: #6e1520;}
        .grens section {border-left-color: #8a5a00; background: #fdf9f0;}
        .grens section h2 {color: #5c3c00;}
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
        [contenteditable] {outline: 1px dashed #5c6570; padding: 0.25rem;}
    </style>
</head>
<body>
    <header>
        <h1>Maskeertest crawler</h1>
        <div class="intro"><p>Testpagina voor het maskeren van HTML in het bewijs van Cardan All-Access. Elk geval geeft een uitkomst failed in id-reference-unique, zodat het paneel de HTML van het doel en de verwezen elementen toont. Alle gegevens zijn verzonnen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Uitleg</h2>
    <p>De crawler toont bewijs alleen bij een uitkomst failed of cantTell. Daarom heeft elk geval een <strong>doel</strong>: een element met een verwijzing (aria-describedby, aria-labelledby, list, form of for) naar een id die twee keer voorkomt. De twee elementen met dat id zijn de <strong>verwezen elementen</strong>. Het paneel toont de HTML van het doel en van de verwezen elementen.</p>
    <p>Elk geval heeft een eigen id (m01, m02 enzovoort) die precies twee keer voorkomt. Bij elk geval staat wat de crawler hoort te tonen. █ betekent: gemaskeerd. Namen, nummers en e-mailadressen op deze pagina zijn verzonnen; e-mailadressen staan op example.test.</p>

    <nav aria-labelledby="inhoud">
        <h2 id="inhoud">Inhoud</h2>
        <ol>
            <li><a href="#groep-gemaskeerd">Gemaskeerd (01–22)</a></li>
            <li><a href="#geval-01">01 · Waarde in een tekstveld</a></li>
            <li><a href="#geval-02">02 · Wachtwoordveld</a></li>
            <li><a href="#geval-03">03 · Verborgen veld</a></li>
            <li><a href="#geval-04">04 · E-mailveld</a></li>
            <li><a href="#geval-05">05 · Veld zonder type</a></li>
            <li><a href="#geval-06">06 · VALUE in hoofdletters</a></li>
            <li><a href="#geval-07">07 · Doel heeft zelf een waarde</a></li>
            <li><a href="#geval-08">08 · Textarea met tekst</a></li>
            <li><a href="#geval-09">09 · Element zelf bewerkbaar</a></li>
            <li><a href="#geval-10a">10a · contenteditable=""</a></li>
            <li><a href="#geval-10b">10b · contenteditable="plaintext-only"</a></li>
            <li><a href="#geval-10c">10c · contenteditable="false"</a></li>
            <li><a href="#geval-11">11 · Element binnen bewerkbaar blok</a></li>
            <li><a href="#geval-12">12 · Doel binnen bewerkbaar blok</a></li>
            <li><a href="#geval-13">13 · E-mailadres in tekst</a></li>
            <li><a href="#geval-14">14 · E-mailadres in een link</a></li>
            <li><a href="#geval-15">15 · E-mailadres in title</a></li>
            <li><a href="#geval-16">16 · E-mailadres in data-attribuut</a></li>
            <li><a href="#geval-17">17 · E-mailadres met %40</a></li>
            <li><a href="#geval-18">18 · E-mailadres als &amp;#64;</a></li>
            <li><a href="#geval-19a">19a · Adres gesplitst door wbr</a></li>
            <li><a href="#geval-19b">19b · Adres gesplitst door span</a></li>
            <li><a href="#geval-20">20 · Select met gekozen optie</a></li>
            <li><a href="#geval-21">21 · Aangevinkt vakje</a></li>
            <li><a href="#geval-22">22 · Gekozen keuzerondje</a></li>
            <li><a href="#groep-zichtbaar">Zichtbaar (30–39)</a></li>
            <li><a href="#geval-30">30 · Gewone attributen</a></li>
            <li><a href="#geval-31">31 · ARIA-attributen</a></li>
            <li><a href="#geval-32">32 · Naam in gewone tekst</a></li>
            <li><a href="#geval-33">33 · Nummer dat op een BSN lijkt</a></li>
            <li><a href="#geval-34">34 · Data-attributen zonder adres</a></li>
            <li><a href="#geval-35">35 · Verborgen element</a></li>
            <li><a href="#geval-36">36 · Options in een datalist</a></li>
            <li><a href="#geval-37">37 · Lijkt op een e-mailadres</a></li>
            <li><a href="#geval-38">38 · Losse teksten, geen adres</a></li>
            <li><a href="#geval-39">39 · Attribuut list</a></li>
            <li><a href="#groep-weglaten">Weglaten (40–43)</a></li>
            <li><a href="#geval-40">40 · Script</a></li>
            <li><a href="#geval-41">41 · Style</a></li>
            <li><a href="#geval-42">42 · Commentaar</a></li>
            <li><a href="#geval-43">43 · Lang element</a></li>
            <li><a href="#groep-grenzen">Bekende grenzen (50–53)</a></li>
            <li><a href="#geval-50">50 · Volwijdte-apenstaartje</a></li>
            <li><a href="#geval-51">51 · Letterlijke &amp;amp;#64;</a></li>
            <li><a href="#geval-52">52 · Bewerkbaar via CSS</a></li>
            <li><a href="#geval-53">53 · aria-checked en aria-selected</a></li>
        </ol>
    </nav>

    <!-- ===================== GEMASKEERD ===================== -->

    <h2 class="groep" id="groep-gemaskeerd">Gevallen die gemaskeerd moeten worden</h2>

    <section id="geval-01">
        <h2>01 · Waarde in een tekstveld</h2>
        <p class="verwacht">Verwacht: value wordt █. De rest blijft zichtbaar.</p>
        <button type="button" aria-describedby="m01">Info</button>
        <div id="m01"><input type="text" name="naam" value="Jan Jansen" aria-label="Naam"></div>
        <div id="m01">tweede</div>
    </section>

    <section id="geval-02">
        <h2>02 · Wachtwoordveld met een waarde</h2>
        <p class="verwacht">Verwacht: value wordt █.</p>
        <button type="button" aria-describedby="m02">Info</button>
        <div id="m02"><input type="password" value="Geheim123!" aria-label="Wachtwoord" autocomplete="off"></div>
        <div id="m02">tweede</div>
    </section>

    <section id="geval-03">
        <h2>03 · Verborgen veld</h2>
        <p class="verwacht">Verwacht: value wordt █.</p>
        <button type="button" aria-describedby="m03">Info</button>
        <div id="m03"><input type="hidden" name="token" value="abc123def456">Formulier met verborgen veld</div>
        <div id="m03">tweede</div>
    </section>

    <section id="geval-04">
        <h2>04 · E-mailveld met een waarde</h2>
        <p class="verwacht">Verwacht: value wordt █.</p>
        <button type="button" aria-describedby="m04">Info</button>
        <div id="m04"><input type="email" value="piet@example.test" aria-label="E-mail" autocomplete="off"></div>
        <div id="m04">tweede</div>
    </section>

    <section id="geval-05">
        <h2>05 · Veld zonder type</h2>
        <p class="verwacht">Verwacht: value wordt █.</p>
        <button type="button" aria-describedby="m05">Info</button>
        <div id="m05"><input value="Klaas" aria-label="Voornaam"></div>
        <div id="m05">tweede</div>
    </section>

    <section id="geval-06">
        <h2>06 · VALUE in hoofdletters</h2>
        <p class="verwacht">Verwacht: gemaskeerd. In HTML wordt VALUE gewoon value, dus value wordt █.</p>
        <button type="button" aria-describedby="m06">Info</button>
        <div id="m06"><input VALUE="Hoofdletters" aria-label="Tekst"></div>
        <div id="m06">tweede</div>
    </section>

    <section id="geval-07">
        <h2>07 · Het doel heeft zelf een waarde</h2>
        <p class="verwacht">Verwacht: in het doel wordt value █, terwijl list="m07" zichtbaar blijft.</p>
        <label>Stad <input list="m07" name="stad" value="Utrecht"></label>
        <datalist id="m07"><option>Arnhem</option></datalist>
        <datalist id="m07"><option>Groningen</option></datalist>
    </section>

    <section id="geval-08">
        <h2>08 · Textarea met tekst</h2>
        <p class="verwacht">Verwacht: de inhoud van de textarea wordt één █.</p>
        <button type="button" aria-describedby="m08">Info</button>
        <div id="m08"><textarea name="bericht" aria-label="Bericht">Beste Jan, mijn adres is Dorpsstraat 1.</textarea></div>
        <div id="m08">tweede</div>
    </section>

    <section id="geval-09">
        <h2>09 · Een element dat zelf bewerkbaar is</h2>
        <p class="verwacht">Verwacht: de inhoud van het bewerkbare element wordt één █.</p>
        <button type="button" aria-describedby="m09">Info</button>
        <div id="m09" contenteditable="true">Concepttekst met BSN 111222333</div>
        <div id="m09">tweede</div>
    </section>

    <section id="geval-10a">
        <h2>10a · Bewerkbaar met contenteditable=""</h2>
        <p class="verwacht">Verwacht: de inhoud wordt één █.</p>
        <button type="button" aria-describedby="m10a">Info</button>
        <div id="m10a" contenteditable="">Concepttekst van Jan Jansen</div>
        <div id="m10a">tweede</div>
    </section>

    <section id="geval-10b">
        <h2>10b · Bewerkbaar met contenteditable="plaintext-only"</h2>
        <p class="verwacht">Verwacht: de inhoud wordt één █.</p>
        <button type="button" aria-describedby="m10b">Info</button>
        <div id="m10b" contenteditable="plaintext-only">Concepttekst van Jan Jansen</div>
        <div id="m10b">tweede</div>
    </section>

    <section id="geval-10c">
        <h2>10c · Bewerkbaar met contenteditable="false"</h2>
        <p class="verwacht">Verwacht: de inhoud wordt één █, net als bij 10a en 10b.</p>
        <button type="button" aria-describedby="m10c">Info</button>
        <div id="m10c" contenteditable="false">Concepttekst van Jan Jansen</div>
        <div id="m10c">tweede</div>
    </section>

    <section id="geval-11">
        <h2>11 · Een element binnen een bewerkbaar blok</h2>
        <p class="verwacht">Verwacht: de p binnen het blok wordt █. De tweede p, buiten het blok, blijft leesbaar.</p>
        <button type="button" aria-describedby="m11">Info</button>
        <div contenteditable="true"><p id="m11">Concept van Jan, BSN 111222333</p></div>
        <p id="m11">Tekst buiten het bewerkbare blok</p>
    </section>

    <section id="geval-12">
        <h2>12 · Een doel binnen een bewerkbaar blok</h2>
        <p class="verwacht">Verwacht: de inhoud van het doel wordt █.</p>
        <div contenteditable="true"><button type="button" aria-describedby="m12">Concept van Jan, BSN 111222333</button></div>
        <p id="m12">eerste</p>
        <p id="m12">tweede</p>
    </section>

    <section id="geval-13">
        <h2>13 · E-mailadres in tekst</h2>
        <p class="verwacht">Verwacht: het adres wordt █, de rest van de zin blijft.</p>
        <button type="button" aria-describedby="m13">Info</button>
        <p id="m13">Mail naar jan@example.test voor vragen.</p>
        <p id="m13">tweede</p>
    </section>

    <section id="geval-14">
        <h2>14 · E-mailadres in een link</h2>
        <p class="verwacht">Verwacht: het adres in href wordt █.</p>
        <button type="button" aria-describedby="m14">Info</button>
        <div id="m14"><a href="mailto:jan@example.test">Mail ons</a></div>
        <div id="m14">tweede</div>
    </section>

    <section id="geval-15">
        <h2>15 · E-mailadres in title</h2>
        <p class="verwacht">Verwacht: het adres in title wordt █.</p>
        <button type="button" aria-describedby="m15">Info</button>
        <div id="m15"><span title="contact: jan@example.test">Contact</span></div>
        <div id="m15">tweede</div>
    </section>

    <section id="geval-16">
        <h2>16 · E-mailadres in een data-attribuut</h2>
        <p class="verwacht">Verwacht: het adres in data-eigenaar wordt █.</p>
        <button type="button" aria-describedby="m16">Info</button>
        <div id="m16" data-eigenaar="jan@example.test">Document</div>
        <div id="m16">tweede</div>
    </section>

    <section id="geval-17">
        <h2>17 · E-mailadres met %40</h2>
        <p class="verwacht">Verwacht: het adres in href wordt █.</p>
        <button type="button" aria-describedby="m17">Info</button>
        <div id="m17"><a href="https://example.test/?mail=jan%40example.test">link</a></div>
        <div id="m17">tweede</div>
    </section>

    <section id="geval-18">
        <h2>18 · E-mailadres als entiteit &amp;#64;</h2>
        <p class="verwacht">Verwacht: gemaskeerd. De browser leest de entiteit als @.</p>
        <button type="button" aria-describedby="m18">Info</button>
        <p id="m18">jan&#64;example.test</p>
        <p id="m18">tweede</p>
    </section>

    <section id="geval-19a">
        <h2>19a · E-mailadres gesplitst door wbr</h2>
        <p class="verwacht">Verwacht: het hele fragment wordt geweigerd. Bij dit verwezen element staat geen HTML. De uitkomst zelf blijft.</p>
        <button type="button" aria-describedby="m19">Info</button>
        <p id="m19">jan<wbr>@example.test</p>
        <p id="m19">tweede</p>
    </section>

    <section id="geval-19b">
        <h2>19b · E-mailadres gesplitst door span</h2>
        <p class="verwacht">Verwacht: het hele fragment wordt geweigerd. Bij dit verwezen element staat geen HTML. De uitkomst zelf blijft.</p>
        <button type="button" aria-describedby="m19b">Info</button>
        <p id="m19b">jan<span>@</span>example.test</p>
        <p id="m19b">tweede</p>
    </section>

    <section id="geval-20">
        <h2>20 · Select met een gekozen optie</h2>
        <p class="verwacht">Verwacht: value op select wordt █ en selected is helemaal weg.</p>
        <button type="button" aria-describedby="m20">Info</button>
        <div id="m20"><select name="land" aria-label="Land"><option value="nl" selected>Nederland</option><option value="be">België</option></select></div>
        <div id="m20">tweede</div>
    </section>

    <section id="geval-21">
        <h2>21 · Aangevinkt vakje</h2>
        <p class="verwacht">Verwacht: checked is helemaal weg.</p>
        <button type="button" aria-describedby="m21">Info</button>
        <div id="m21"><label><input type="checkbox" name="akkoord" checked> Akkoord</label></div>
        <div id="m21">tweede</div>
    </section>

    <section id="geval-22">
        <h2>22 · Gekozen keuzerondje</h2>
        <p class="verwacht">Verwacht: checked is weg en value wordt █.</p>
        <button type="button" aria-describedby="m22">Info</button>
        <div id="m22"><label><input type="radio" name="keuze" value="ja" checked> Ja</label></div>
        <div id="m22">tweede</div>
    </section>

    <!-- ===================== ZICHTBAAR ===================== -->

    <h2 class="groep" id="groep-zichtbaar">Gevallen die zichtbaar moeten blijven</h2>

    <section id="geval-30">
        <h2>30 · Gewone attributen</h2>
        <p class="verwacht">Verwacht: alle attributen blijven zichtbaar.</p>
        <button type="button" aria-describedby="m30">Info</button>
        <div id="m30" class="kaart" role="group" lang="nl" dir="ltr" title="Zoekformulier">
            <img src="/images/ellie-avatar.png" alt="Avatar van Ellie" width="32" height="32">
            <input type="text" name="naam" placeholder="Vul je naam in" autocomplete="off" aria-label="Naam">
            <a href="https://example.test/pagina">Naar de pagina</a>
        </div>
        <div id="m30">tweede</div>
    </section>

    <section id="geval-31">
        <h2>31 · ARIA-attributen</h2>
        <p class="verwacht">Verwacht: alle ARIA-attributen zichtbaar, met de verwezen elementen eronder.</p>
        <button type="button" aria-label="Sluiten" aria-expanded="false" aria-describedby="m31" aria-labelledby="m31-label" aria-errormessage="m31-fout" aria-invalid="true">×</button>
        <p id="m31">Beschrijving één</p>
        <p id="m31">Beschrijving twee</p>
        <p id="m31-label">Label één</p>
        <p id="m31-label">Label twee</p>
        <p id="m31-fout">Fout één</p>
        <p id="m31-fout">Fout twee</p>
    </section>

    <section id="geval-32">
        <h2>32 · Een naam in gewone tekst</h2>
        <p class="verwacht">Verwacht: zichtbaar. Regel B maskeert alleen e-mailadressen en ingevulde waarden, geen namen of nummers in tekst.</p>
        <button type="button" aria-describedby="m32">Info</button>
        <p id="m32">Contactpersoon: Jan Jansen, telefoon 06-00000000</p>
        <p id="m32">tweede</p>
    </section>

    <section id="geval-33">
        <h2>33 · Een nummer dat op een BSN lijkt</h2>
        <p class="verwacht">Verwacht: zichtbaar.</p>
        <button type="button" aria-describedby="m33">Info</button>
        <p id="m33">Klantnummer 111222333</p>
        <p id="m33">tweede</p>
    </section>

    <section id="geval-34">
        <h2>34 · Data-attributen zonder e-mailadres</h2>
        <p class="verwacht">Verwacht: zichtbaar.</p>
        <button type="button" aria-describedby="m34">Info</button>
        <div id="m34" data-testid="knop-1" data-prijs="12.50">Product</div>
        <div id="m34">tweede</div>
    </section>

    <section id="geval-35">
        <h2>35 · Een verborgen element</h2>
        <p class="verwacht">Verwacht: zichtbaar, met hidden="".</p>
        <button type="button" aria-describedby="m35">Info</button>
        <p id="m35" hidden>Minstens acht tekens.</p>
        <p id="m35">Minstens twaalf tekens.</p>
    </section>

    <section id="geval-36">
        <h2>36 · Options in een datalist</h2>
        <p class="verwacht">Verwacht nu: value wordt █. Na de vervolgtaak (besluit Bart 03-11-2026, A): value zichtbaar.</p>
        <label>Stad <input list="m36" name="stad-36"></label>
        <datalist id="m36"><option value="Amsterdam">Amsterdam</option><option value="Rotterdam"></option></datalist>
        <datalist id="m36"><option value="Amsterdam">Amsterdam</option><option value="Rotterdam"></option></datalist>
    </section>

    <section id="geval-37">
        <h2>37 · Tekst die op een e-mailadres lijkt</h2>
        <p class="verwacht">Verwacht: zichtbaar. Dit is geen e-mailadres.</p>
        <button type="button" aria-describedby="m37">Info</button>
        <p id="m37">Twitter @cardan en prijs 5 @ 10 euro</p>
        <p id="m37">tweede</p>
    </section>

    <section id="geval-38">
        <h2>38 · Twee losse teksten die samen geen adres vormen</h2>
        <p class="verwacht">Verwacht: zichtbaar.</p>
        <button type="button" aria-describedby="m38">Info</button>
        <p id="m38">Mail <b>jan</b> op example.test</p>
        <p id="m38">tweede</p>
    </section>

    <section id="geval-39">
        <h2>39 · Het attribuut list en de verwijzingen zelf</h2>
        <p class="verwacht">Verwacht: list="m39" zichtbaar.</p>
        <label>Stad <input list="m39" name="stad"></label>
        <datalist id="m39"><option>Utrecht</option></datalist>
        <datalist id="m39"><option>Arnhem</option></datalist>
    </section>

    <!-- ===================== WEGLATEN ===================== -->

    <h2 class="groep" id="groep-weglaten">Gevallen die iets weglaten, in plaats van maskeren</h2>

    <section id="geval-40">
        <h2>40 · Script in het element</h2>
        <p class="verwacht">Verwacht: de scriptinhoud wordt ….</p>
        <button type="button" aria-describedby="m40">Info</button>
        <div id="m40"><script>var x = "geheim";</script>Tekst</div>
        <div id="m40">tweede</div>
    </section>

    <section id="geval-41">
        <h2>41 · Style in het element</h2>
        <p class="verwacht">Verwacht: de inhoud van style wordt ….</p>
        <button type="button" aria-describedby="m41">Info</button>
        <div id="m41"><style>.a{color:red}</style>Tekst</div>
        <div id="m41">tweede</div>
    </section>

    <section id="geval-42">
        <h2>42 · Commentaar</h2>
        <p class="verwacht">Verwacht: het commentaar is weg.</p>
        <button type="button" aria-describedby="m42">Info</button>
        <div id="m42"><!-- intern: jan@example.test -->Tekst</div>
        <div id="m42">tweede</div>
    </section>

    <section id="geval-43">
        <h2>43 · Een lang element</h2>
        <p class="verwacht">Verwacht: afgekapt, met de regel "Cut at 2000 characters (html_snippet_truncated)."</p>
        <button type="button" aria-describedby="m43">Info</button>
        <div id="m43">
<?php for ($i = 1; $i <= 60; $i++): ?>
            <p>Alinea <?= $i ?>. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<?php endfor; ?>
        </div>
        <div id="m43">tweede</div>
    </section>

    <!-- ===================== BEKENDE GRENZEN ===================== -->

    <div class="grens">
    <h2 class="groep" id="groep-grenzen">Bekende grenzen, nu nog leesbaar</h2>
    <p>Deze gevallen staan als vervolgpunt. De crawler maskeert ze nu nog niet.</p>

    <section id="geval-50">
        <h2>50 · Volwijdte-apenstaartje</h2>
        <p class="verwacht">Verwacht nu: leesbaar (nog niet gemaskeerd).</p>
        <button type="button" aria-describedby="m50">Info</button>
        <p id="m50">jan＠example.test</p>
        <p id="m50">tweede</p>
    </section>

    <section id="geval-51">
        <h2>51 · Letterlijke &amp;amp;#64;</h2>
        <p class="verwacht">Verwacht nu: leesbaar (nog niet gemaskeerd).</p>
        <button type="button" aria-describedby="m51">Info</button>
        <p id="m51">jan&amp;#64;example.test</p>
        <p id="m51">tweede</p>
    </section>

    <section id="geval-52">
        <h2>52 · Bewerkbaar via CSS</h2>
        <p class="verwacht">Verwacht nu: leesbaar (nog niet gemaskeerd).</p>
        <button type="button" aria-describedby="m52">Info</button>
        <div style="-webkit-user-modify: read-write"><p id="m52">Concepttekst</p></div>
        <p id="m52">tweede</p>
    </section>

    <section id="geval-53">
        <h2>53 · aria-checked en aria-selected</h2>
        <p class="verwacht">Verwacht nu: aria-checked="true" en aria-selected="true" blijven staan, terwijl checked en selected weg gaan.</p>
        <button type="button" aria-describedby="m53">Info</button>
        <div id="m53">
            <span role="checkbox" aria-checked="true" tabindex="0">Akkoord</span>
            <span role="tablist"><span role="tab" aria-selected="true" tabindex="0">Tab 1</span></span>
            <label><input type="checkbox" name="ter-vergelijking" checked> Ter vergelijking</label>
            <select name="ter-vergelijking-select" aria-label="Ter vergelijking"><option selected>Ja</option><option>Nee</option></select>
        </div>
        <div id="m53">tweede</div>
    </section>
    </div>

    </main>
</body>
</html>
