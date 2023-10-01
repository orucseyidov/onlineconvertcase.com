<!-- <a href="#">
    <span class="me-1"><?= $langs['support_word']; ?></span>
    <i class="fa-solid fa-envelope-open-text"></i>
</a> -->
<div class="dropdown languages">
    <a class="dropdown-toggle" id="languageMenu" href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="<?= $current_locale['flag'] ?>" alt="<?= $current_locale['name'] ?>">
        <?= $current_locale['name'] ?>
    </a>
    <ul class="dropdown-menu" aria-labelledby="languageMenu">
        <?php foreach ($languages as $key => $value) : ?>
            <li>
                <a class="dropdown-item" href="<?= get_lang_url($locale, $value['locale']) ?>">
                    <img src="<?= $value['flag'] ?>" alt="<?= $value['name'] ?>">
                    <?= $value['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>