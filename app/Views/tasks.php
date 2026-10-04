<?= view('partials/head', get_defined_vars()) ?>
<?= view('partials/nav', get_defined_vars()) ?>

<main id="main-content" class="page-content">
  <header class="page-header">
    <div>
      <p class="context-label">Schedule</p>
      <h1>Task list</h1>
      <p>Every task, ordered by date.</p>
    </div>
    <div class="record-summary" aria-label="Task status summary">
      <span><b><?= count($tasks) ?></b> total</span>
      <span><i class="record-dot record-dot--active"></i><b><?= count($tasks) - $completedCount - $pendingCount ?></b> active</span>
      <span><i class="record-dot record-dot--pending"></i><b><?= $pendingCount ?></b> pending</span>
      <span><i class="record-dot record-dot--done"></i><b><?= $completedCount ?></b> done</span>
    </div>
  </header>

  <section class="work-surface task-directory" aria-labelledby="task-directory-heading">
    <div class="directory-toolbar">
      <div>
        <h2 id="task-directory-heading">Schedule</h2>
        <p class="filter-result" data-filter-result aria-live="polite"><?= count($tasks) ?> tasks shown</p>
      </div>

      <div class="toolbar-actions">
        <label class="search-box">
          <span class="sr-only">Search tasks</span>
          <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.5" cy="10.5" r="6"/><path d="m15 15 4.5 4.5"/></svg>
          <input type="search" placeholder="Search tasks" data-task-search autocomplete="off">
        </label>
        <div class="filter-group" aria-label="Filter tasks by status">
          <button type="button" class="filter-button active" data-filter="all" aria-pressed="true">All</button>
          <button type="button" class="filter-button" data-filter="pending" aria-pressed="false">Pending</button>
          <button type="button" class="filter-button" data-filter="in-progress" aria-pressed="false">In progress</button>
          <button type="button" class="filter-button" data-filter="completed" aria-pressed="false">Done</button>
        </div>
      </div>
    </div>

    <div class="dated-task-list">
      <?php foreach ($groupedTasks as $group): ?>
        <section class="date-group" data-date-group>
          <div class="date-heading">
            <h3><?= esc($group['label']) ?></h3>
            <span><?= count($group['tasks']) ?></span>
          </div>
          <div class="task-list">
            <?php foreach ($group['tasks'] as $task): ?>
              <?= view('partials/task_row', ['task' => $task, 'showDate' => false]) ?>
            <?php endforeach ?>
          </div>
        </section>
      <?php endforeach ?>
    </div>

    <div class="empty-state" data-filter-empty <?= $tasks !== [] ? 'hidden' : '' ?>>
      <span class="empty-mark" aria-hidden="true">⌕</span>
      <h3><?= $tasks === [] ? 'No tasks scheduled' : 'No tasks match' ?></h3>
      <p><?= $tasks === [] ? 'Add records to the database to begin building the schedule.' : 'Clear the search or select another status.' ?></p>
    </div>
  </section>
</main>

<?= view('partials/footer') ?>
