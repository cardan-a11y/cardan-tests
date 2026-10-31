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
    <title>Links with image</title>
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
        <div class="intro"><p>Goed/Fout voorbeelden links van afbeeldingen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

<p>Inhoudsopgave:</p>
<ul>
<li><a href="#img-good-text">Goed: img met tekst</a></li>
<li><a href="#img-good-alt">Goed: img met alt</a></li>
<li><a href="#img-bad-no-name">Fout: img zonder naam</a></li>
<li><a href="#svg-good-aria-label">Goed: svg met aria-label</a></li>
<li><a href="#svg-bad-no-label">Fout: svg zonder label</a></li>
<li><a href="#img-bad-empty-alt">Fout: img met lege alt in link</a></li>
<li><a href="#img-bad-hidden-img">VFout: verborgen img</a></li>
<li><a href="#edge-case-title">Edge-case: svg met title</a></li>
</ul>

<h2 id="img-good-text">Voorbeeld 1 - Good: img in link met tekst</h2>
<div class="example good">
<p>Toelichting: De link heeft een zichtbare tekst en een afbeelding. Schermlezer leest de tekst als linknaam.</p>
<a href="https://example.com">
<img src="https://placehold.co/600x400" alt="Logo">
<span>Home</span>
</a>
<!-- Good: linknaam komt van zichtbare tekst -->
</div>

<h2 id="img-good-alt">Voorbeeld 2 - Good: img met alt als linknaam</h2>
<div class="example good">
<p>Toelichting: De afbeelding heeft een beschrijvende alt. Er is geen extra tekst nodig.</p>
<a href="https://example.com">
<img src="https://placehold.co/600x400" alt="Naar de contactpagina">
</a>
<!-- Good: alt van img wordt als accessible name gebruikt -->
</div>

<h2 id="img-bad-no-name">Voorbeeld 3 - Bad: img zonder alt en geen linktekst</h2>
<div class="example bad" data-issue="WCAG2.1.1; missing-accessible-name">
<p>Toelichting: Geen alt en geen tekst. Schermlezer kan link niet benoemen.</p>
<a href="https://example.com">
<img src="https://placehold.co/600x400">
</a>
</div>

<h2 id="svg-good-aria-label">Voorbeeld 4 - Good: svg met aria-label</h2>
<div class="example good">
<p>Toelichting: SVG heeft aria-label. Schermlezer kan linknaam voorlezen.</p>
<a href="https://example.com">
<svg role="img" aria-label="Naar instellingen" width="50" height="50" viewBox="0 0 50 50">
<rect width="50" height="50" fill="#ccc"></rect>
</svg>
</a>
<!-- Good: aria-label op svg geeft link een naam -->
</div>

<h2 id="svg-bad-no-label">Voorbeeld 5 - Bad: svg zonder label</h2>
<div class="example bad" data-issue="WCAG2.1.1; missing-accessible-name">
<p>Toelichting: SVG zonder aria-label, title of linktekst. Link is onleesbaar voor schermlezer.</p>
<a href="https://example.com">
<svg role="img" width="50" height="50" viewBox="0 0 50 50">
<circle cx="25" cy="25" r="25" fill="#aaa"></circle>
</svg>
</a>
</div>

<h2 id="img-bad-empty-alt">Voorbeeld 6 - Bad: img met lege alt in link</h2>
<div class="example bad" data-issue="WCAG2.1.1; missing-accessible-name">
<p>Toelichting: Alt is leeg, er is geen extra linktekst. Schermlezer leest niets.</p>
<a href="https://example.com">
<img src="https://placehold.co/600x400" alt="">
</a>
</div>

<h2 id="img-bad-hidden-img">Voorbeeld 7 - Bad: verborgen img</h2>
<div class="example bad" data-issue="WCAG2.1.1; missing-accessible-name">
<p>Toelichting: Voor voorleessoftware verborgen afbeelding.</p>
<p><a href="https://example.com">
<img src="https://placehold.co/600x400" alt="Test item" role="presentation">
</a>
</p>
<p>
<a href="https://example.com">
<svg role="img" width="50" height="50" viewBox="0 0 50 50" aria-hidden="true">
<title>Profielpagina openen</title>
<rect width="50" height="50" fill="#999"></rect>
</svg>
</a>
</p>
</div>

<h2 id="edge-case-title">Voorbeeld 8 - Edge-case: svg met title</h2>
<div class="example good">
<p>Toelichting: SVG heeft <code>&lt;title&gt;</code> binnen svg. Moderne schermlezers gebruiken dit als naam.</p>
<a href="https://example.com">
<svg role="img" width="50" height="50" viewBox="0 0 50 50">
<title>Profielpagina openen</title>
<rect width="50" height="50" fill="#999"></rect>
</svg>
</a>
<!-- Good: title binnen SVG wordt als accessible name gebruikt -->
</div>

<h2>Overzicht gevonden issues en good practices</h2>
<ul>
<li>Good: img met zichtbare tekst binnen link</li>
<li>Good: img met beschrijvende alt</li>
<li>Good: svg met aria-label</li>
<li>Good: svg met title</li>
<li>Bad: img zonder alt en zonder tekst <span data-issue="WCAG2.1.1"></span></li>
<li>Bad: svg zonder label <span data-issue="WCAG2.1.1"></span></li>
<li>Bad: img met lege alt binnen link <span data-issue="WCAG2.1.1"></span></li>
</ul>






   </main>

</body>
</html>