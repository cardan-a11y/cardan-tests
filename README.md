# Cardan-Tests
Test domain for ACT-rules and other WCAG-tests

ACT test cases are in `/act-rules/{ruleId}/`. The catalogue of rules, cases, and expected outcomes is the W3C ACT Task Force list: https://www.w3.org/WAI/content-assets/wcag-act-rules/testcases.json

Crawler test pages are in `/tests/`. `tests/menu-test.php` covers ACT rule m6b1q3 (menuitem has non-empty accessible name): m1–m3 passed, m4–m6 failed, m7–m12 inapplicable (no outcome).

`tests/alt-attribute.php` covers ACT rule 59796f (image button has non-empty accessible name): a1–a6 passed, a7–a11 failed, a12–a16 inapplicable (no outcome). The button image is `tests/knop.png`.

## Crawler test area (`/crawler-test/`)

Static test pages for the Cardan All-Access crawler on staging. There is no `crawler-test` folder on disk: nginx sends every path that is not a real file to `index.php`, whose first line includes `_crawler/bootstrap.php`. That router serves `/crawler-test/`, `/_crawler-log/` and `/_crawler-admin/` and returns to `index.php` for every other path, so the rest of the site is unchanged. Because every request under `/crawler-test/` (HTML, CSS, PNG, redirects, HEAD) passes through PHP, each one is logged.

- `/crawler-test/redirect/`: links to `to-closed`, `to-denied` and `to-open`, which answer 302 to `/crawler-test/{closed,denied,open}/target.html`. Each target loads its own `pixel.png`. `robots.txt` disallows `/crawler-test/closed/` for CardanAllAccess.
- `/crawler-test/css/`: the HTML never changes; only `style.css` (served with `Cache-Control: no-store`) switches between variants A to E.
- `/crawler-test/stable/1.html` to `3.html`: control pages that never change.
- `/_crawler-log/` (basic auth): the last 500 requests to `/crawler-test/`, newest first, with a button to clear the log. It logs time (UTC), method, path, query, status and user agent only, and keeps 7 days.
- `/_crawler-admin/` (basic auth): choose the active `style.css` variant.

The log and the active variant are stored in `.cardan-crawler-test-data/` next to the web root (fallback: `_crawler/data/`, ignored by git). The basic-auth password is in Zoho Vault; `_crawler/auth.php` holds only its bcrypt hash.
