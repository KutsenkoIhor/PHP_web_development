<?php

$links = [
    ['url' => 'https://google.com', 'name' => 'Google'],
    ['url' => 'https://yandex.com', 'name' => 'Yandex'],
    ['url' => 'https://bingo.com', 'name' => 'Bingo']
];

?>

<!-- BEGIN (write your solution here) -->
<ul>
    <?php foreach ($links as $value) : ?>
        <div>
            <a href="<?= $value['url'] ?>"><?= $value['name'] ?></a>
        </div>
    <?php endforeach; ?>
</ul>
<!-- END -->
