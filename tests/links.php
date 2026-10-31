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
    <title>Links</title>
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
        <h1>Links</h1>
        <div class="intro"><p>Goed/Fout voorbeelden links.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

   

<h2>Goed</h2>
<ul>
    <li><a href="https://cardan.com">Default text</a></li>
    <li><a href="https://cardan.com" aria-label="aria-label">Aria-label</a></li>
    <li><a href="https://cardan.com" aria-label="only aria-label"></a></li>
    <li><a href="https://cardan.com" title="title-attribute">title-attribute</a></li>
    <li><a href="https://cardan.com" title="Only title-attribute"></a></li>
    <li><a href="https://cardan.com" title="over Cardan">read more</a>
    <li><a href="https://cardan.com" title="over onze diensten">read more</a>
</ul>

    <p>Dit is een wat langere zin met een <a href="https://cardan.com/contact">link naar contact</a></p>
    <p>En in de volgende alinea staat weer een <a href="https://cardan.com/contact">Link naar Contact</a></p>
<h2>Failed</h2>
<ul>
    <li><a>Geen href</a></li>
    <li><a href="https://cardan.com" aria-label="2.5.3 aria-label overwrites text">2.5.3 issue</a></li>
    <li><a href="https://cardan.com"></a></li>
    <li><a href="https://cardan.com/article-a">read more</a></li>
    <li><a href="https://cardan.com-article-b">read more</a></li>
    <li><a href="https://cardan.com/delete-3">verwijderen</a></li>
    <li><a href="https://cardan.com/delete-2">verwijderen</a></li>
    <li><a href="https://cardan.com/delete-1">verwijderen</a></li>
</ul>

    <p>Dit is een wat langere zin met een <a href="https://cardan.com/contact">Link</a></p>
    <p>En in de volgende alinea staat weer een <a href="https://cardan.com/proef">Link</a></p>


    <section aria-labelledby="good-heading">
    <h2 id="good-heading">GOED: zelfde naam, zelfde (genormaliseerde) URL</h2>
    <p class="note">Deze links delen exact dezelfde toegankelijke naam en wijzen naar dezelfde genormaliseerde URL. Dit is geen probleem.</p>
    <div class="links">
      <div class="case">
        <a href="https://example.com/page">Meer lezen</a>
        <a href="https://example.com/page/">Meer lezen</a>
        <p class="note">Trailingslash wordt verwijderd bij normalisatie. Beide zijn dus gelijk.</p>
      </div>

      <div class="case">
        <a href="/contact" aria-label="Contact">Contact</a>
        <a href="/contact" aria-label="Contact">Contact</a>
        <p class="note">Exact dezelfde relatieve URL en naam.</p>
      </div>

      <div class="case">
        <a href="#section1">Lees verder</a>
        <a href="#section1">Lees verder</a>
        <p class="note">Beide verwijzen naar precies hetzelfde fragment (#section1).</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="good-aria">
    <h2 id="good-aria">GOED: zelfde naam en dezelfde URL via aria-labelledby</h2>
    <p class="note">Naam is via aria-labelledby opgebouwd. Links wijzen naar dezelfde URL.</p>
    <div class="links">
      <div class="case" id="wrap1">
        <span id="lbl-a">Bekijk video</span>
        <a href="/video/1" aria-labelledby="lbl-a"> <!-- naam komt uit #lbl-a --> </a>
        <a href="/video/1" aria-labelledby="lbl-a"> <!-- naam komt uit #lbl-a --> </a>
      </div>
    </div>
  </section>

  <section aria-labelledby="bad-diff">
    <h2 id="bad-diff">FOUT: zelfde toegankelijke naam, verschillende URLs</h2>
    <p class="note">Deze voorbeelden moeten flagged worden door de test.</p>
    <div class="links">
      <div class="case">
        <a href="/artikel?lang=nl">Lees meer</a>
        <a href="/artikel?lang=en">Lees meer</a>
        <p class="note">Zelfde zichtbare tekst, verschillende querystrings → verschillende genormaliseerde URLs.</p>
      </div>

      <div class="case">
        <a href="/product/123">Bekijk product</a>
        <a href="/product/456">Bekijk product</a>
        <p class="note">Links hebben dezelfde naam maar leiden naar twee verschillende productpagina's.</p>
      </div>

      <div class="case">
        <a href="https://example.com/path#top">Terug naar boven</a>
        <a href="https://example.com/path#bottom">Terug naar boven</a>
        <p class="note">Fragmenten verschillen. Normalisatie houdt fragmenten aan, dus dit zijn verschillende URLs.</p>
      </div>

      <div class="case">
        <a href="/a" aria-label="Meer info"> <!-- zichtbare tekst ontbreekt → aria-label gebruikt als naam -->
          <img src="icon.svg" alt="">
        </a>
        <a href="/b" aria-label="Meer info">
          <img src="icon.svg" alt="">
        </a>
        <p class="note">Aria-label dezelfde tekst, href verschillend → fout.</p>
      </div>

      <div class="case">
        <a href="/pageA">Read more</a>
        <a href="/pageB">read more</a>
        <p class="note">Case-insensitieve grouping. 'Read more' en 'read more' worden als dezelfde naam gezien.</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="bad-title-desc">
    <h2 id="bad-title-desc">FOUT: titel als beschrijving geeft gelijke combinaties</h2>
    <p class="note">Als de link zelf korte naam heeft en het title-attribuut een beschrijving toevoegt, ontstaat een combinatie die kan dupliceren.</p>
    <div class="links">
      <div class="case">
        <a href="/watch/1">Play <img src="play.svg" alt="video"></a>
        <a href="/watch/2">Play <img src="play.svg" alt="video"></a>
        <p class="note">Zichtbare naam 'Play'. Geen title. Accessible description is leeg. Beide zijn dezelfde naam, maar verschillende URLs → fout.</p>
      </div>

      <div class="case">
        <a href="/movie/1" title="Speel trailer">Speel</a>
        <a href="/movie/2" title="Speel trailer">Speel</a>
        <p class="note">Hier wordt title niet gebruikt als naam (tekst 'Speel' is naam). Title wordt als beschrijving toegevoegd. Display = "Speel Speel trailer". Gelijke combinaties met verschillende hrefs → fout.</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="good-same-target">
    <h2 id="good-same-target">GOED: zelfde zichtbare naam maar alle links verwijzen naar exact dezelfde genormaliseerde URL</h2>
    <p class="note">Dit is toegestaan en niet problematisch.</p>
    <div class="links">
      <div class="case">
        <a href="https://example.com/shop/product">Koop</a>
        <a href="https://example.com/shop/product">Koop</a>
        <a href="/shop/product">Koop</a>
        <p class="note">Twee absolute links identiek. De relatieve link kan in sommige tools als verschillend worden gezien omdat host ontbreekt. Voor een echte GOED-case gebruik identieke relatieve links of identieke absolute links.</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="edge-cases">
    <h2 id="edge-cases">Randgevallen en extra varianten</h2>
    <div class="links">
      <div class="case">
        <p class="note">Lege naam links worden genegeerd door de test (geen display).</p>
        <a href="/nothing"></a>
        <a href="/nothing-else" title=""></a>
      </div>

      <div class="case">
        <p class="note">Link met image zonder alt. Schermlezer leest geen naam. Dit wordt genegeerd (geen naam).</p>
        <a href="/img-no-alt"><img src="photo.jpg" alt=""></a>
        <a href="/img-no-alt-2"><img src="photo.jpg" alt=""></a>
      </div>

      <div class="case">
        <p class="note">Link met complexe inhoud. Naam is verzameld uit tekst en alt.</p>
        <a href="/combo1"><img src="logo.svg" alt="Logo"> <span>Meer info</span></a>
        <a href="/combo2"><span>Meer info</span> <img src="logo.svg" alt="Logo"></a>
        <p class="note">Beide kunnen dezelfde toegankelijke naam opleveren. Als hrefs verschillen is dat een fout.</p>
      </div>

      <div class="case">
        <p class="note">aria-labelledby verwijst naar meerdere ids.</p>
        <span id="t1">Bekijk</span>
        <span id="t2">handleiding</span>
        <a href="/doc1" aria-labelledby="t1 t2"> </a>
        <a href="/doc2" aria-labelledby="t1 t2"> </a>
        <p class="note">Resolutie van aria-labelledby levert 'Bekijk handleiding'. Verschillende hrefs → fout.</p>
      </div>

      <div class="case">
        <p class="note">Absolute versus protocol-only URL varianten.</p>
        <a href="//example.com/path">Link A</a>
        <a href="https://example.com/path">Link B</a>
        <p class="note">Afhankelijk van normalisatie kunnen dit als verschillend worden gezien. Test verwacht volledige vergelijking van delen die beschikbaar zijn.</p>
      </div>
    </div>
  </section>

  <section aria-labelledby="notes">
    <h2 id="notes">Opmerkingen voor testen</h2>
    <ul>
      <li>Gebruik een schermlezer of de testklasse om toegankelijke naam en beschrijving te controleren.</li>
      <li>De test groepeert op kleine letters. 'Read' en 'read' worden gelijk.</li>
      <li>Als dezelfde naam meerdere verschillende genormaliseerde URLs heeft, dan moet de test een resultaat geven.</li>
      <li>Links zonder toegankelijke naam worden genegeerd.</li>
    </ul>
  </section>

  <!-- Extra: elementen met ids gebruikt door aria-labelledby -->
  <section style="display:none">
    <span id="lbl-a-hidden">Bekijk video</span>
  </section>

    <section aria-labelledby="role-link">
    <h2 id="role-link">FOUT: gebruik van role="link" op niet-a element</h2>
    <p class="note">Dit is een extra testcase. Een <code>div</code> met <code>role="link"</code> wordt semantisch als link gezien. De testcode kijkt alleen naar <code>&lt;a&gt;</code>-elementen. Dit voorbeeld zou dus genegeerd worden door de huidige implementatie.</p>
    <div class="links">
      <div class="case" role="link" tabindex="0" aria-label="Niet-detecteerbare link" onclick="location.href='/fake-link'">
        Klik hier
      </div>
      <p class="note">Een schermlezer ziet dit als link. De testklasse niet, want die filtert alleen <code>&lt;a href&gt;</code>.</p>
    </div>
  </section>
</main>
</body>
</html>