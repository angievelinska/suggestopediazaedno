// try to block post req
if ($_SERVER['REQUEST_METHOD']) == 'POST') die();

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$errors = '';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}
$name = $_POST['name'];
$test=$_POST['name'];
echo $test;

$email_address = $_POST['email'];
$test=$_POST['email'];
echo $test;

$message = $_POST['message'];
$test=$_POST['message'];
echo $test;

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if (empty($errors))
{
$to = 'elena@suggestopediazaedno.com';
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $name \n ".
"Email: $email_address\n Message \n $message";
$headers = "From: $to\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: thankyou.html');
}
