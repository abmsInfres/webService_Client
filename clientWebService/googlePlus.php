<!DOCTYPE html>  
<html lang="fr">  
	<head>  
    <meta charset="utf-8">
	  <title>Mise en oeuvre de l’API Google+ en PHP : Partie 1 – Afficher votre profil</title> 
	  
	  <!-- include -->
    <link rel="stylesheet" href="../style.css" />	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script> 
    
    <style>
    	.Ec {
		    color: #888888;
		    font-size: 15px;
		    font-weight: normal;
		    line-height: 1.2em;
		    margin-bottom: 0;
		    text-align: right;
		    vertical-align: top;
		    width: 110px;
			}
			.a-l-k {
			    display: inline-block;
			    position: relative;
			}
			h1, h2 {
			    border: 0 none;
			    margin: 0;
			}
			.Aa {
			    line-height: 1.39em;
			    padding: 0 0 0 15px;
			    vertical-align: top;
			    width: 800px;
			}
			.a-l-k {
			    display: inline-block;
			    position: relative;
			}
			.ts {
			    border: medium none;
			}
			.Ic {
			    color: #333333;
			    font: 13px arial,sans-serif;
			    margin: 0;
			    padding: 10px 0;
			    text-align: left;
			}
			em { 
				color: #999999; 
			}
    </style> 
	</head> 
	 
	<body>  
		<div class="center">
			<?php
				$profil_googleplus_json = file_get_contents("https://www.googleapis.com/plus/v1/people/116475369142621368056?key=3Al35hLUAROhyoqiqbCzzVWY");
				$profil_googleplus = json_decode($profil_googleplus_json);
			?>	
			<div class="bio">
				<div class="g-Jd ts Ic pb" style="text-align: center">
					<img src="<?php echo $profil_googleplus->image->url; ?>" alt="Photo de profil" />
				</div>
				
				<div class="g-Jd ts Ic pb">
					<h2 class="Ec a-l-k">Nom</h2>
					<div class="Aa a-l-k note"><?php echo $profil_googleplus->displayName; ?> <em>(<?php echo $profil_googleplus->tagline; ?>)</em></div>
				</div>
				
				<div class="g-Jd ts Ic pb">
				  <h2 class="Ec a-l-k">Présentation</h2>
				  <div class="Aa a-l-k note"><?php echo $profil_googleplus->aboutMe; ?></div>
				</div>
				
				<div class="g-Jd ts Ic pb">
					<h2 class="Ec a-l-k">Emplois</h2>
					<?php foreach ($profil_googleplus->organizations as $_organization) { 
									if ($_organization->type != "work") { 
										continue;
									}
					?>
					<div class="Aa a-l-k note"><?php echo $_organization->name; ?> <em>(<?php echo $_organization->title; ?>)</em></div>
					<?php } ?>
				</div>
				
				<div class="g-Jd ts Ic pb">
					<h2 class="Ec a-l-k">Formation</h2>
					<?php foreach ($profil_googleplus->organizations as $_organization) { 
									if ($_organization->type != "school") { 
										continue;
									}
					?>
					<div class="Aa a-l-k note"><?php echo $_organization->name; ?> <em>(<?php echo $_organization->title; ?>)</em></div>
					<?php } ?>
				</div>
			</div>
			
	  </div>
			
  </body>  
</html>  