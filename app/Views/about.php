<?= view('partials/head', get_defined_vars()) ?>
<?= view('partials/nav', get_defined_vars()) ?>

<main id="main-content" class="page-content">
  <header class="page-header">
    <div>
      <p class="context-label">Product</p>
      <h1>About Taskline</h1>
      <p>Today’s work in focus. The full schedule within reach.</p>
    </div>
    <span class="version-label">Version 1.0</span>
  </header>

  <div class="about-layout">
    <section class="about-intro" aria-labelledby="purpose-heading">
      <p class="section-index">01 / Purpose</p>
      <h2 id="purpose-heading">A clear daily working surface</h2>
      <p>Taskline separates what needs attention now from the rest of the schedule. Today shows only the current day’s records; Task list keeps every date available in one ordered view.</p>
      <p>The product is intentionally narrow: fewer competing signals, predictable navigation, and enough context to decide what comes next.</p>
    </section>

    <section class="product-facts" aria-labelledby="facts-heading">
      <p class="section-index">02 / Product details</p>
      <h2 id="facts-heading">Built for dependable daily use</h2>
      <dl>
        <div><dt>Application</dt><dd>Taskline</dd></div>
        <div><dt>Framework</dt><dd>CodeIgniter 4</dd></div>
        <div><dt>Runtime</dt><dd>PHP 8.3</dd></div>
        <div><dt>Data store</dt><dd>MySQL</dd></div>
      </dl>
    </section>

    <section class="developer-panel" aria-labelledby="developer-heading">
      <p class="section-index">03 / Developer</p>
      <div class="developer-line">
        <div class="developer-mark" aria-hidden="true">OC</div>
        <div>
          <h2 id="developer-heading">OpenAI Codex</h2>
          <p>Product design, database architecture, and application development.</p>
        </div>
      </div>
    </section>
  </div>
</main>

<?= view('partials/footer') ?>
