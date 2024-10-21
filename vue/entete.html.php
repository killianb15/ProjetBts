<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title><?php echo $titre ?></title>
        <style type="text/css">
            @import url("css/base.css");
            @import url("css/corps.css");
            @import url("css/form.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    </head>
    <body>
        <script type="text/javascript" src="javascript/ajax.js"></script>
        <div class="entete">
            <img src="images/logo.jpg" alt="alt">
            <?php if(isLoggedOn()){ ?>
                <div class='deconnexion'>
                    <?php echo "<a href='./?action=deconnexion'>Déconnexion</a>"; ?>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="contenu">
            <div class="menu">
                <?php
                    if(isLoggedOn()){
                        $tableau_menu=menu();
                        for($i=0;count($tableau_menu)>$i;$i++){
                            echo "<a href='".$tableau_menu[$i]["url"]."'>".$tableau_menu[$i]["label"]."</a>";
                        }
                    }
                ?>
            </div>
            <div class="corps" id="corps">
            
        
        