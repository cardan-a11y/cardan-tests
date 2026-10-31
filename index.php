<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Index</title>
    <style>
        body {
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
    </style>
</head>
<body>
    <header>
        <h1>Test Index</h1>
        <p>Bekijk alle beschikbare tests in de lijst hieronder.</p>
    </header>
    <main>
        <h2>Nieuwe / eigen testcases</h2>
        <?php
        // Map waar de testbestanden zich bevinden
        $testsDir = __DIR__ . '/tests';

        // Controleer of de map bestaat
        if (!is_dir($testsDir)) {
            echo "<p>De map 'tests' bestaat niet.</p>";
            exit;
        }

        // Haal alle PHP-bestanden op uit de map
        $testFiles = glob($testsDir . '/*.php');

        if (empty($testFiles)) {
            echo "<p>Er zijn geen testbestanden gevonden in de map 'tests'.</p>";
        } else {


        

        foreach ($testFiles as $file) {
            // Haal de inhoud van het bestand op
            $content = file_get_contents($file);

            // Zoek het title-element
            preg_match('/<title>(.*?)<\/title>/', $content, $matches);
            $title = $matches[1] ?? 'Untitled'; // Gebruik 'Untitled' als er geen <title> is gevonden

            // Zoek de intro-div
            preg_match('/<div class="intro">(.*?)<\/div>/s', $content, $introMatches);
            $intro = $introMatches[1] ?? 'Geen intro beschikbaar.';

            // Voeg de informatie toe aan de array
            $tests[] = [
                'title' => $title,
                'intro' => $intro,
                'file' => basename($file) // Alleen de bestandsnaam opslaan
            ];
        }

        // Sorteer de array op basis van de titel
        usort($tests, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        echo '<p>Aantal tests: '.count($tests).'</p>';
        echo '<dl>';

        // Genereer de HTML voor de gesorteerde lijst
        foreach ($tests as $test) {
            echo "<dt><a href=\"/tests/{$test['file']}\">{$test['title']}</a></dt>";
            echo "<dd>{$test['intro']}</dd>";
        }
       

            echo '</dl>';
        }
        /*?>
        <h2>Testcases nQode</h2>
        <?php

        // Map waar de testbestanden zich bevinden
        $testsDir2 = __DIR__ . '/a11ytests';

        // Controleer of de map bestaat
        if (!is_dir($testsDir)) {
            echo "<p>De map 'a11ytests' bestaat niet.</p>";
            exit;
        }

        // Haal alle PHP-bestanden op uit de map
        $testFiles2 = glob($testsDir2 . '/*.{php,html}', GLOB_BRACE);


        if (empty($testFiles)) {
            echo "<p>Er zijn geen testbestanden gevonden in de map 'a11ytests'.</p>";
        } else {

            
        

        foreach ($testFiles2 as $file2) {
            // Haal de inhoud van het bestand op
            $content = file_get_contents($file2);

            // Zoek het title-element
            preg_match('/<title>(.*?)<\/title>/', $content, $matches);
            $title = $matches[1] ?? 'Untitled'; // Gebruik 'Untitled' als er geen <title> is gevonden

            if(empty($title)) $title='Empty page title';

            // Zoek de intro-div
            preg_match('/<div class="intro">(.*?)<\/div>/s', $content, $introMatches);
            $intro = $introMatches[1] ?? 'Geen intro beschikbaar.';

            // Voeg de informatie toe aan de array
            $testsnQode[] = [
                'title' => $title,
                'intro' => $intro,
                'file' => basename($file2) // Alleen de bestandsnaam opslaan
            ];
        }

        // Sorteer de array op basis van de titel
        usort($testsnQode, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });

        echo '<p>Aantal tests: '.count($testsnQode).'</p>';
        echo '<dl>';

        // Genereer de HTML voor de gesorteerde lijst
        foreach ($testsnQode as $nqode) {


            echo "<dt><a href=\"a11ytests/{$nqode['file']}\">{$nqode['title']}</a></dt>";
            echo "<dd>{$nqode['intro']}</dd>";
        }
       

            echo '</dl>';
        }
        */
        ?>
    </main>
</body>
</html>