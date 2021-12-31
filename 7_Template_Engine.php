<?php
// BEGIN index
$app->get('/users', function ($request, $response) use ($users) {
    $params = [
        'users' => $users
    ];
    return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});

$app->get('/users/{id}', function ($request, $response, $args) use ($users) {
    $id = (int) $args['id'];
    $user = collect($users)->firstWhere('id', $id);
    $params = ['user' => $user];
    return $this->get('renderer')->render($response, 'users/show.phtml', $params);
});
// END
<!-- BEGIN -->
<table>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td>
                <?= $user['id'] ?>
            </td>
            <td>
                <a href="/users/<?= $user['id'] ?>"><?= $user['firstName'] ?></a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<!-- END -->
<!-- BEGIN -->
<?php foreach ($user as $key => $value) : ?>
    <div>
        <?= $key ?>: <?= $value ?>
    </div>
<?php endforeach ?>
<!-- END -->