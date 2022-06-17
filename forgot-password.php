<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>  </title>
    <link rel="stylesheet" type="text/css" href="style.css" />

</head>	
<body>
<style>
    * {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}

body {
    background: #e4e4e4;
}

.form-container {
    display: flex;
    height: 98vh;
    width: 100%;
    justify-content: center;
    align-items: center;
}

.form-container .form-wrap {
    background: #fff;
    width: 40%;
    padding: 15px 20px;
}

.form-container .form-wrap h2 {
    text-align: center;
    margin: 0px 0px 20px;
    font-size: 19px;
}

.form-container .form-wrap .form-box {
    margin: 0px 0px 15px;
}

.form-container .form-wrap .form-box input[type="text"]{
    padding: 5px 8px;
    border-radius: 3px;
    border: 1px solid #353535;
    width: 100%;
}

.form-container .form-wrap .form-submit {
    display: flex;
    justify-content: center;
}


.form-container .form-wrap .form-submit input[type="submit"] {
    padding: 4px 10px;
    border: none;
    border-radius: 2px;
    background: #353535;
    color: #fff;
    font-weight: 800;
    cursor: pointer;
    font-size: 16px;
}
</style>
<div class="form-container">
    <form action="#" method="POST" class="form-wrap">
        <h2>Forgot Password</h2>
        <div class="form-box">
            <input type="text" placeholder="Enter Email" />
        </div>
        <div class="form-submit">
            <input type="submit" value="Send" />
        </div>
    </form>
</div>

</body>
</html>	