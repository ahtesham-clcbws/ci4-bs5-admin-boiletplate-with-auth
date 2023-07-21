<ul class="nav flex-column">
    <?php foreach (getMenuItems($_SERVER) as $key => $menu) : ?>
        <?php if ($menu['type'] == 'menu') : ?>
            <?= view_cell('Menu/MenuCell', $menu) ?>
        <?php elseif ($menu['type'] == 'heading') : ?>
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span><?= $menu['name'] ?></span>
                <span class="link-secondary">
                    <i class="bi bi-<?= $menu['icon'] ?>"> </i>
                </span>
            </h6>
            <hr class="m-0">
        <?php else : ?>
            <hr class="my-3">
        <?php endif; ?>
    <?php endforeach; ?>
</ul>




<!-- <ul class="nav flex-column mb-auto">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="#">
            <svg class="bi">
                <use xlink:href="#gear-wide-connected" />
            </svg>
            Settings
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="#">
            <svg class="bi">
                <use xlink:href="#door-closed" />
            </svg>
            Sign out
        </a>
    </li>
</ul> -->