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
    <title>Video - iFrame Vimeo</title>
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
        <h1>Vimeo embeds in iframe</h1>
        <div class="intro"><p>Goed/Fout voorbeelden van het Vimeo-video's in een iframe.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<iframe>');?> exists </dt>
            <dd>5 points, tags: iframe - <a target="_blank" href="https://linear.app/krafters/issue/BE-373/10-audit-test-iframe-exists">Linear 373</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<iframe src="[vimeo]">');?> exists</dt>
            <dd>10 points, tags: video, vimeo - <a target="_blank" href="https://linear.app/krafters/issue/BE-376/13-audit-test-page-has-vimeo-video">Linear 376</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<iframe src="[*youtube*, *youtu.be*]">');?> without url-parameter <?php sanitize('keyboard=0');?> or <?php sanitize('keyboard=false');?></dt>
            <dd>50 points, tags: video, vimeo - <a target="_blank" href="https://linear.app/krafters/issue/BE-377/14-audit-test-vimeo-video-doesnt-have-keyboard=0">Linear 377</a></dd>
        </div>

        <div>
            <dt>
                <?php sanitize('<iframe>');?> does not have title, aria-label or aria-labelledby and is not <?php sanitize('display:none;');?>
            </dt>
            <dd>
                50 points, tags: iframe, 4.1.2 - <a target="_blank" href="https://linear.app/krafters/issue/BE-382/19-audit-test-iframe-element-does-not-contain-accessible-name">Linear BE-382</a>
            </dd>
        </div>
        <div>
            <dt>
                <?php sanitize('<iframe>');?> does contain empty title or aria-label
            </dt>
            <dd>
                50 points, tags: iframe, 4.1.2 - <a target="_blank" href="https://linear.app/krafters/issue/BE-383/20-audit-test-iframe-does-contain-empty-title-or-aria-label">Linear 383</a>
            </dd>
        </div>
        <div>
            <dt>
                <?php sanitize('<iframe aria-labelledby>');?> does contain aria-labelledby, value of aria-labelledby does not point other element on page with ID.
            </dt>
            <dd>
                50 points, tags: iframe, 4.1.2 - <a target="_blank" href="https://linear.app/krafters/issue/BE-384/21-audit-test-iframe-element-with-aria-labelledby-but-no-existing">Linear BE-384</a>
            </dd>
        </div>
    </dl>
<div class="testcase">
    <h2>Standaard Vimeo embed zonder toegankelijkheidsnaam</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen"></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met autoplay</h2>
    <iframe src="https://player.vimeo.com/video/1084537?autoplay=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
</div>

<div class="testcase">
    <h2>Vimeo embed met muted geluid</h2>
    <iframe src="https://player.vimeo.com/video/1084537?muted=1" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
</div>

<div class="testcase">
    <h2>Vimeo embed met keyboard=0</h2>
    <iframe src="https://player.vimeo.com/video/1084537?keyboard=0" width="640" height="360" frameborder="0" allow="fullscreen"></iframe>
    <!-- WCAG Criteria: 2.1.1 (Keyboard), Failed (keyboard controls disabled), 1.2.2 (Captions), Failed (no captions) -->

    <h2>Vimeo embed met keyboard=false</h2>
    <iframe src="https://player.vimeo.com/video/1084537?keyboard=false" width="640" height="360" frameborder="0" allow="fullscreen"></iframe>
    <!-- WCAG Criteria: 2.1.1 (Keyboard), Failed (keyboard controls disabled), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title="Video: Big Buck Bunny"</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" title="Video: Big Buck Bunny"></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title="Vimeo video"</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" title="Vimeo video"></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title="Vimeo video Big Buck Bunny"</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" title="Vimeo video Big Buck Bunny"></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed empty title (title="")</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" title=""></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed empty title (title)</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" title></iframe>
    <!-- WCAG Criteria: 1.1.1 (Non-text Content), Passed (title provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met zowel title, aria-label en aria-labelledby</h2>
    <span id="vimeo-label-2">Video: Big Buck Bunny</span>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" 
        title="Vimeo video Big Buck Bunny" 
        aria-label="Vimeo video Big Buck Bunny" 
        aria-labelledby="vimeo-label-2">
    </iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Passed (aria attributes provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title="Vimeo video" en aria-label</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" 
        title="Vimeo video" 
        aria-label="Vimeo video: Big Buck Bunny">
    </iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Passed (aria-label provided), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title en aria-labelledby naar een niet-bestaand ID met fallback naar title-attribuut</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" 
        title="Vimeo video Big Buck Bunny" 
        aria-labelledby="non-existent-id">
    </iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Failed (invalid ID reference), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met title en aria-labelledby naar een niet-bestaand ID zonder fallback</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" 
        aria-labelledby="non-existent-id">
    </iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Failed (invalid ID reference), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met een leeg aria-label-attribuut (aria-label="")</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" aria-label=""></iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Failed (empty aria-label), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met een leeg aria-label-attribuut (aria-label)</h2>
    <iframe src="https://player.vimeo.com/video/1084537" width="640" height="360" frameborder="0" allow="fullscreen" aria-label></iframe>
    <!-- WCAG Criteria: 4.1.2 (Name, Role, Value), Failed (empty aria-label), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met autoplay=1 en controls=0</h2>
    <iframe src="https://player.vimeo.com/video/1084537?autoplay=1&controls=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
    <!-- WCAG Criteria: 2.1.1 (Keyboard), Failed (autoplay may hinder user control), 1.2.2 (Captions), Failed (no captions) -->
</div>

<div class="testcase">
    <h2>Vimeo embed met autoplay=1 en controls=false</h2>
    <iframe src="https://player.vimeo.com/video/1084537?autoplay=1&controls=false" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
   
</div>

<div class="testcase">
    <h2>Vimeo embed met autoplay=true en controls=false</h2>
    <iframe src="https://player.vimeo.com/video/1084537?autoplay=true&controls=false" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
   
</div>

<div class="testcase">
    <h2>Vimeo embed met autoplay=true en controls=0</h2>
    <iframe src="https://player.vimeo.com/video/1084537?autoplay=true&controls=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen"></iframe>
   
</div>
</main>
</body>
</html>