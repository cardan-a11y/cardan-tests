<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>aria-live test met bewuste fout</title>
  <style>
    :root { font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif; }
    body { margin: 0; padding: 1rem; }
    main { max-width: 42rem; margin: 0 auto; }
    h1 { font-size: 1.25rem; margin: 0 0 1rem; }
    button { font: inherit; padding: 0.6rem 1rem; border-radius: 0.5rem; border: 1px solid #ccc; cursor: pointer; }
    button:focus-visible { outline: 3px solid #000; outline-offset: 2px; }
    #andere { margin-top: 1rem; padding: 0.75rem; border-left: 4px solid #ccc; background: #f7f7f7; }
    #status { margin-top: 0.5rem; }
  </style>
</head>
<body>
  <main>
    <h1>Test van aria-live</h1>

    <button id="updateBtn" type="button">Geef een nieuw statusbericht</button>

    <!-- BEWUSTE FOUT: aria-hidden="true" verbergt de live regio voor schermlezers -->
    <div id="andere" aria-hidden="true">
      <p id="andereTekst">Dit is andere inhoud.</p>

      <p id="status"
         role="status"
         aria-live="polite"
         aria-atomic="true">
        Druk op de knop voor een bericht.
      </p>
    </div>
  </main>

  <script>
    // eenvoudige data
    const messages = [
      "De pagina is geladen.",
      "Het formulier is verstuurd.",
      "De instellingen zijn opgeslagen.",
      "De verbinding is traag.",
      "De verbinding is hersteld.",
      "De zoekopdracht is klaar.",
      "De download start zo.",
      "Er is niets gevonden."
    ];

    const statusEl = document.getElementById("status");
    const andereTekstEl = document.getElementById("andereTekst");
    const btn = document.getElementById("updateBtn");

    let lastIndex = -1;
    function nextIndex() {
      if (messages.length < 2) return 0;
      let i;
      do { i = Math.floor(Math.random() * messages.length); } while (i === lastIndex);
      lastIndex = i;
      return i;
    }

    function updateStatus() {
      const msg = messages[nextIndex()];

      // wijzig de andere div
      const nu = new Date().toLocaleTimeString();
      andereTekstEl.textContent = "Andere inhoud is bijgewerkt om " + nu + ".";

      // wijzig het statusbericht
      statusEl.textContent = "";
      setTimeout(() => {
        statusEl.textContent = msg;
      }, 60);
    }

    btn.addEventListener("click", updateStatus);
  </script>
</body>
</html>
