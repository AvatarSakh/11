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