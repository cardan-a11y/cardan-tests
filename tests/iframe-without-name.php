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
    <title>iFrame - Accessible Name</title>
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
        <h1>iFrame with accessible name</h1>
        <div class="intro"><p>Goed/Fout voorbeelden van accessible name bij iframes.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

   


<div class="testcase">
    <h2>iframe with title</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="iFrame with title-attribute"></iframe>
</div>

<div class="testcase">
    <h2>iframe with aria-label</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-label="iFrame with aria-label-attribute"></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="" aria-label="iFrame with aria-label-attribute, empty titl-attribute"></iframe>
</div>
<div class="testcase">
    <h2>iframe with aria-labelledby</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-labelledby="iframeName"></iframe>
    <span id="iframeName">iFrame with aria-labelledby</span>
</div>
<div class="testcase">
    <h2>iframe without name</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0"></iframe>
</div>


<div class="testcase">
    <h2>iframe without name, empty title-attribute</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title=""></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title></iframe>
</div>
<div class="testcase">
    <h2>iframe without name, empty aria-label</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-label=""></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-label></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="title-attribute exists aria-label empty" aria-label=""></iframe>
</div>


<div class="testcase">
    <h2>iframe without name, empty or invalid aria-labelledby</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-labelledby=""></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-labelledby></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-labelledby="doesnotexists"></iframe>
</div>

<div class="testcase">
    <h2>iframe without name, empty or invalid aria-labelledby</h2>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="Title-attribute exists, aria-labbeledby not" aria-labelledby=""></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" aria-label="aria-label exists, aria-labelledby not" aria-labelledby></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="" aria-label="title-attribute empty, aria-label exists, aria-labelledby not" aria-labelledby="doesnotexists"></iframe>
    <iframe src="https://www.youtube.com/embed/aqz-KE-bpKQ" width="560" height="315" frameborder="0" title="title-attribe available" aria-label="" aria-labelledby="doesnotexists"></iframe>
</div>



</main>
</body>
</html>