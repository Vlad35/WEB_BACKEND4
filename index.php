<?php 
	header('Content-Type: text/html; charset=UTF-8');

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $messages = array();
    if (!empty($_COOKIE['save'])) {
     setcookie('save', '', 100000);
     $messages[] = 'Спасибо, результаты сохранены.';
   }

    $errors = array();
    $errors['uName'] = !empty($_COOKIE['uName_error']);
  	$errors['uMail'] = !empty($_COOKIE['uMail_error']);
  	$errors['uDate'] = !empty($_COOKIE['uDate_error']);
  	$errors['uBio'] = !empty($_COOKIE['uBio_error']);

    if ($errors['uName']) {
      setcookie('uName_error', '', 100000);
      $messages[] = '<div class="error">Заполните имя.</div>';
    }
	  if ($errors['uMail']) {
      setcookie('uMail_error', '', 100000);
      $messages[] = '<div class="error">Заполните e-mail.</div>';
    }
	  if ($errors['uDate']) {
      setcookie('uDate_error', '', 100000);
      $messages[] = '<div class="error">Заполните дату рождения.</div>';
    }
	  if ($errors['uBio']) {
      setcookie('uBio_error', '', 100000);
      $messages[] = '<div class="error">Заполните биографию.</div>';
    }

    $values = array();
    $values['uName'] = empty($_COOKIE['uName_value']) ? '' : $_COOKIE['uName_value'];
	  $values['uMail'] = empty($_COOKIE['uMail_value']) ? '' : $_COOKIE['uMail_value'];
	  $values['uDate'] = empty($_COOKIE['uDate_value']) ? '' : $_COOKIE['uDate_value'];
	  $values['uBio'] = empty($_COOKIE['uBio_value']) ? '' : $_COOKIE['uBio_value'];

    include('form.php');
} else {
	$errors = false;
	if (empty($_POST['uName'])) {
    setcookie('uName_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('uName_value', $_POST['uName'], time() + 30 * 24 * 60 * 60);
  }
	if (empty($_POST['uMail'])) {
    setcookie('uMail_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('uMail_value', $_POST['uMail'], time() + 30 * 24 * 60 * 60);
  }
	if (empty($_POST['uDate'])) {
    setcookie('uDate_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('uDate_value', $_POST['uDate'], time() + 30 * 24 * 60 * 60);
  }
	if (empty($_POST['uBio'])) {
    setcookie('uBio_error', '1', time() + 24 * 60 * 60);
    $errors = TRUE;
  }
  else {
    setcookie('uBio_value', $_POST['uBio'], time() + 30 * 24 * 60 * 60);
  }
	if ($errors) {
    header('Location: index.php');
    exit();
  }else {
		setcookie('uName', '', 100000);
		setcookie('uMail', '', 100000);
		setcookie('uDate', '', 100000);
		setcookie('uBio', '', 100000);
	}
	try {
        $user = 'u47684';
        $pass = '8848410';
        $db = new PDO('mysql:host=localhost;dbname=u47684', $user, $pass, array(PDO::ATTR_PERSISTENT => true));
        $stmt = $db->prepare("INSERT INTO DataTable (name, email, birthdate, bio) VALUES (:name, :email, :date,  :bio)");
        $stmt->bindParam(':name', $uName);
        $stmt->bindParam(':email', $uMail);
        $stmt->bindParam(':date', $uDate);
        $stmt->bindParam(':bio', $uBio);
        if($stmt->execute()==false){
          print_r($stmt->errorCode());
          print_r($stmt->errorInfo());
          exit();
        }
    } catch (PDOException $e) {
        print('Error : ' . $e->getMessage());
        exit();
    }
	setcookie('save', '1');
  header('Location: index.php');
  print_r("Added");
}
?>