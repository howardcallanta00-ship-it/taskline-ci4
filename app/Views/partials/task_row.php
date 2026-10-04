<?php $safeStatus = esc($task['status'], 'attr'); ?>
<article class="task-row" data-task data-status="<?= $safeStatus ?>" data-title="<?= esc(strtolower($task['title']), 'attr') ?>">
  <span class="status-mark status-mark--<?= $safeStatus ?>" aria-hidden="true">
    <?php if ($task['status'] === 'completed'): ?>
      <svg viewBox="0 0 24 24"><path d="m7 12 3.2 3.2L17.5 8"/></svg>
    <?php elseif ($task['status'] === 'in-progress'): ?>
      <svg viewBox="0 0 24 24"><path d="M9 7.5v9l7-4.5-7-4.5Z"/></svg>
    <?php else: ?>
      <span></span>
    <?php endif ?>
  </span>
  <div class="task-copy">
    <h3><?= esc($task['title']) ?></h3>
    <?php if (! empty($showDate)): ?>
      <time datetime="<?= esc($task['task_date'], 'attr') ?>"><?= esc(format_task_date($task['task_date'], 'M j')) ?></time>
    <?php endif ?>
  </div>
  <span class="status-label status-label--<?= $safeStatus ?>"><span></span><?= esc(task_status_label($task['status'])) ?></span>
</article>
