<?= view('partials/head', get_defined_vars()) ?>
<?= view('partials/nav', get_defined_vars()) ?>

<main id="main-content" class="page-content">
  <header class="page-header">
    <div>
      <p class="context-label">Account</p>
      <h1>Profile</h1>
      <p>Your workspace identity and contact details.</p>
    </div>
    <span class="record-id">User <?= str_pad((string) $user['id'], 3, '0', STR_PAD_LEFT) ?></span>
  </header>

  <section class="profile-surface" aria-labelledby="profile-name">
    <div class="profile-identity">
      <div class="profile-avatar" aria-hidden="true"><?= esc($initials) ?></div>
      <div>
        <h2 id="profile-name"><?= esc($user['full_name']) ?></h2>
        <p>@<?= esc($user['username']) ?></p>
        <span class="account-state"><i></i> Active</span>
      </div>
    </div>

    <dl class="detail-list">
      <div><dt>Full name</dt><dd><?= esc($user['full_name']) ?></dd></div>
      <div><dt>Username</dt><dd><?= esc($user['username']) ?></dd></div>
      <div><dt>Email address</dt><dd><a href="mailto:<?= esc($user['email'], 'attr') ?>"><?= esc($user['email']) ?></a></dd></div>
      <div><dt>Member since</dt><dd><?= esc($memberSince) ?></dd></div>
    </dl>
  </section>
</main>

<?= view('partials/footer') ?>
