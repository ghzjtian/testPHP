<html>
<head>
    <title>支持文件上传的HTML表单</title>
</head>
<body>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    上传此文件：<input name="myfile" type="file" />
    <input type="submit" value="提交上传" />
</form>
</body>
</html>
