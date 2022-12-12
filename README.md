 <h2 align="center">  МИНИСТЕРСТВО НАУКИ И ВЫСШЕГО ОБРАЗОВАНИЯ РОССИЙСКОЙ ФЕДЕРАЦИИ ФЕДЕРАЛЬНОЕ ГОСУДАРСТВЕННОЕ БЮДЖЕТНОЕ ОБРАЗОВАТЕЛЬНОЕ УЧРЕЖДЕНИЕ ВЫСШЕГО ОБРАЗОВАНИЯ «САХАЛИНСКИЙ ГОСУДАРСТВЕННЫЙ УНИВЕРСИТЕТ» </h2>
<div align="center">
<h3>Институт естественных наук и техносферной безопасности
<br>
Кафедра информатики
<br>
Половников Владислав Олегович</h3>

<br>
<h3>Лабораторная работа №8
<br>
“Введение в вэб-разработку”
<br>
01.03.02 Прикладная математика и информатика</h3>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<h3 align="right">Научный руководитель
<br>
Соболев Евгений Игоревич
</h3>

<h3 align="center">Южно-Сахалинск
<br>
2022г.
</h3>
<hr>
</div>
<p>
HTML (HyperText Markup Language) - язык разметки гипертекста - предназначен для создания Web-страниц.
Под гипертекстом в этом случае понимается текст, связанный с другими текстами указателями-ссылками.
HTML представляет собой достаточно простой набор кодов, которые описывают структуру документа. HTML позволяет выделить в тексте отдельные логические части (заголовки, абзацы, списки и т.д.), поместить на Web-страницу подготовленную фотографию или картинку, организовать на странице ссылки для связи с другими документами.
HTML не задает конкретные и точные атрибуты форматирования документа. Конкретный вид документа окончательно определяет только программа-браузер на компьютере пользователя Интернета. 
HTML также не является языком программирования, но web-страницы могут включать в себя встроенные программы-скрипты на языкахJavascript и Visual Basic Script и программы-апплеты на языке Java.
</p>

<h3 align="center">Задание</h3>

Задачи:
Задание. Гостевая книга. Регулярные выражения.
К базовой функциональности, следует добавить следующие возможности:
▪	Пользователь может использовать следующие HTML тэги в сообщениях:
▪	<a href=”” title=””> </a>
▪	<code> </code>
▪	<i> </i>
▪	<strike></strike>
▪	<strong> </strong>
▪	Должна быть проверка на закрытие тэгов, код должен быть валидным XHTML

Задание. Гостевая книга. JavaScript и AJAX.
К базовой функциональности, следует добавить следующие возможности:
▪	Валидация вводимых данных на стороне сервера и клиента
▪	Функция предпросмотра сообщения, без перезагрузки страницы
▪	Для HTML тэгов сделать панель с кнопками ([link],,[italic],[strike],[strong])
▪	Добавление визуальных эффектов так же приветствуется 






<h1 align="center">Решение</h1>

<h2 align="center">Гостевая книга</h2>

![img1](/images/1.png)

![img2](/images/2.png)

![img3](/images/3.png)

<h3>Главная папка index.php</h3>

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <style>
    body{
        background-image: url("bg.png");
        background-size: 100% 100%;
        background-repeat: no-repeat;
    }
div{
    width: auto;
    padding: 75px;
}
table,
th,
td {
    border: 1px solid;
    padding: 3px;
    padding-left: 5px;
    padding-right: 5px;
}
a{
    width: 100%;
    height: 50px;
    font-size: 10px;
}
    </style>
    <title>Гостевая книга</title>
</head>
<body class="d-flex justify-content-md-center align-items-center vh-100">
            <div class="d-grid gap-3">
                <a class="btn btn-primary fs-4" href="./create/">Ввести сообщение</a>
                <a class="btn btn-primary fs-4" href="./messages/">Просмотреть сообщения</a>
            </div>
</body>
</html>
```
<h3>Файл create/index.php</h3>

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="./jquery-3.6.1.min.js"></script>
    <script src="loadfile.js"></script>
    <script src="clientscript.js"></script>
    <style>
    body{
        background-image: url("../bg.png");
        background-size: 100% 100%;
        background-repeat: repeat-y;
    }
    form{
        background: linear-gradient(0deg, #7fc7ff, white);
        -webkit-border-radius: 50px;
        -moz-border-radius: 50px;
        border-radius: 50px;
        border: none;
    }
    div .form{
        width: auto;
        padding: 75px;
    }
    a{
        width: 100%;
        height: 50px;
        font-size: 10px;
    }
    </style>
    <title>Гостевая книга</title>
</head>
<body class="d-flex justify-content-md-center align-items-center vh-100">
            <div class="d-grid gap-3" style="width: 750px; padding: 75px">
                <form  enctype="multipart/form-data" action="./script.php" method="post">
                <div class="form">
                    <input type="text" class="form-control" placeholder="Ваше имя (обязательно)" id="name" name="name"required>
                    <br>
                    <input type="email" class="form-control" placeholder="Ваш email (обязательно)" id="email" name="email" required>
                    <br>
                    <input type="text" class="form-control" placeholder="Homepage (необязательно)" id="homepage" name="homepage">
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LetvG4jAAAAAINAJN3snODSprVUyVEYMk4LOKq2" style="padding: 0px; width: auto" id="captcha" name="captcha" required></div>
                    <br>
                    <input type="file" class="form-control" id="file" name="userfile" accept=".jpg,.gif,.png,.txt" onchange="check(this)">
                    <br>
                    <div style="margin-bottom:5px">
                    <button type="button" class="btn btn-light" value="link" onclick="Add(this)">[link]</button>
                    <button type="button" class="btn btn-light" value="italic" onclick="Add(this)">[italic]</button>
                    <button type="button" class="btn btn-light" value="strike" onclick="Add(this)">[strike]</button>
                    <button type="button" class="btn btn-light" value="strong" onclick="Add(this)">[strong]</button>
                    <button type="button" class="btn btn-light" value="strong" onclick="review()">Предпросмотр</button>
                </div>
               
                    <textarea class="form-control" placeholder="Оставьте комментарий здесь" id="textarea" name="textarea" required onchange="valid(this)"></textarea>
                    <br>
                    <div id="review">

                    </div>
                    <br>
                    <input type="submit" id="submit" class="form-control" onclick="fl()">
                </div>
                </form>
            </div>
            
</body>
</html>
```

<h3>Файл create/script.php</h3>

```php
<?php

if (isset($_POST['g-recaptcha-response'])) $captcha_response = $_POST['g-recaptcha-response'];
else die('На форме нет капчи! Обратитесь к администратору!');
$url = 'https://www.google.com/recaptcha/api/siteverify';
$params = [
	'secret' => '6LetvG4jAAAAABmlA6YXWqfgwHAj-qZhL85MOur3',
	'response' => $captcha_response,
	'remoteip' => $_SERVER['REMOTE_ADDR']
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
if (!empty($response)) $decoded_response = json_decode($response);

$success = false;

if ($decoded_response && $decoded_response->success) {
	$success = $decoded_response->success;
}

$result = $success ? 'Капча пройдена успешно!' : 'Неверная капча!';
if ($result == 'Капча пройдена успешно!') {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bdz11";

	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
		die("Ошибка в подключении: " . $conn->connect_error);
	}

	$conn = new mysqli($servername, $username, $password, $dbname);

	$name = strip_tags($_POST["name"]);
	$email = strip_tags($_POST["email"]);
	if (!empty($_POST["homepage"])) $homepage = strip_tags($_POST["homepage"]);
	else $homepage = "";
	if ($_FILES["userfile"]["name"] != "") {
		$filename = $_FILES["userfile"]["tmp_name"];
		if (strpos($_FILES["userfile"]["name"], ".txt") == false) {
			if($_FILES["userfile"]["type"] == "image/jpeg") $type = ".jpg";
			if($_FILES["userfile"]["type"] == "image/png") $type = ".png";
			if($_FILES["userfile"]["type"] == "image/gif") $type = ".gif";
			$path = time().$type;
			move_uploaded_file($filename,"../assets/images/".$path);
		}
		else{
			$path = time().".txt";
			move_uploaded_file($filename,"../assets/text/".$path);
		}
	} else $path= "";
	$mastag = array('a','code','i','strike','strong');
	$textarea = strip_tags($_POST["textarea"],$mastag);
	echo $textarea;
	$IP = $_SERVER['REMOTE_ADDR'];
	$temp = get_browser(null, true);
	$Browser = $_SERVER['HTTP_USER_AGENT'];
	$sql = "INSERT INTO `message`(`name`, `email`, `homepage`, `IP`, `Browser`, `text`,`filename`) VALUES ('$name','$email','$homepage','$IP','$Browser','$textarea','$path')";
	$conn->query($sql);

	header('Location: ../messages');
} else {
	header('Location: ./error');
}

```

<h3>Файл create/loadfile.js</h3>

```javascript
function check(file)
{
    var filetemp = file.value.toLowerCase();
    if(filetemp.indexOf('.txt') == -1 && filetemp.indexOf('.jpg') == -1 && filetemp.indexOf('.gif') == -1 && filetemp.indexOf('.png') == -1 ) file.value = "";
    else{
        if(filetemp.indexOf('.txt') != -1)
        {
            if($("#file")[0].files[0].size > 100000) 
            {
                alert("Файл превышает допустимый размер (100КБ)");
                file.value = "";
            }
        }
    }
}

function fl(){
    $.ajax({
        type: "POST",
        url: "./script.php",
        data: "fl="+$("input[type=file]").val(),
        success: function(response){
            $('#response').html(response);
        }
    });
};

```

<h3>Файл create/clientscript.js</h3>

```javascript
function valid(element)
{
        var s = element.value;
        s = s.replace(/\s/g, '');
        s = s.replace(/[a-zа-яё]/gi, '');
        let open=0;
        let close=0;
        for (let i = 0; i < s.length; i++) {
            if(s[i]=="<"){
                open++;
            }
            if(s[i]==">"){
                close++;
            }
        } 
        if(open%2==0 && open==close)
        {
            document.getElementById("submit").disabled = false;
            document.querySelector('#textarea').style.color = "black";
        }
        else{
            document.getElementById("submit").disabled = true;
            document.querySelector('#textarea').style.color = "red";
        }
    
}


function Add(element)
{
    if(element.value == "link") document.getElementById("textarea").value += `<a href=”” title=””> </a>`;
    if(element.value == "italic") document.getElementById("textarea").value += `<i> </i>`;
    if(element.value == "strike") document.getElementById("textarea").value += `<strike></strike>`;
    if(element.value == "strong") document.getElementById("textarea").value += `<strong> </strong>`;
}

function review(){
    if(document.getElementById("submit").disabled == true) alert("Есть не закрытый тег");
    else{
         document.getElementById("review").innerHTML = document.getElementById("textarea").value;
    }
}
```

<h3>Файл messages/index.php</h3>

```php
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="lightbox/prototype.js"></script>
    <script type="text/javascript" src="lightbox/scriptaculous.js?load=effects,builder"></script>
    <script type="text/javascript" src="lightbox/lightbox.js"></script>

    <style>
        body {
            background-image: url("../bg.png");
            background-size: 100% 100%;
            background-repeat: repeat-y;

        }

        table {
            background: linear-gradient(0deg, #7fc7ff, white);
            margin-bottom: 0px;
            text-align: center;
            width: auto;
        }

        tr,
        tbody,
        thead,
        td {
            border: solid 2px black;
            height: 50px;
            padding: 10px;
        }

        td {
            height: 75px;
        }

        a {
            width: 100%;
            height: 50px;
            font-size: 20px;
            text-decoration: none;
            color: black;
        }

        #id {
            width: 3%;
        }

        #name {
            width: 10%;
        }

        #email {
            width: 10%;
        }

        #homepage {
            width: 10%;
        }

        #IP {
            width: 10%;
        }

        #Browser {
            width: 20%;
        }

        #text {
            width: 20%;
        }
        #file{
            width: 350px;
        }
    </style>
    <title>Гостевая книга</title>
</head>

<body class="d-flex flex-row vh-100">
    <div>
        <?php
        $sort_list = array(
            'id_desc'  => '`id` DESC',
            'id_asc'   => '`id`',
            'name_asc'  => '`name`',
            'name_desc' => '`name` DESC',
            'email_asc'   => '`email`',
            'email_desc'  => '`email` DESC',
            'homepage_asc'   => '`homepage`',
            'homepage_desc'  => '`homepage` DESC',
            'IP_asc'   => '`IP`',
            'IP_desc'  => '`IP` DESC',
            'Browser_asc'   => '`Browser`',
            'Browser_desc'  => '`Browser` DESC',
            'text_asc'   => '`text`',
            'text_desc'  => '`text` DESC',
        );

        $sort = @$_GET['sort'];
        if (array_key_exists($sort, $sort_list)) {
            $sort_sql = $sort_list[$sort];
        } else {
            $sort_sql = reset($sort_list);
        }

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bdz11";

        $conn = new mysqli($servername, $username, $password);
        if ($conn->connect_error) {
            die("Ошибка в подключении: " . $conn->connect_error);
        }
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM `message` ORDER BY $sort_sql LIMIT 25";
        $result =  $conn->query($sql);
        function sort_link_th($title, $a, $b)
        {
            $sort = @$_GET['sort'];

            if ($sort == $a) {
                return '<a class="active" href="?sort=' . $b . '">' . $title . ' <i>▲</i></a>';
            } elseif ($sort == $b) {
                return '<a class="active" href="?sort=' . $a . '">' . $title . ' <i>▼</i></a>';
            } else {
                return '<a href="?sort=' . $a . '">' . $title . '</a>';
            }
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th id="id"><?php echo sort_link_th('id', 'id_asc', 'id_desc'); ?></th>
                    <th id="name"><?php echo sort_link_th('Имя', 'name_asc', 'name_desc'); ?></th>
                    <th id="email"><?php echo sort_link_th('Почта', 'email_asc', 'email_desc'); ?></th>
                    <th id="homepage"><?php echo sort_link_th('Домашнаяя страница', 'homepage_asc', 'homepage_desc'); ?></th>
                    <th id="homepage"><?php echo sort_link_th('IP', 'IP_asc', 'IP_desc'); ?></th>
                    <th id="homepage"><?php echo sort_link_th('Браузер', 'Browser_asc', 'Browser_desc'); ?></th>
                    <th id="text"><?php echo sort_link_th('Текст', 'text_asc', 'text_desc'); ?></th>
                    <th id="file">Файл</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td id="id"><?php echo htmlspecialchars($row['id']); ?></td>
                        <td id="name"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td id="email"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td id="homepage"><?php echo htmlspecialchars($row['homepage']); ?></td>
                        <td id="IP"><?php echo htmlspecialchars($row['IP']); ?></td>
                        <td id="Browser"><?php echo htmlspecialchars($row['Browser']); ?></td>
                        <td id="text"><?php echo $row['text']; ?></td>
                            <?php

                            if ($row['filename'] != "") {
                                if (strpos($row['filename'], ".txt") == true) {
                                    $path = "../assets/text/".$row['filename'];
                                    echo "<td id=\"file\"><a href=\"" . $path . "\" target=\"_blank\" class=\"btn btn-primary btn-lg active\" role=\"button\">Файл</a></td>";
                                } else {
                                    $path = "../assets/images/".$row['filename'];
                                    echo "<td id=\"file\"><a href=\"" . $path . "\" rel=\"lightbox\" title=\"Картинка пользователя " . $row["name"] . "\"><img src=\"" . $path . "\" width=\"320\" height=\"240\"></a></td>";
                                }
                            } else {
                                echo "<td id=\"file\"></td>";
                            }
                            ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a class="btn btn-primary fs-4" href="../" style="width:200px">Меню</a>
    </div>
</body>

</html>
```

<h4>Вывод: Вспомнил PHP.</h4>

