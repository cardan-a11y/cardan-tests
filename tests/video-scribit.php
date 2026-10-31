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
    <title>Video - Scribit player</title>
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
        <h1>Scribit player</h1>
        <div class="intro"><p>Vier voorbeelden van de mogelijkheden van Scribit.</p></div>
        <p><a href="/index.php">Terug naar overzicht</a></p>
    </header>
    <main>

    <h2>Tests on this page</h2>
    <dl class="tests">
        <div>
            <dt><?php sanitize('<iframe src="[scribit]">');?> exists </dt>
            <dd>10 points, tags: iframe, video, scribit - <a target="_blank" href="https://linear.app/krafters/issue/BE-378/15-audit-test-page-contains-scribit-video">Linear 378</a></dd>
        </div>
    </dl>


<div class="testcase">
    <h2>Scribit YouTube widget (werkt ook met Vimeo)</h2>
<script type="text/javascript">
    (function(s, w, i, d, g, e, t) {
        s['initScribitWidget'] = function(){s['scribitWidget'] = new s.scribit.widget(g)};
        e = w.createElement(i); e.type='text/javascript'; e.src=d; e.defer=true;
        t = w.getElementsByTagName(i)[0]; t.parentNode.insertBefore(e, t);
    })(window, document, 'script', '//widget.scribit.pro/main.js', '39279b84-937e-49a0-b2e2-9cb35728ef40');
</script> 
<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/3isReBKDjhk?enablejsapi=1&playsinline=1&disablekb=1" title="Blijf gaan met KPN Unlimited  het snelste 5G netwerk van Nederland" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

<div class="testcase">
    <h2>Blue Billywigplayer (via iFrame)</h2>
<iframe onload="if (this.src.indexOf('#!referrer=') === -1) this.src += '#!referrer='+encodeURIComponent(location.href)+'&realReferrer='+encodeURIComponent(document.referrer)" src="https://scribit.bbvms.com/p/wcag_opties/c/6141243.html?inheritDimensions=true&placementOption=default" width="720" height="405"  frameborder="0" webkitallowfullscreen mozallowFullscreen oallowFullscreen msallowFullscreen allowfullscreen allow="autoplay; fullscreen"></iframe>

</div>

<div class="testcase">
    <h2>Blue Billywigplayer (via JavaScript)</h2>
<script type="text/javascript" src="https://scribit.bbvms.com/p/wcag_opties/c/6141243.js"  async="true"></script>

</div>



<div class="testcase">
    <h2>Scribit player</h2>
    <iframe scrolling="no" frameborder="0" src="https://video-player.scribit.pro/?video=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/ee57b60b-392f-4abd-a834-11f9630f8a73.mp4&subtitles=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/ee57b60b-392f-4abd-a834-11f9630f8a73.srt&audioDescription=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/ee57b60b-392f-4abd-a834-11f9630f8a73.mp3&videoDescription=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/ee57b60b-392f-4abd-a834-11f9630f8a73-sign-language.mp4&alternativeText=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/alternative-ee57b60b-392f-4abd-a834-11f9630f8a73.txt&thumbnail=https://storage.googleapis.com/scribit-pro-hosting/prod/generated-output/ee57b60b-392f-4abd-a834-11f9630f8a73/ee57b60b-392f-4abd-a834-11f9630f8a73.jpg&skin=2" style="min-width:100%;height:500px;" data-resize></iframe>

</div>