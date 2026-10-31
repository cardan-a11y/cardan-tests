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
    <title>PDF-bestanden</title>
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
        <h1>PDF-bestanden</h1>
        <div class="intro"><p>Kunnen PDF-bestanden gevonden worden</p></div>
    </header>
    <main>

    <h2>Tests on this page</h2>

<ul>
    <li><a href="https://test.cardan.com/tests/files/tagged-file-with-incorrect-language-no-documentname.pdf">Download file</a></li>
        <li><a href="https://test.cardan.com/tests/files/pdf-ua.pdf">Download file</a></li>
            <li><a href="https://test.cardan.com/tests/files/multilingual.pdf">Download file</a></li>
                <li><a href="https://test.cardan.com/tests/files/niet-getagd-document.pdf">Download file</a></li>
                <li><a href="https://test.cardan.com/tests/files/pdf-ua2.pdf">Download file</a></li>
</ul>
<h2>De volgende teksten zouden <strong>niet</strong> gevonden moeten worden</h2>
<p>
pdf-ua.pdf
niet-getagd-document.pdf
multilingual.pdf
</p>
</main></body></html>