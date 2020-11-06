<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sezzle Demo app Ryan Lenea</title>
</head>
<body>

<?php
$result = "";
class calculator {
    var $a;
    var $b;
    function calc($op) {
        switch($op) {
            case '+':
                return $this->a + $this->b;
                break;
            case '-':
                return $this->a - $this->b;
                break;
            case '*':
                return $this->a * $this->b;
                break;
            case '/':
                return $this->a / $this->b;
                break;
        }
    }
    function getresult($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        return $a . " " . $c . " " . $b . " = " . $this->calc($c);
    }
}

$cal = new calculator();

if($_POST) {

    // TODO: Add some actual form validation.

    $calc_result = $cal->getresult($_POST['n1'],$_POST['n2'],$_POST['op']);

    $mysqli = new mysqli("us-cdbr-east-02.cleardb.com", "b69dd2bc0a0c4e", "a50a94df", "heroku_e949ce84f2e1714");

    $max_id = $mysqli -> query("SELECT MAX(id) FROM calculations");
    $row = mysqli_fetch_array($max_id);
    $max = $row[0];
    if ($max = 11) {
        $sql = "DELETE FROM calculations WHERE id = 11";
        mysqli_query($mysqli, $sql);
    }

    $mysqli->query("UPDATE calculations SET id = id + 1");
    mysqli_query($mysqli, $sql);
    $mysqli->query("INSERT INTO calculations VALUES(1, '{$calc_result}')");
    mysqli_query($mysqli, $sql);

    header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
    exit();
}
?>

<form method="post">
    <table align="center">
        <tr>
            <td>1st Number</td>
            <td><input type="text" name="n1"></td>
        </tr>

        <tr>
            <td>2nd Number</td>
            <td><input type="text" name="n2"></td>
        </tr>

        <tr>
            <td>Operator</td>
            <td>
                <select name="op">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="                  =                  "></td>
        </tr>

    </table>
</form>
<?php include_once("test.html"); ?>
</body>
</html>

