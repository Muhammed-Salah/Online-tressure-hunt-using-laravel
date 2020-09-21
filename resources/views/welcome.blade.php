<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEA IEDC</title>
    <style>

        .banner_content {
            position: relative;
            margin-right: 2%;
            margin-left: 2%;
            margin-top: 0.5%;
            margin-bottom: 8%;
        }

        body{
            background-image: url("{{asset('assets/images/bg2.jpg')}}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            margin-right: 0;
            margin-left: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: rgb(255, 255, 255);
        }

        .button {
            border-radius: 4px;
            background-color: #ffffff;
            border: none;
            text-align: center;
            font-size: 15px;
            padding: 20px;
            width: 150px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .banner_text {
            position: relative;
            padding-top: 6%;
            padding-bottom: 6%;
        }
    </style>

</head>
<body>


        <div class="nav">
            <div class="banner_content">
                <div  >
                    <img align="left" style="height: 10%; width: 10%; margin-top: 1%;" src="{{elixir('assets/images/1.png')}}">
                </div>
                <div >
                    <img align="right" style="height: 7%; width: 7%; margin-right: 2%" src="{{elixir('assets/images/mea.png')}}">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="banner_text">
                <center>
                    <a href=""><button class="button"><span>Get Started </span></button></a>
                </center>
            </div>
        </div>
</body>
</html>
