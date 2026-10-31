<?php 
    function sanitize($contents) {
        echo '<code><pre>'.htmlspecialchars($contents).'</pre></code>';
    }
?>
<!DOCTYPE html>
<html lang="nl-NL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taal - Taalwissel in content</title>
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
        <h1>Taal - Taalwissel in content</h1>
        <div class="intro"><p>Pagina bevat voorbeelden van goede en foute taalwisselingen in content.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<html lang="nl">');?> is invalid</dt>
            <dd>0 points, <a target="_blank" href="https://linear.app/krafters/issue/BE-408/46-audit-test-page-has-unknown-value-for-lang-attribute">Linear 408</a></dd>
        </div>
        
 	</dl>
    <div class="testcase">
        <h2>Taalwissel ontbreekt</h2>
        <p>This text is in English but has no language attribute.</p>
        <p>Texte français sans attribut de langue.</p>
        <p>Chinees voorbeeldtekst zonder taalcode: 你好，这是一段中文文本。</p>
        <p>Tekst in het Oekraïens: Це текст українською мовою без атрибута.</p>
        <p>Tekst in het Papiamento: E ta un teksto sin código di idioma.</p>
        <p>Tekst in het Papiamentu: Esaki ta un teksto ku no tin kódigo di idioma.</p>
    </div>

    <div class="testcase">
        <h2>Taalwissel met ongeldige waarde</h2>
        <p lang="xx">This text has an invalid language code.</p>
        <p lang="invalid">Texte français avec une valeur invalide pour l'attribut lang.</p>
        <p lang="xyz">مثال باللغة العربية مع رمز لغة غير صالح.</p>
        <p lang="fries">Voorbeeldtekst in het Fries mei in ferkeard attribút.</p>
        <p lang="Dutch">Tekst in het Papiamento met een ongeldige taalcode.</p>
        <p lang="en-EN">Dit is Engelse tekst.</p>
        <p lang="en-GB">Dit is Engelse tekst.</p>
    </div>

    <div class="testcase">
        <h2>Taalwissel goed toegepast</h2>
        <p lang="en">This is a correctly marked English text.</p>
        <p lang="fr">Ceci est un texte français correctement marqué.</p>
        <p lang="zh">这是一个正确标记的中文文本。</p>
        <p lang="uk">Це правильно позначений український текст.</p>
        <p lang="pap">E ta un teksto di Papiamento ku ta korektamente marká.</p>
        <p lang="pap">Esaki ta un teksto di Papiamentu ku ta korektamente marká.</p>
        <p lang="fy">Dit is in goed markearre Fryske tekst.</p>
        <p lang="fr-BE">Ceci est un texte correctement marqué en français de Wallonie.</p>
    </div>

</main>
</body>
</html>