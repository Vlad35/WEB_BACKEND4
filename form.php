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
<style>
  .Style{
    margin: 50px;
    border:3px solid black;
    width: 300px;
  }
</style>

    <form action="index.php" method="POST">
      <div class="Style">
        <h1>Форма.</h1>
        <div>
        <label>Введите Имя:</label>
        <br>
        <input name="uName" <?php if ($errors['uName']) {print 'class="error"';} ?> value="<?php print $values['uName']; ?>" /> 
        </div>
        <div>
          <label>Введите E-mail:</label>
          <br>
          <input name="uMail" <?php if ($errors['uMail']) {print 'class="error"';} ?> value="<?php print $values['uMail']; ?>" />
         </div>
        <div>
          <label>Введите Дату:</label>
          <br>
          <input name="uDate" <?php if ($errors['uDate']) {print 'class="error"';} ?> value="<?php print $values['uDate']; ?>" />
        <div>
          <label>Введите Биографию:</label>
          <br>
          <input name="uBio" <?php if ($errors['uBio']) {print 'class="error"';} ?> value="<?php print $values['uBio']; ?>" /> 
        </div>
      </div>
      <input type="submit" value="ok" />
    </form>
  </body>
</html>
