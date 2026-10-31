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
    <title>Zintuigelijke eigenschappen</title>
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

        img {max-width:100%;}

        div[lang] + div[lang] {border-top:1px solid #ccc;margin-top:3em;padding-top:2em;}
        figure figcaption {text-align:center;font-size:0.8em;}
    </style>
</head>
<body>
    <header>
        <h1>Zintuigelijke eigenschappen</h1>
        <div class="intro"><p>Nederlandse en Engelse tekst met diverse verwijzingen naar vorm, locatie en afmetingen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>

<div lang="nl">
	<p>Op de website zie je dat de tekst <strong>links</strong> naast de afbeelding staat.</p>
	<p>De afbeelding zelf is gecentreerd en de knop bevindt zich <strong>rechts</strong> van de afbeelding.</p>
	<p>Er is ook tekst <strong>boven</strong> de afbeelding geplaatst die duidelijk uitlegt wat je moet doen.</p>
	<p>Als je naar de tekst <strong>onder</strong> de afbeelding kijkt, wordt er meer context gegeven over de afbeelding.</p>
	<p>De knop is <strong>hiernaast</strong> te vinden.</p>
	<h3>Informatie over de afbeelding aan de <strong>linkerkant</strong></h3>
	<p>Het <strong>grote</strong> of <strong>grootste</strong> deel in de diagram is <strong>groen</strong>.</p>
	<p>Het <strong>kleinste</strong> of <strong>kleine</strong> deel in de diagram is <strong>paars</strong>.</p>
	<p>Zie ook de verwijzing naar een locatie in het tekstalternatief van de afbeelding.</p>
	<figure>
		<img src="files/example-diagram.png" alt="Zie de grootste kolom in de grafiek">
		<figcaption>De afbeelding is aan de <strong>rechterkant</strong> van de tekst geplaatst.</figcaption>
	</figure>
	
</div>

<div lang="en">
	<p>On the website, you will see that <strong>to the left</strong> of the image is some text.</p>
	<p>The image itself is centered, and the button is positioned <strong>to the right</strong> of the image.</p>
	<p>There is also text <strong>above</strong> the image that explains clearly what you need to do.</p>
	<p>If you look at the text <strong>below</strong> the image, additional context is provided about the image.</p>
	<p>The button can be found <strong>next to</strong> the image.</p>
	<h3>Information about the image <strong>to the left</strong></h3>
	<p>The <strong>large</strong> or <strong>largest</strong> part in the diagram is <strong>green</strong>.</p>
	<p>The <strong>smallest</strong> or <strong>small</strong> part in the diagram is <strong>purple</strong>.</p>
	<p>See also the instruction to a location inside the text alternative of the image</p>
	<figure>
		<img src="files/example-diagram.png" alt="See the largest column in the diagram">
		<figcaption>The image is placed <strong>to the right</strong> of the text.</figcaption>
	</figure>
</div>

</main></body></html>