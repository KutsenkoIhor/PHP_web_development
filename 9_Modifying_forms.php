<?php
// BEGIN
$app->get('/courses/new', function ($request, $response) {
    $params = [
        'course' => ['title' => '', 'paid' => ''],
        'errors' => []
    ];
    return $this->get('renderer')->render($response, 'courses/new.phtml', $params);
});

$app->post('/courses', function ($request, $response) use ($repo) {
    $course = $request->getParsedBodyParam('course');

    $validator = new Validator();
    $errors = $validator->validate($course);

    if (count($errors) === 0) {
        $repo->save($course);
        return $response->withRedirect('/courses');
    }

    $params = [
        'course' => $course,
        'errors' => $errors
    ];

    return $this->get('renderer')
        ->render($response->withStatus(422), 'courses/new.phtml', $params);
});
// END
// BEGIN
$errors = [];
if ($course['paid'] === '') {
    $errors['paid'] = "Can't be blank";
}

if (empty($course['title'])) {
    $errors['title'] = "Can't be blank";
}

return $errors;
// END
<!-- BEGIN -->
<form action="/courses" method="post">
  <div>
    <label>
        Имя *
      <input type="text" name="course[title]" value="<?= htmlspecialchars($course['title']) ?>">
    </label>
    <?php if (isset($errors['title'])): ?>
      <div><?= $errors['title'] ?></div>
    <?php endif ?>
    </div>
  <div>
    <label>
      Платность *
      <select name="course[paid]">
        <option value="">Select</option>
        <option <?= $course['paid'] === '1' ? 'selected' : '' ?> value="1">Paid</option>
        <option <?= $course['paid'] === '0' ? 'selected' : '' ?> value="0">Free</option>
      </select>
    </label>
    <?php if (isset($errors['paid'])): ?>
      <div><?= $errors['paid'] ?></div>
    <?php endif ?>
  </div>
  <input type="submit" value="Create">
</form>
<!-- END -->