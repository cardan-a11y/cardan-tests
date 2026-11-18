<?php
/*
 * Crawler test area for the Cardan All-Access crawler.
 *
 * Included at the top of /index.php. nginx sends every path that is not a real file to
 * /index.php, and there is deliberately no /crawler-test/ directory on disk, so every
 * request under /crawler-test/ (HTML, CSS, PNG, redirects, any method) passes through here
 * and can be logged. Paths outside the three prefixes below return straight to index.php.
 *
 *   /crawler-test/...   static test pages, byte-identical on every request, logged
 *   /_crawler-log/      request log (basic auth)
 *   /_crawler-admin/    choose the style.css variant (basic auth)
 */

if (realpath($_SERVER['SCRIPT_FILENAME'] ?? '') === __FILE__) {
    http_response_code(404);
    exit;
}

const CRAWLER_TEST_GUARD = "<?php exit; ?>\n";
const CRAWLER_TEST_LOG_DAYS = 7;
const CRAWLER_TEST_LOG_SHOW = 500;

(static function (): void {
    $uri = (string) ($_SERVER['REQUEST_URI'] ?? '/');
    $pos = strpos($uri, '?');
    $path = $pos === false ? $uri : substr($uri, 0, $pos);
    $query = $pos === false ? '' : substr($uri, $pos + 1);

    if ($path === '/crawler-test' || strncmp($path, '/crawler-test/', 14) === 0) {
        crawler_test_serve($path, $query);
        exit;
    }
    if ($path === '/_crawler-log' || strncmp($path, '/_crawler-log/', 14) === 0) {
        crawler_test_log_page($path);
        exit;
    }
    if ($path === '/_crawler-admin' || strncmp($path, '/_crawler-admin/', 16) === 0) {
        crawler_test_admin_page($path);
        exit;
    }
})();

/* ------------------------------------------------------------------ test pages */

function crawler_test_serve(string $path, string $query): void
{
    $method = (string) ($_SERVER['REQUEST_METHOD'] ?? 'GET');
    $html = 'Content-Type: text/html; charset=utf-8';

    $slash = [
        '/crawler-test' => '/crawler-test/',
        '/crawler-test/redirect' => '/crawler-test/redirect/',
        '/crawler-test/css' => '/crawler-test/css/',
        '/crawler-test/stable' => '/crawler-test/stable/',
    ];
    $redirects = [
        '/crawler-test/redirect/to-closed' => '/crawler-test/closed/target.html',
        '/crawler-test/redirect/to-denied' => '/crawler-test/denied/target.html',
        '/crawler-test/redirect/to-open' => '/crawler-test/open/target.html',
    ];
    $pages = crawler_test_pages();

    if ($method !== 'GET' && $method !== 'HEAD') {
        $response = [405, [$html, 'Allow: GET, HEAD'], crawler_test_html('Methode niet toegestaan', "<h1>Methode niet toegestaan</h1>\n<p>Deze pagina's ondersteunen alleen GET en HEAD.</p>")];
    } elseif (isset($slash[$path])) {
        $response = [301, [$html, 'Location: ' . $slash[$path]], ''];
    } elseif (isset($redirects[$path])) {
        $response = [302, [$html, 'Location: ' . $redirects[$path]], ''];
    } elseif (isset($pages[$path])) {
        $response = [200, [$html], $pages[$path]];
    } elseif (preg_match('#^/crawler-test/(closed|denied|open)/pixel\.png$#', $path)) {
        $response = [200, ['Content-Type: image/png'], crawler_test_pixel()];
    } elseif ($path === '/crawler-test/css/style.css') {
        $response = [200, ['Content-Type: text/css; charset=utf-8', 'Cache-Control: no-store'], crawler_test_css(crawler_test_variant())];
    } else {
        $response = [404, [$html], crawler_test_html('Niet gevonden', "<h1>Niet gevonden</h1>\n<p>Deze pagina bestaat niet.</p>")];
    }

    [$status, $headers, $body] = $response;
    crawler_test_log_append([
        'time' => gmdate('Y-m-d\TH:i:s') . sprintf('.%03dZ', (int) (fmod(microtime(true), 1) * 1000)),
        'method' => $method,
        'path' => $path,
        'query' => $query,
        'status' => $status,
        'ua' => (string) ($_SERVER['HTTP_USER_AGENT'] ?? ''),
    ]);
    crawler_test_send($status, $headers, $body, $method);
}

function crawler_test_send(int $status, array $headers, string $body, string $method): void
{
    header_remove('X-Powered-By');
    http_response_code($status);
    foreach ($headers as $header) {
        header($header);
    }
    header('Content-Length: ' . strlen($body));
    if ($method !== 'HEAD') {
        echo $body;
    }
}

function crawler_test_html(string $title, string $body, string $head = ''): string
{
    return "<!DOCTYPE html>\n"
        . "<html lang=\"nl\">\n"
        . "<head>\n"
        . "<meta charset=\"utf-8\">\n"
        . "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\n"
        . "<title>{$title}</title>\n"
        . $head
        . "</head>\n"
        . "<body>\n"
        . "<main>\n"
        . $body . "\n"
        . "</main>\n"
        . "</body>\n"
        . "</html>\n";
}

function crawler_test_pages(): array
{
    $index = crawler_test_html('Crawlertest', <<<'HTML'
<h1>Crawlertest</h1>
<p>Testpagina's voor de Cardan All-Access crawler.</p>
<ul>
<li><a href="/crawler-test/redirect/">Test A: redirects</a></li>
<li><a href="/crawler-test/css/">Test B: alleen het stylesheet verandert</a></li>
<li><a href="/crawler-test/stable/">Controlepagina's die nooit veranderen</a></li>
<li><a href="/crawler-test/stable/1.html">Stabiele pagina 1</a></li>
<li><a href="/crawler-test/stable/2.html">Stabiele pagina 2</a></li>
<li><a href="/crawler-test/stable/3.html">Stabiele pagina 3</a></li>
</ul>
HTML);

    $redirect = crawler_test_html('Redirecttest', <<<'HTML'
<h1>Redirecttest</h1>
<p>Elke link hieronder stuurt met een 302 door naar een andere map.</p>
<ul>
<li><a href="/crawler-test/redirect/to-closed">Doorsturen naar closed</a></li>
<li><a href="/crawler-test/redirect/to-denied">Doorsturen naar denied</a></li>
<li><a href="/crawler-test/redirect/to-open">Doorsturen naar open</a></li>
</ul>
HTML);

    $target = static function (string $name, string $title): string {
        return crawler_test_html($title, "<h1>{$title}</h1>\n<p>Dit is het doel in de map {$name}.</p>\n<p><img src=\"pixel.png\" width=\"1\" height=\"1\" alt=\"\"></p>");
    };

    $css = crawler_test_html('Kleurtest', <<<'HTML'
<h1>Kleurtest</h1>
<p class="body">Deze alinea staat op een witte achtergrond en heeft een tekstkleur die alleen via het stylesheet wordt bepaald en gewijzigd.</p>
<p class="extra">Deze zin kan verborgen worden</p>
HTML, "<link rel=\"stylesheet\" href=\"/crawler-test/css/style.css\">\n");

    $stable = crawler_test_html('Stabiele pagina\'s', <<<'HTML'
<h1>Stabiele pagina's</h1>
<p>Deze pagina's veranderen nooit.</p>
<ul>
<li><a href="/crawler-test/stable/1.html">Stabiele pagina 1</a></li>
<li><a href="/crawler-test/stable/2.html">Stabiele pagina 2</a></li>
<li><a href="/crawler-test/stable/3.html">Stabiele pagina 3</a></li>
</ul>
HTML);

    $stable1 = crawler_test_html('Stabiele pagina 1', <<<'HTML'
<h1>Stabiele pagina 1</h1>
<p>De vuurtoren aan de kust draait elke nacht zijn licht rond, zodat schepen veilig de haven kunnen vinden.</p>
<p><a href="/crawler-test/stable/">Terug naar de stabiele pagina's</a></p>
HTML);

    $stable2 = crawler_test_html('Stabiele pagina 2', <<<'HTML'
<h1>Stabiele pagina 2</h1>
<p>In de moestuin groeien in de zomer tomaten, bonen en courgettes die de buren graag komen oogsten.</p>
<p><a href="/crawler-test/stable/">Terug naar de stabiele pagina's</a></p>
HTML);

    $stable3 = crawler_test_html('Stabiele pagina 3', <<<'HTML'
<h1>Stabiele pagina 3</h1>
<p>De trein naar het noorden vertrekt elk half uur van spoor vier en stopt onderweg op drie stations.</p>
<p><a href="/crawler-test/stable/">Terug naar de stabiele pagina's</a></p>
HTML);

    return [
        '/crawler-test/' => $index,
        '/crawler-test/index.html' => $index,
        '/crawler-test/redirect/' => $redirect,
        '/crawler-test/redirect/index.html' => $redirect,
        '/crawler-test/closed/target.html' => $target('closed', 'Closed target'),
        '/crawler-test/denied/target.html' => $target('denied', 'Denied target'),
        '/crawler-test/open/target.html' => $target('open', 'Open target'),
        '/crawler-test/css/' => $css,
        '/crawler-test/css/index.html' => $css,
        '/crawler-test/stable/' => $stable,
        '/crawler-test/stable/index.html' => $stable,
        '/crawler-test/stable/1.html' => $stable1,
        '/crawler-test/stable/2.html' => $stable2,
        '/crawler-test/stable/3.html' => $stable3,
    ];
}

function crawler_test_pixel(): string
{
    // 1x1 grey PNG.
    return base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mOYOXPmfwAGZQLLYH/n1AAAAABJRU5ErkJggg==');
}

/* ------------------------------------------------------------------ style.css variants */

function crawler_test_variants(): array
{
    return [
        'A' => 'Start: tekst #999999 op #ffffff, contrast te laag (ongeveer 2,8:1)',
        'B' => 'Opgelost: tekst #333333',
        'C' => 'Gelijk aan B, andere volgorde, witruimte en commentaar (telt niet als wijziging)',
        'D' => 'B plus tekst via CSS: h1::before { content: "Nieuw: " }',
        'E' => 'B plus verborgen tekst: p.extra { display:none }',
    ];
}

function crawler_test_css(string $variant): string
{
    $a = "body { background:#ffffff }\np.body { color:#999999 }\n";
    $b = "body { background:#ffffff }\np.body { color:#333333 }\n";

    switch ($variant) {
        case 'B':
            return $b;
        case 'C':
            return "/* Zelfde regels als variant B, in een andere volgorde. */\n"
                . "p.body{color:#333333}\n"
                . "\n"
                . "/* Achtergrond */\n"
                . "body {\n"
                . "    background: #ffffff;\n"
                . "}\n";
        case 'D':
            return $b . "h1::before { content: \"Nieuw: \" }\n";
        case 'E':
            return $b . "p.extra { display:none }\n";
        default:
            return $a;
    }
}

function crawler_test_variant(): string
{
    $raw = @file_get_contents(crawler_test_data_dir() . '/variant.php');
    $value = $raw === false ? '' : trim(substr($raw, strlen(CRAWLER_TEST_GUARD)));

    return isset(crawler_test_variants()[$value]) ? $value : 'A';
}

function crawler_test_set_variant(string $variant): void
{
    $file = crawler_test_data_dir() . '/variant.php';
    $tmp = $file . '.' . bin2hex(random_bytes(4)) . '.tmp';
    file_put_contents($tmp, CRAWLER_TEST_GUARD . $variant . "\n");
    rename($tmp, $file);
}

/* ------------------------------------------------------------------ storage and log */

function crawler_test_data_dir(): string
{
    static $dir = null;
    if ($dir !== null) {
        return $dir;
    }
    // Prefer a folder next to the web root, so nothing is web-reachable. Fall back to a folder
    // inside it; every file there starts with an exit guard (CRAWLER_TEST_GUARD), so a direct request shows nothing.
    foreach ([dirname(__DIR__, 2) . '/.cardan-crawler-test-data', __DIR__ . '/data'] as $candidate) {
        if ((is_dir($candidate) || @mkdir($candidate, 0750, true)) && is_writable($candidate)) {
            return $dir = $candidate;
        }
    }

    return $dir = __DIR__ . '/data';
}

function crawler_test_log_file(): string
{
    return crawler_test_data_dir() . '/log.php';
}

function crawler_test_log_append(array $entry): void
{
    $fh = @fopen(crawler_test_log_file(), 'c+');
    if ($fh === false) {
        return;
    }
    flock($fh, LOCK_EX);
    fseek($fh, 0, SEEK_END);
    if (ftell($fh) === 0) {
        fwrite($fh, CRAWLER_TEST_GUARD);
    }
    fwrite($fh, json_encode($entry, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_SUBSTITUTE) . "\n");
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);

    // Drop entries older than 7 days, at most once an hour.
    $stamp = crawler_test_data_dir() . '/pruned.php';
    $last = @filemtime($stamp);
    if ($last === false || $last < time() - 3600) {
        @file_put_contents($stamp, CRAWLER_TEST_GUARD);
        crawler_test_log_rewrite(static function (array $entry): bool {
            return strtotime($entry['time'] ?? '') >= time() - CRAWLER_TEST_LOG_DAYS * 86400;
        });
    }
}

/** Rewrite the log, keeping only entries for which $keep returns true. */
function crawler_test_log_rewrite(callable $keep): void
{
    $fh = @fopen(crawler_test_log_file(), 'c+');
    if ($fh === false) {
        return;
    }
    flock($fh, LOCK_EX);
    $kept = '';
    while (($line = fgets($fh)) !== false) {
        $entry = json_decode($line, true);
        if (is_array($entry) && $keep($entry)) {
            $kept .= $line;
        }
    }
    ftruncate($fh, 0);
    rewind($fh);
    fwrite($fh, CRAWLER_TEST_GUARD . $kept);
    fflush($fh);
    flock($fh, LOCK_UN);
    fclose($fh);
}

/** The newest entries first. */
function crawler_test_log_read(int $limit): array
{
    $lines = @file(crawler_test_log_file(), FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return [];
    }
    $entries = [];
    foreach (array_reverse($lines) as $line) {
        $entry = json_decode($line, true);
        if (is_array($entry)) {
            $entries[] = $entry;
            if (count($entries) >= $limit) {
                break;
            }
        }
    }

    return $entries;
}

/* ------------------------------------------------------------------ log and admin pages */

function crawler_test_private_headers(): void
{
    header_remove('X-Powered-By');
    header('Cache-Control: no-store');
    header('X-Robots-Tag: noindex, nofollow');
}

/** Ends the request with a 401 unless valid basic-auth credentials were sent. */
function crawler_test_require_auth(): void
{
    $user = $_SERVER['PHP_AUTH_USER'] ?? null;
    $pass = $_SERVER['PHP_AUTH_PW'] ?? null;
    if ($user === null) {
        $header = $_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '';
        if (stripos($header, 'basic ') === 0) {
            $decoded = (string) base64_decode(substr($header, 6), true);
            if (strpos($decoded, ':') !== false) {
                [$user, $pass] = explode(':', $decoded, 2);
            }
        }
    }

    $auth = require __DIR__ . '/auth.php';
    if (is_string($user) && is_string($pass) && hash_equals($auth['user'], $user) && password_verify($pass, $auth['hash'])) {
        return;
    }

    crawler_test_private_headers();
    http_response_code(401);
    header('WWW-Authenticate: Basic realm="Cardan crawlertest", charset="UTF-8"');
    header('Content-Type: text/plain; charset=utf-8');
    echo "Inloggen vereist.\n";
    exit;
}

/** Ends the request with a 403 when a POST comes from another site. */
function crawler_test_require_same_origin(): void
{
    $origin = $_SERVER['HTTP_ORIGIN'] ?? $_SERVER['HTTP_REFERER'] ?? '';
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $originHost = (string) parse_url($origin, PHP_URL_HOST);
    $originPort = parse_url($origin, PHP_URL_PORT);
    if ($originPort !== null) {
        $originHost .= ':' . $originPort;
    }
    if ($origin !== '' && strcasecmp($originHost, $host) === 0) {
        return;
    }
    http_response_code(403);
    header('Content-Type: text/plain; charset=utf-8');
    echo "Verzoek geweigerd.\n";
    exit;
}

/** Shared handling for the two private pages. Returns true when the page should be rendered. */
function crawler_test_private_route(string $path, string $base): bool
{
    if ($path === rtrim($base, '/')) {
        crawler_test_private_headers();
        header('Location: ' . $base, true, 301);
        return false;
    }
    if ($path !== $base) {
        crawler_test_private_headers();
        http_response_code(404);
        header('Content-Type: text/plain; charset=utf-8');
        echo "Niet gevonden.\n";
        return false;
    }
    crawler_test_require_auth();
    crawler_test_private_headers();

    return true;
}

function crawler_test_private_html(string $title, string $body): void
{
    header('Content-Type: text/html; charset=utf-8');
    echo crawler_test_html($title, $body, "<style>\n"
        . "body{font-family:system-ui,sans-serif;margin:1rem;color:#1a1a1a;background:#fff;line-height:1.5}\n"
        . "table{border-collapse:collapse;font-size:.875rem}th,td{border:1px solid #767676;padding:.25rem .5rem;text-align:left;vertical-align:top}\n"
        . "td{word-break:break-all}button{font:inherit;padding:.4rem .9rem;margin:.2rem .4rem .2rem 0}\n"
        . "button[aria-pressed=\"true\"]{font-weight:bold;outline:3px solid #1a1a1a}\n"
        . "pre{background:#f3f3f3;padding:.75rem;overflow:auto}\n"
        . "</style>\n");
}

function crawler_test_log_page(string $path): void
{
    if (!crawler_test_private_route($path, '/_crawler-log/')) {
        return;
    }

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        crawler_test_require_same_origin();
        if (($_POST['action'] ?? '') === 'clear') {
            crawler_test_log_rewrite(static function (): bool {
                return false;
            });
        }
        header('Location: /_crawler-log/', true, 303);
        return;
    }

    crawler_test_log_rewrite(static function (array $entry): bool {
        return strtotime($entry['time'] ?? '') >= time() - CRAWLER_TEST_LOG_DAYS * 86400;
    });
    $entries = crawler_test_log_read(CRAWLER_TEST_LOG_SHOW);
    $e = static function ($value): string {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    };

    $rows = '';
    foreach ($entries as $entry) {
        $rows .= '<tr><td>' . $e($entry['time'] ?? '') . '</td><td>' . $e($entry['method'] ?? '')
            . '</td><td>' . $e($entry['path'] ?? '') . '</td><td>' . $e($entry['query'] ?? '')
            . '</td><td>' . $e($entry['status'] ?? '') . '</td><td>' . $e($entry['ua'] ?? '') . "</td></tr>\n";
    }
    $table = $entries === []
        ? '<p>De log is leeg.</p>'
        : "<table>\n<caption>Laatste " . count($entries) . " verzoeken, nieuwste eerst</caption>\n"
            . "<thead><tr><th scope=\"col\">Tijd (UTC)</th><th scope=\"col\">Methode</th><th scope=\"col\">Pad</th><th scope=\"col\">Query</th><th scope=\"col\">Status</th><th scope=\"col\">User-agent</th></tr></thead>\n"
            . "<tbody>\n{$rows}</tbody>\n</table>";

    crawler_test_private_html('Crawlerlog', "<h1>Crawlerlog</h1>\n"
        . "<p>Alle verzoeken naar /crawler-test/, maximaal " . CRAWLER_TEST_LOG_DAYS . " dagen bewaard. Hier staan de laatste " . CRAWLER_TEST_LOG_SHOW . ".</p>\n"
        . "<p><a href=\"/_crawler-admin/\">Naar de CSS-varianten</a></p>\n"
        . "<form method=\"post\" action=\"/_crawler-log/\"><button type=\"submit\" name=\"action\" value=\"clear\">Log leegmaken</button></form>\n"
        . $table);
}

function crawler_test_admin_page(string $path): void
{
    if (!crawler_test_private_route($path, '/_crawler-admin/')) {
        return;
    }

    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        crawler_test_require_same_origin();
        $variant = (string) ($_POST['variant'] ?? '');
        if (isset(crawler_test_variants()[$variant])) {
            crawler_test_set_variant($variant);
        }
        header('Location: /_crawler-admin/', true, 303);
        return;
    }

    $active = crawler_test_variant();
    $e = static function ($value): string {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    };
    $buttons = '';
    foreach (crawler_test_variants() as $key => $label) {
        $pressed = $key === $active ? 'true' : 'false';
        $buttons .= "<li><button type=\"submit\" name=\"variant\" value=\"{$key}\" aria-pressed=\"{$pressed}\">Variant {$key}</button> " . $e($label) . "</li>\n";
    }

    crawler_test_private_html('CSS-varianten', "<h1>CSS-varianten</h1>\n"
        . "<p>Actieve variant: <strong>{$active}</strong></p>\n"
        . "<p>Een andere variant kiezen verandert alleen de inhoud van <a href=\"/crawler-test/css/style.css\">/crawler-test/css/style.css</a>, nooit de HTML van <a href=\"/crawler-test/css/\">/crawler-test/css/</a>.</p>\n"
        . "<form method=\"post\" action=\"/_crawler-admin/\">\n<ul>\n{$buttons}</ul>\n</form>\n"
        . "<h2>Huidige inhoud van style.css</h2>\n<pre>" . $e(crawler_test_css($active)) . "</pre>\n"
        . "<p><a href=\"/_crawler-log/\">Naar de crawlerlog</a></p>");
}
