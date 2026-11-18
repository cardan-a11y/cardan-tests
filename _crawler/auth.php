<?php
// HTTP basic auth for /_crawler-log/ and /_crawler-admin/.
// Only a bcrypt hash is stored here. The password itself is kept in Zoho Vault.
// To change it: php -r 'echo password_hash("NEW PASSWORD", PASSWORD_BCRYPT, ["cost" => 11]), "\n";'

if (realpath($_SERVER['SCRIPT_FILENAME'] ?? '') === __FILE__) {
    http_response_code(404);
    exit;
}

return [
    'user' => 'crawlertest',
    'hash' => '$2y$11$giEBEVDJm2p5LwcPNKYWreY4zU58XhAtauA5E7/Wljpa3/WQh7GCu',
];
