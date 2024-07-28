<!DOCTYPE html>
<html>
<head>
    <title>URL Generator</title>
    <script>
        function openInNewTab(url) {
            window.open(url, '_blank');
        }
    </script>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $url = $_POST["url"];
        $params = $_POST["params"];

        $url = 'site:' . $url;

        if (!empty($params)) {
            $url .= ' ' . implode(' ', $params);
        }

        echo "<script>openInNewTab('" . $url . "');</script>";
    }

    $paramsList = file('list.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    ?>

    <form method="post">
        <label for="url">URL:</label>
        <input type="text" id="url" name="url"><br><br>

        <?php foreach ($paramsList as $param): ?>
            <input type="checkbox" id="<?php echo $param; ?>" name="params[]" value="<?php echo $param; ?>">
            <label for="<?php echo $param; ?>"><?php echo $param; ?></label><br>
        <?php endforeach; ?>

        <br>
        <input type="submit" value="Generate URL">
    </form>
</body>
</html>
