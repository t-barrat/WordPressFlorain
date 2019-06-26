<?php
// This function enqueues the Normalize.css for use. The first parameter is a name for the stylesheet, the second is the URL. Here we
// use an online version of the css file.
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css");
}
// Retourner la premère image d'un post
function catch_that_image() {
global $post, $posts;
ob_start();
ob_end_clean();
if(preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches)) {
        return $matches [1] [0];
    } else {
        return null;
    }
}
// Register a new sidebar simply named 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
                register_sidebar( array(
                                'name'          => 'Sidebar',
                                'id'            => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget'  => '</div>',
                                'before_title'  => '<h2>',
                                'after_title'   => '</h2>',
                ) );
}
// Hook the widget initiation and run our function
add_action( 'widgets_init', 'add_Widget_Support' );

// Register a new navigation menu
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

/**
 * Ajout d'un élément avant le menu
 */
add_action( 'wp_nav_menu', 'responsive_menu_button', 9, 2 );
function responsive_menu_button( $menu, $args ) {
	// S'il s'agit du menu principal, j'ajoute mon bouton devant
	if ( 'header-menu' == $args->theme_location ) {
		$menu = '<label for="show-menu" class="show-menu">Menu</label><input type="checkbox" id="show-menu" role="button">' . $menu;
	}
	return $menu;
}

/*
* Constante globale du template
*/
define( 'TMPL_VERSION', '0.0.1' ); // forcer le rafraichissement des caches navigateurs + proxys + CDN

require_once( 'inc/css-class.php' ); // Appel dynamique des CSS
require_once( 'inc/theme-customizer-class.php' ); // Options de thème
require_once( 'inc/widgets-class.php' ); // Zones de widgets
require_once( 'inc/widget-search-class.php' ); // Widget de recherche
require_once( 'inc/widget-join-us-class.php' ); // Widget "nous rejoindre"
require_once( 'inc/widget-don-class.php' ); // Widget "Faire un don"
require_once( 'inc/widget-map-class.php' ); // Widget de cartographie

/*
SHORTCODES personnalisés
*/
function shortcodeperso_1() {
   
    include 'nav.php';
    $xmlDoc = new DOMDocument();
    $xmlDoc->load('/var/www/alternc/f/florain/www/BacASable/wp-content/themes/leflorain/acteurs-cat.xml');
    $x = $xmlDoc->documentElement;

    // Generate the script to show / hide categories
    $cat_ids = array();
    $btn_ids = array();
    $idx = 0;

    $categories = $x->getElementsByTagName('categorie');
    $nb_cat = $categories->length;

    for ($cat = 0; $cat < $nb_cat; ++$cat) {
        $categorie = $categories[$cat];
        if ($categorie->hasAttribute('type') &&
            $categorie->getAttribute('type') != ''
        ) {
            $sous_categories = $categorie->getElementsByTagName('scat');
            $nb_sous_cat = $sous_categories->length;
            if ($nb_sous_cat > 1) {
                for ($scat = 0; $scat < $nb_sous_cat; ++$scat) {
                    $id = '#cat'.$cat.'scat'.$scat;
                    $cat_ids[$idx] = $id;
                    $id = '#press_cat'.$cat.'scat'.$scat;
                    $btn_ids[$idx] = $id;
                    $idx = $idx + 1;
                }
            } else {
                $id = '#cat'.$cat;
                $cat_ids[$idx] = $id;
                $id = '#press_cat'.$cat;
                $btn_ids[$idx] = $id;
                $idx = $idx + 1;
            }
        }
    }

    $cat_ids[$idx] = '#marches';
    $btn_ids[$idx] = '#press_marches';

    $cat_displayed = rand(0, count($btn_ids) - 1);
    echo "<script>\n";
    echo "$(document).ready(function(){\n";
    for ($b = 0; $b < count($btn_ids); ++$b) {
        echo "$('".$btn_ids[$b]."').click(function(){\n";
        for ($c = 0; $c < count($cat_ids); ++$c) {
            if ($b == $c) {
                echo "$('".$cat_ids[$c]."').show();";
            } else {
                echo "$('".$cat_ids[$c]."').hide();";
            }
        }
        echo "});\n";
    }
    echo "});\n";
    echo "</script>\n";

    function is_hidden($cat, $cat_displayed)
{
    if ($cat != $cat_displayed) {
        return 'hidden';
    }

    return '';
}
     // $header = new Header();
    //  $header->display();

      echo "<div id='acteurs'>";
    //  $header->display_acteurs_nav();

    echo '<a target="_blank" href="/wp-content/themes/leflorain/annuaire.php?type=Poche" style="display: block;"> Annuaire de poche</a>';
    echo '<a target="_blank" href="/wp-content/themes/leflorain/annuaire.php?type=Livret" style="display: block;"> Annuaire en livret</a>';

      //echo '<h2>'.$x->getAttribute('titre').'</h2>';
      echo '<h3> Dernière mise à jour : '.substr($x->getAttribute('titre'),29,20).'</h3>';
      

      echo "<section class='paragraphe'>";

      echo "<section class='column toc'>";

      for ($cat = 0; $cat < $nb_cat; ++$cat) {
          $categorie = $categories[$cat];
          if ($categorie->hasAttribute('type') &&
              $categorie->getAttribute('type') != ''
          ) {
              $acteurs = $categorie->getElementsByTagName('acteur');
              $nb = $acteurs->length;
              echo "<h4 class='toc'><a href='#acteurs' id='press_cat".$cat."'>".$categorie->getAttribute('type').' ('.$nb.')</a></h4>';
              $sous_categories = $categorie->getElementsByTagName('scat');
              $nb_sous_cat = $sous_categories->length;
              for ($scat = 0; $scat < $nb_sous_cat; ++$scat) {
                  $sous_categorie = $sous_categories[$scat];
                  if ($sous_categorie->hasAttribute('type') &&
                      $sous_categorie->getAttribute('type') != ''
                  ) {
                      $acteurs = $sous_categorie->getElementsByTagName('acteur');
                      $nb = $acteurs->length;
                      echo "<h5 class='toc' ><a href='#acteurs' id='press_cat".$cat.'scat'.$scat."'>".$sous_categorie->getAttribute('type').' ('.$nb.')</a></h5>';
                  }
              }
          }
      }
      $marche_cat = $x->getElementsByTagName('marches');
      $marches = $marche_cat[0]->getElementsByTagName('scat');
      $nb_marches = $marches->length;
      echo "<h4 class='toc'><a href='#acteurs' id='press_marches'>".$marche_cat[0]->getAttribute('type').' ('.$nb_marches.')</a></h4>';
      echo '</section>';

      echo "<div id='show'>";
      $cat_idx = 0;
      for ($cat = 0; $cat < $nb_cat; ++$cat) {
          $categorie = $categories[$cat];
          $sous_categories = $categorie->getElementsByTagName('scat');
          $nb_sous_cat = $sous_categories->length;
          if (!$categorie->hasAttribute('type')) {
              continue;
          }
          if ($nb_sous_cat > 1) {
              echo "<div id='cat".$cat."'>";
          } else {
              echo "<div id='cat".$cat."' ".is_hidden($cat_idx++, $cat_displayed).'>';
              echo "<h1 id='cat".$cat."'>".$categorie->getAttribute('type').'</h1>';
          }

          for ($scat = 0; $scat < $nb_sous_cat; ++$scat) {
              $sous_categorie = $sous_categories[$scat];

              if ($sous_categorie->hasAttribute('type') &&
                  $sous_categorie->getAttribute('type') != ''
              ) {
                  echo "<div id='cat".$cat.'scat'.$scat."' ".is_hidden($cat_idx++, $cat_displayed).'>';
                  echo '<h1>'.$categorie->getAttribute('type').' / '.$sous_categorie->getAttribute('type').'</h1>';
              } else {
                  echo "<div id='cat".$cat.'scat'.$scat."'>";
              }
              $acteurs = $sous_categorie->getElementsByTagName('acteur');
              $nb = $acteurs->length;

              echo "<section class='column'>";

              $indexes = range(0, $nb - 1);
              shuffle($indexes);
              for ($pos = 0; $pos < $nb; ++$pos) {
                  $acteur = $acteurs[$indexes[$pos]];
                  if ($acteur->hasAttribute('attente')) {
                      continue;
                  }
                  $acteur_class = 'commerce';
                  if ($acteur->hasAttribute('comptoir') &&
                      $acteur->getAttribute('comptoir') == 'oui') {
                      $acteur_class = 'comptoir';
                  }

                  $image = $acteur->getAttribute('image');
                  $siteweb = '';

                  $titre = $acteur->getAttribute('titre');
                  $desc = $acteur->getAttribute('desc');
                  $adresse = $acteur->getAttribute('adresse');

                  $p = <<<EOD
                  <acteur class="$acteur_class">
                    <h2>$titre</h2>
                    <img src="images/acteurs/$image" alt="$titre" />
EOD;
                  echo $p;
                  if ($acteur_class == 'comptoir') {
                      echo '<h3>Comptoir de change</h3>';
                  }
                  if ($acteur->hasAttribute('message')) {
                      echo "<p class='message'>".$acteur->getAttribute('message').'</p>';
                  }
                  $p = <<<EOD
                  <p>$desc</p>
                  <p>$adresse</p>
EOD;
                  echo $p;
                  if ($acteur->hasAttribute('siteweb')) {
                      $siteweb = $acteur->getAttribute('siteweb');
                      $p = <<<EOD
                      <a href="http://$siteweb">$siteweb</a>
EOD;
                      echo $p;
                  }
                  echo '</acteur>';
              }
              echo '</section>';
              echo '</div>';
          }
          echo '</div>';
      }

      /* marches */

      $tous_les_acteurs = $x->getElementsByTagName('acteur');
      $nb_a = $tous_les_acteurs->length;

      $exposants = array();

      $indexes = array();
      for ($a = 0; $a < $nb_a; ++$a) {
          $acteur = $tous_les_acteurs[$a];
          if (!$acteur->hasAttribute('marche')) {
              continue;
          }
          $les_marches = utf8_decode($acteur->getAttribute('marche'));
          $ids = preg_split("/[\s,]+/", $les_marches);
          $nb_ids = count($ids);

          for ($i = 0; $i < $nb_ids; ++$i) {
              if (empty($indexes[$ids[$i]])) {
                  $indexes[$ids[$i]] = 0;
              }
              $exposants[$ids[$i]][$indexes[$ids[$i]]] = $acteur;
              $indexes[$ids[$i]] = $indexes[$ids[$i]] + 1;
          }
      }

      $indexes = range(0, $nb_marches - 1);
      shuffle($indexes);
      echo "<div id='marches' ".is_hidden($cat_idx++, $cat_displayed).'>';
      echo '<h1>'.$marche_cat[0]->getAttribute('type').'</h1>';
      echo "<section class='column'>";
      for ($pos = 0; $pos < $nb_marches; ++$pos) {
          $acteur = $marches[$indexes[$pos]];
          if ($acteur->hasAttribute('attente')) {
              continue;
          }
          $acteur_class = 'commerce';

          $image = $acteur->getAttribute('image');
          $siteweb = '';

          $titre = $acteur->getAttribute('titre');
          $desc = $acteur->getAttribute('desc');
          $adresse = $acteur->getAttribute('adresse');

          $p = <<<EOD
        <acteur class="$acteur_class">
          <h2>$titre</h2>
          <img src="images/acteurs/$image" alt="$titre" />
EOD;
          echo $p;
          if ($acteur_class == 'comptoir') {
              echo '<h3>Comptoir de change</h3>';
          }
          if ($acteur->hasAttribute('message')) {
              echo "<p class='message'>".$acteur->getAttribute('message').'</p>';
          }
          $p = <<<EOD
        <p>$desc</p>
        <p>$adresse</p>
EOD;
          echo $p;
          if ($acteur->hasAttribute('siteweb')) {
              $siteweb = $acteur->getAttribute('siteweb');
              $p = <<<EOD
            <a href="http://$siteweb">$siteweb</a>
EOD;
              echo $p;
          }

          $p = <<<EOD
        <p><b>Retrouvez:</b></p>
EOD;
          echo $p;

          $id = $acteur->getAttribute('id');
          $nb_e = count($exposants[$id]);
          $idx_e = range(0, $nb_e - 1);
          shuffle($idx_e);
          for ($e = 0; $e < $nb_e; ++$e) {
              $expo = $exposants[$id][$idx_e[$e]];

              if ($expo->hasAttribute('attente')) {
                  continue;
              }
              $message_comptoir = 'none';
              $acteur_class = 'commerce';
              if ($expo->hasAttribute('comptoir') &&
              $expo->getAttribute('comptoir') == 'oui') {
                  if ($acteur->hasAttribute('message_comptoir')) {
                      $acteur_class = 'comptoir';
                      $message_comptoir = $acteur->getAttribute('message_comptoir');

                      $p = <<<EOD
EOD;
                      echo $p;
                  }
              }

              $titre = $expo->getAttribute('titre');
              $bref = $expo->getAttribute('bref');

              echo "<p class='".$acteur_class."'><b>".$titre.':</b> '.$bref;
              if ($message_comptoir != 'none') {
                  echo '<br/>'.$message_comptoir;
              }
              echo '</p>';
          }

          echo '</acteur>';
      }
      echo '</section>';
      echo '</div>';
?>
</div> <!-- top -->
</section> <!-- paragraphe -->


          </div>



<?php
}


function shortcodeperso_99() {
    // Fake function to record on wp the shortcode with no code inside
}
//////////
add_shortcode('acteurs_agrees', 'shortcodeperso_1');

?>