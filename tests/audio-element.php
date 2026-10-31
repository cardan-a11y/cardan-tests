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
    <title>Video - HTML5 audio-element</title>
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
        <h1>HTML5 audio-element</h1>
        <div class="intro"><p>Goed/Fout voorbeelden van het HTML5 audio-element met diverse attributen.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
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
    <h2>Audio-element zonder controls</h2>
    <p>De audio-player staat er wel, maar je ziet 'm niet.</p>
    <audio>
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met controls</h2>
    <audio controls>
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met autoplay</h2>
    <audio controls preload="auto" autoplay>
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met loop</h2>
    <audio controls loop>
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met een title-attribuut</h2>
    <audio controls title="Audio Sample">
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met een aria-label</h2>
    <audio controls aria-label="Audio Sample">
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met aria-labelledby dat verwijst naar een bestaand id</h2>
    <span id="audio-label">Audio Sample</span>
    <audio controls aria-labelledby="audio-label">
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>
<div class="testcase">
    <h2>Audio-element met aria-labelledby dat verwijst naar een niet bestaand id</h2>
    <audio controls aria-labelledby="non-existent-label">
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
</div>

<div class="testcase">
    <h2>Audio-element met een externe knop om af te spelen</h2>
    <p>De audio-player staat er wel, maar je ziet 'm niet. Je bedient 'm met onderstaande knoppen.</p>
    <audio id="audio-element">
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
    <button id="play-button">Afspelen</button>
    <button id="pause-button">Pauzeren</button>
</div>

<script>
    const audio = document.getElementById('audio-element');
    const playButton = document.getElementById('play-button');

    playButton.addEventListener('click', () => {
        audio.play();
    });
    const pauseButton = document.getElementById('pause-button');

    pauseButton.addEventListener('click', () => {
        audio.pause();
    });
</script>

<div class="testcase">
    <h2>Audio-element met autoplay en met een externe knop om af te spelen</h2>
    <audio id="audio-element-autoplay" preload autoplay>
        <source src="https://test.cardan.com/tests/files/audio-sample.mp3">
        Je browser ondersteunt het audio-element niet.
    </audio>
    <button id="play-button-autoplay">Afspelen</button>
    <button id="pause-button-autoplay">Pauzeren</button>
</div>

<script>
    const audio2 = document.getElementById('audio-element-autoplay');
    const playButton2 = document.getElementById('play-button-autoplay');

    playButton2.addEventListener('click', () => {
        audio2.play();
    });
    const pauseButton2 = document.getElementById('pause-button-autoplay');

    pauseButton2.addEventListener('click', () => {
        audio2.pause();
    });
</script>
</main>
</body>
</html>