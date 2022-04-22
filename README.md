# Projet Docker 
 
**Pour plus d'informations concernant les différents fichiers du projet, se référer à la documentation technique et à la documentation client**. 
 
Notre projet concerne un générateur de diaporamas « automatique ». Son objectif est de placer, dans un workflow, des fichiers markdown (d’extension .md) qui vont se transformer par la suite de diverses étapes en PDF chacun représentant un diaporama. On peut dire qu’un fichier markdown se transformé en un PDF avec plusieurs pages (diapositives). Pour cela, les fichiers markdown seront constitué d’un certain format : 

- #, ## et ### pour les niveaux de titres (# le plus grand et ### le plus petit)
- - pour les listes 
-	Styles : gras et italique 
  -	\*Texte en italique\*
  -	\_Texte en italique\_
  -	\*\*Texte en gras\*\*
  -	\_\_Texte en gras\_\_
-	\``` pour du code source 
-	\--- servira de séparateur de diapositives

Pour un fichier markdown, chaque page de diaporamas définies entre ```, sera transformé en un fichier png qui aura une page avec une présentation graphique ou en un fichier html contenant une partie CSS. Après cela, toutes les pages créées pour ce même fichier markdown seront regroupés en un fichier PDF qui constitue le diaporama final pour ce fichier markdown.

Pour réaliser toutes ces étapes, nous possédons plusieurs éléments comme le Scripting en PHP et les filtres Linus pour la partie où nous devons trier le fichier markdown et regrouper les informations et les transformer au bon format. Mais aussi, Weasyprint (partie HTML) et ImageMagick (partie PNG) pour réaliser l’étape de transformation des différentes diapositives en un PDF. Et enfin, nous utiliserons Docker ce que permettre de réaliser toute ces étapes.

Notre objectif est que le client devra déposer ses fichiers dans le workflow et cela lui remet « automatiquement » sans que le client a de commande à entrer, le lot de fichiers PDF qui sont ses diaporamas. 

