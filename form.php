<html>
  <head>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
}
    </style>
  </head>
  <body>

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

    <form action="index.php" method="POST">`
      <input name="uName" <?php if ($errors['uName']) {print 'class="error"';} ?> value="<?php print $values['uName']; ?>" />
      <input name="uMail" <?php if ($errors['uMail']) {print 'class="error"';} ?> value="<?php print $values['uMail']; ?>" />
      <input name="uDate" <?php if ($errors['uDate']) {print 'class="error"';} ?> value="<?php print $values['uDate']; ?>" />
      <input name="uBio" <?php if ($errors['uBio']) {print 'class="error"';} ?> value="<?php print $values['uBio']; ?>" />
      <input type="submit" value="ok" />
    </form>
  </body>
</html>
