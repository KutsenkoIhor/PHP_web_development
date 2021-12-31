// BEGIN
$app->get('/users', function ($request, $response) use ($users) {
$term = $request->getQueryParam('term');
$result = collect($users)->filter(
fn($user) => empty($term) ? true : s($user['firstName'])->ignoreCase()->startsWith($term)
);
$params = [
'users' => $result,
'term' => $term
];
return $this->get('renderer')->render($response, 'users/index.phtml', $params);
});
// END

<!-- BEGIN -->
<form action="/users">
    <input type="search" name="term" value="<?= htmlspecialchars($term) ?>">
    <input type="submit" value="Search">
</form>

<?php foreach ($users as $user): ?>
    <div>
        <?= htmlspecialchars($user['firstName']) ?>
    </div>
<?php endforeach ?>
<!-- END -->
