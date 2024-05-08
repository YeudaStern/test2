<!DOCTYPE html>
<html>
<head>
    <title>חישוב מטמטי</title>
</head>
<body>
    <h2>חישוב מטמטי</h2>
    <form method="post">
        <label for="num1">מספר ראשון:</label>
        <input type="text" id="num1" name="num1"><br><br>
        <label for="num2">מספר שני:</label>
        <input type="text" id="num2" name="num2"><br><br>
        <select name="operator">
            <option value="add">חיבור</option>
            <option value="subtract">חיסור</option>
            <option value="multiply">כפל</option>
            <option value="divide">חלוקה</option>
        </select><br><br>
        <input type="submit" name="calculate" value="חשב"><br><br>
    </form>

    <?php
    if(isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];

        switch ($operator) {
            case 'add':
                $result = $num1 + $num2;
                $formula = "$num1 + $num2";
                break;
            case 'subtract':
                $result = $num1 - $num2;
                $formula = "$num1 - $num2";
                break;
            case 'multiply':
                $result = $num1 * $num2;
                $formula = "$num1 * $num2";
                break;
            case 'divide':
                if ($num2 == 0) {
                    echo "לא ניתן לחלק ב-0";
                    break;
                }
                $result = $num1 / $num2;
                $formula = "$num1 / $num2";
                break;
            default:
                echo "בחירה לא חוקית";
                break;
        }

        echo "הנוסחה: $formula = $result<br><br>";

        if(!isset($_POST['allFormulas'])) {
            $_POST['allFormulas'] = array();
        }

        $_POST['allFormulas'][] = "$formula = $result";

        echo "כל הנוסחאות עם התוצאות:<br>";
        foreach($_POST['allFormulas'] as $formula) {
            echo "$formula<br>";
        }
    }
    ?>
</body>
</html>
