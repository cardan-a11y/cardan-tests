# Cardan-Tests
Test domain for ACT-rules and other WCAG-tests

ACT test cases are in `/act-rules/{ruleId}/`. The catalogue of rules, cases, and expected outcomes is the W3C ACT Task Force list: https://www.w3.org/WAI/content-assets/wcag-act-rules/testcases.json

Crawler test pages are in `/tests/`. `tests/menu-test.php` covers ACT rule m6b1q3 (menuitem has non-empty accessible name): m1–m3 passed, m4–m6 failed, m7–m12 inapplicable (no outcome).
