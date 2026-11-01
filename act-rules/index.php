<?php
declare(strict_types=1);
$rulesPath = __DIR__ . '/rules.json';
$rules = json_decode((string) file_get_contents($rulesPath), true);
if (!is_array($rules)) {
    http_response_code(500);
    echo 'De regellijst ontbreekt.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACT-regels</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; margin: 0; background: #eee; color: #333; }
        header { background: oklch(46% .06 315); color: #fff; padding: 1rem 2rem; }
        header a { color: #fff; }
        main { max-width: 52rem; margin: 2rem auto; padding: 1rem; background: #fff; border-radius: 8px; }
        dt { font-weight: bold; margin-top: 1.25rem; }
        dt a { color: oklch(46% .06 315); }
        dd { margin: 0.25rem 0 0; }
    </style>
</head>
<body>
    <header>
        <p><a href="/">Testindex</a></p>
        <h1>ACT-regels</h1>
    </header>
    <main>
        <p>Elke regel staat in een map met het regelnummer. De testpagina's zijn losse documenten, zodat extra navigatie de uitkomst niet verandert.</p>
        <dl>
        <?php foreach ($rules as $rule): ?>
            <?php
            $id = (string) ($rule['id'] ?? '');
            if (!preg_match('/^[a-z0-9]+$/', $id)) {
                continue;
            }
            $name = (string) ($rule['name'] ?? '');
            $page = (string) ($rule['page'] ?? '');
            $count = count($rule['cases'] ?? []);
            ?>
            <dt><a href="/act-rules/<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>/"><?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?></a></dt>
            <dd>
                <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                (<?php echo (int) $count; ?> tests)
                <?php if (preg_match('#^https://www\.w3\.org/#', $page)): ?>
                    · <a href="<?php echo htmlspecialchars($page, ENT_QUOTES, 'UTF-8'); ?>">W3C</a>
                <?php endif; ?>
            </dd>
        <?php endforeach; ?>
        </dl>
    </main>
</body>
</html>
