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
    <title>Koppen</title>
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
        <h1>Koppen</h1>
        <div class="intro"><p>Goed/Fout voorbeelden van koppen voor succescriterium 1.3.1.</p></div>
        
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<audio>');?> exists </dt>
            <dd>5 points, tags: audio - <a target="_blank" href="https://linear.app/krafters/issue/BE-368/5-audit-test-audio-exists">Linear 368</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<audio controls="true">');?> or <?php sanitize('<audio controls="1">');?> exists </dt>
            <dd>5 points, tags: audio - <a target="_blank" href="https://linear.app/krafters/issue/BE-369/6-audit-test-audio-controls-exist">Linear 369</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<audio controls="true">');?> without accessible name </dt>
            <dd>50 points, tags: audio - <a target="_blank" href="https://linear.app/krafters/issue/BE-370/7-audit-test-audio-missing-title-aria-label-or-aria-labelledby">Linear 370</a></dd>
        </div>
    </dl>
<div class="testcase">
    <h2>Correct - Kopniveau 2</h2>
    <p>Paragraaf met tekst</p>
    <h3>Correct - kopniveau 3</h3>
    <p>Paragraaf met tekst</p>
</div>
<div class="testcase">
    <h2>Correct - Kopniveau 2</h2>
    <h3>Correct - kopniveau 3</h3>
    <p>Paragraaf met tekst</p>
</div>

<div class="testcase">
    <h2>Correct - Kopniveau 2</h2>
    <details>
        <summary><h3>Kopniveau 3</h3></summary>
        <div>
            <h4>Correct kopniveau 4</h4>
        </div>
    </details>
</div>

<div class="testcase">
    <h2>Fout - Kopniveau 2</h2>
    <h2>Fout - kopniveau 2 direct na eerdere kopniveau 2</h2>
    <p>Paragraaf met tekst</p>
</div>
<div class="testcase">
    <h3>Fout - Kopniveau 3 voor H2</h3>
    <h2>Fout - kopniveau 2 direct na eerdere kopniveau 2</h2>
    <p>Paragraaf met tekst</p>
</div>


<div class="testcase">
    <h3>Fout - Kopniveau 3 voor summary</h3>
    <details>
        <summary><h3>Kopniveau 3 in summary</h3></summary>
        <div>
            <h3>Kopniveau in details</h3>
            <p>Paragraaf</p>
        </div>
    </details>
</div>

<div class="testcase">
    <h2>Goed - Kopniveau 2 voor summary</h3>
    <details>
        <summary><h3>Kopniveau 3 in summary</h3></summary>
        <div>
            <h3>Kopniveau in details</h3>
            <p>Paragraaf</p>
        </div>
    </details>
</div>



</main>
</body>
</html>