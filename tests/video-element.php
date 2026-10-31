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
    <title>Video - HTML5 video-element</title>
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
        <h1>HTML5 video-element</h1>
        <div class="intro"><p>Goed/Fout voorbeelden van het HTML5 video-element met diverse attributen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<video>');?> exists </dt>
            <dd>5 points, tags: video - <a target="_blank" href="https://linear.app/krafters/issue/BE-359/2-audit-test-video-exists">Linear 359</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<video controls="true">');?> or <?php sanitize('<video controls="1">');?> exists </dt>
            <dd>5 points, tags: video - <a target="_blank" href="https://linear.app/krafters/issue/BE-360/3-audit-test-video-controls-exist">Linear 360</a></dd>
        </div>
        <div>
            <dt><?php sanitize('<video controls="true">');?> without accessible name </dt>
            <dd>50 points, tags: video - <a target="_blank" href="https://linear.app/krafters/issue/BE-361/4-audit-test-video-missing-title-aria-label-or-aria-labelledby">Linear 361</a></dd>
        </div>
 	</dl>
<div class="testcase">
    <h2>Alleen HTML5-video-element</h2>
    <video>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video-element met controls=true</h2>
    <video controls=true>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video-element met controls=1</h2>
    <video controls=1>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video-element met controls="true" en title-attribuut</h2>
    <video controls="true" title="Big Buck Bunny">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video-element met controls="true" en aria-label</h2>
    <video controls="true" aria-label="Big Buck Bunny">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video-element met controls=true en aria-labelledby verwijzend naar een span</h2>
    <span id="video-label">Big Buck Bunny</span>
    <video controls=true aria-labelledby="video-label">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video met controls en aria-labelledby die verwijst naar een niet-bestaand ID</h2>
    <video controls aria-labelledby="nonexistent-id">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video met een leeg title-attribuut</h2>
    <video controls title="">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>Video met een leeg aria-label-attribuut</h2>
    <video controls aria-label="">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>HTML5-video-element voorzien van de juiste codes voor captions</h2>
    <video controls>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        <track kind="subtitles" src="https://test.cardan.com/tests/files/big-buck-bunny.vtt" srclang="en" label="Engels">
        Je browser ondersteunt het video-element niet.
    </video>
</div>

<div class="testcase">
    <h2>HTML5-video-element voorzien van de juiste code voor audio description</h2>
    <video controls>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        <track kind="descriptions" src="https://example.com/audio_descriptions.vtt" srclang="en" label="Engelse Audio Description">
        Je browser ondersteunt het video-element niet.
    </video>
</div>
<div class="testcase">
    <h2>Video-element met autoplay</h2>
    <video autoplay>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>
<div class="testcase">
    <h2>Video-element met autoplay en muted</h2>
    <video autoplay muted>
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
</div>
<div class="testcase">
    <h2>Video-element met controls="false" en externe knoppen voor afspelen en pauzeren</h2>
    <video id="custom-video" controls="false" width="640" height="360">
        <source src="https://download.blender.org/peach/bigbuckbunny_movies/BigBuckBunny_640x360.m4v" type="video/mp4">
        Je browser ondersteunt het video-element niet.
    </video>
    <div>
        <button id="play-button">Afspelen</button>
        <button id="pause-button">Pauzeren</button>
    </div>
</div>



<script>
    // JavaScript voor externe knoppen
    const video = document.getElementById('custom-video');
    const playButton = document.getElementById('play-button');
    const pauseButton = document.getElementById('pause-button');

    playButton.addEventListener('click', () => {
        video.play();
    });

    pauseButton.addEventListener('click', () => {
        video.pause();
    });
</script>

</main>
</body>
</html>