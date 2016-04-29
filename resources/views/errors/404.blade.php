<!DOCTYPE html>
<html>
    <head>
        <title>404.</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            .helloworld{
              background: tomato;
            }
            .helloworld::after{
              background: inherit;
            }

            .helloworld{
                color:#fff;
              position: relative;
              margin: 30px auto;
              padding: 20px;
              width: 200px;
              text-align: center;
              font: 1.6em sans-serif;
            }
            .helloworld::after{
              content:'';
              position: absolute; z-index: -1;
              left: 50%; bottom: -8px;
              margin-left: -5px;
              width: 16px;
              height:16px;
              transform: rotate(45deg);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
            <p class="helloworld"> OUPS <p>
            <div class="title">Erreur 404, <br />cette page n'existe pas.</div>
            </div>
        </div>
    </body>
</html>


