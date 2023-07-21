<li class="nav-item <?= $active ?>" url="<?= $link ?>">
    <a class="nav-link d-flex align-items-center gap-2 <?= $active ?>" <?= $active ? 'aria-current="page"' : '' ?> href="<?= $link ?>">
        <i class="bi bi-<?= $icon ?>"></i>
        <?= $name ?>
    </a>
</li>