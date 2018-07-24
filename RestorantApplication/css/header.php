
        <?php
            session_start();
            
            if (! isset($_SESSION['user'])) {
                $_SESSION['user'] = "client";
            }
            
        ?>
        

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
  
        <!-- FONT -->
        <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <!-- JS -->
        <script type="text/javascript" src="js/script.js"></script>
        
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=kara0nq1cnm22q9ze8kgdf82epqn4qque4owxeaoiy6k30yp"></script>
        <script>
            tinymce.init({  
                selector:'wysiwyg',
                plugins: "preview bbcode"
            });
        </script>
