<?= view('partials/head', get_defined_vars()) ?>
<?= view('partials/nav', get_defined_vars()) ?>

<main id="main-content" class="page-content">
  <header class="page-header">
    <div>
      <p class="context-label"><?= esc($todayLabel) ?></p>
      <h1>Today</h1>
      <p><?= count($tasks) ?> scheduled · <?= count($tasks) - $completedCount ?> remaining</p>
    </div>
    <a class="quiet-link" href="/tasks">View full schedule <span aria-hidden="true">→</span></a>
  </header>

  <div class="today-layout">
    <section class="work-surface" aria-labelledby="today-queue-heading">
      <div class="surface-head">
        <div>
          <h2 id="today-queue-heading">Today’s queue</h2>
          <p>Ordered by time added</p>
        </div>
        <span class="completion-copy"><b><?= $progressPercent ?>%</b> complete</span>
      </div>

      <div class="progress-track" aria-label="<?= $progressPercent ?> percent completed">
        <span style="width: <?= $progressPercent ?>%"></span>
      </div>

      <?php if ($tasks !== []): ?>
        <div class="task-list">
          <?php foreach ($tasks as $task): ?>
            <?= view('partials/task_row', ['task' => $task, 'showDate' => false]) ?>
          <?php endforeach ?>
        </div>
      <?php else: ?>
        <div class="empty-state">
          <span class="empty-mark" aria-hidden="true">✓</span>
          <h3>No work scheduled today</h3>
          <p>Your task list is clear for the day.</p>
          <a class="quiet-link" href="/tasks">Review the full schedule →</a>
        </div>
      <?php endif ?>
    </section>

    <aside class="day-summary" aria-labelledby="progress-heading">
      <p class="context-label">Daily progress</p>
      <h2 id="progress-heading"><?= $completedCount ?> of <?= count($tasks) ?> done</h2>
      <dl>
        <div><dt>In progress</dt><dd><?= $inProgressCount ?></dd></div>
        <div><dt>Pending</dt><dd><?= count(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'pending')) ?></dd></div>
        <div><dt>Completed</dt><dd><?= $completedCount ?></dd></div>
      </dl>
      <?php $activeTask = array_values(array_filter($tasks, static fn (array $task): bool => $task['status'] === 'in-progress'))[0] ?? null; ?>
      <?php if ($activeTask !== null): ?>
        <div class="current-focus">
          <span>Current focus</span>
          <strong><?= esc($activeTask['title']) ?></strong>
        </div>
      <?php endif ?>
    </aside>
  </div>
</main>

<?= view('partials/footer') ?>
