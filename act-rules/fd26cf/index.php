<?php
declare(strict_types=1);
$ruleId = basename(__DIR__);
if (!preg_match('/^[a-z0-9]+$/', $ruleId)) {
    http_response_code(404);
    echo 'Onbekende regel.';
    exit;
}
$rules = json_decode((string) file_get_contents(dirname(__DIR__) . '/rules.json'), true);
$rule = null;
foreach ($rules as $item) {
    if (($item['id'] ?? '') === $ruleId) {
        $rule = $item;
        break;
    }
}
if ($rule === null) {
    http_response_code(404);
    echo 'Onbekende regel.';
    exit;
}
$labels = [
    'passed' => 'geslaagd',
    'failed' => 'afgekeurd',
    'inapplicable' => 'niet van toepassing',
];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($ruleId, ENT_QUOTES, 'UTF-8'); ?></title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; background: #eee; color: #333; }
        header { background: oklch(46% .06 315); color: #fff; padding: 1rem 2rem; }
        header a { color: #fff; }
        main { max-width: 52rem; margin: 2rem auto; padding: 1rem; background: #fff; border-radius: 8px; }
        a { color: oklch(46% .06 315); }
        li { margin: 0.35rem 0; }
        .passed { color: #0f4d28; }
        .failed { color: #6e1520; }
        .inapplicable { color: #444; }
    </style>
</head>
<body>
    <header>
        <p><a href="/act-rules/">Alle ACT-regels</a></p>
        <h1><?php echo htmlspecialchars($ruleId, ENT_QUOTES, 'UTF-8'); ?></h1>
    </header>
    <main>
        <p><?php echo htmlspecialchars((string) $rule['name'], ENT_QUOTES, 'UTF-8'); ?></p>
        <?php $page = (string) ($rule['page'] ?? ''); ?>
        <?php if (preg_match('#^https://www\.w3\.org/#', $page)): ?>
            <p><a href="<?php echo htmlspecialchars($page, ENT_QUOTES, 'UTF-8'); ?>">Regel op w3.org</a></p>
        <?php endif; ?>
        <ul>
        <?php foreach ($rule['cases'] as $case): ?>
            <?php
            $expected = (string) ($case['expected'] ?? '');
            $label = $labels[$expected] ?? $expected;
            $title = (string) ($case['title'] ?? '');
            $file = (string) ($case['file'] ?? '');
            if (!preg_match('/^[a-z]+-\d+[a-z]?\.(html|svg|xml)$/', $file)) {
                continue;
            }
            ?>
            <li>
                <span class="<?php echo htmlspecialchars($expected, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($label, ENT_QUOTES, 'UTF-8'); ?></span>
                <?php if (!empty($case['missing'])): ?>
                    — <?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> (geen bronpagina)
                <?php else: ?>
                    — <a href="<?php echo htmlspecialchars($file, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></a>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
        </ul>
    </main>
</body>
</html>
