<?php 
    function sanitize($contents) {
        echo '<code><pre>'.htmlspecialchars($contents).'</pre></code>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taal - HTML lang-attribuut ontbreekt</title>
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
        <h1>Taal - HTML lang-attribuut ontbreekt</h1>
        <div class="intro"><p>Pagina heeft geen lang-attribuut op html-element.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<html lang="nl">');?> is missing</dt>
            <dd>0 points, <a target="_blank" href="https://linear.app/krafters/issue/BE-407/45-audit-test-page-has-no-lang-attribute">Linear 407</a></dd>
        </div>
        
 	</dl>

</main>
</body>
</html>