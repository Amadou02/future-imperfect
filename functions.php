<?php
/*----------------------------------------------------------------------------
 * Intégration de TMG Plugin activation
 *----------------------------------------------------------------------------*/
require_once dirname(__FILE__) . '/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'register_required_plugin');

function register_required_plugin()
{
    // inclure un plugin pré-packagé dans le thème
    $plugins = array(
        array(
            'name' => 'GitHub Updater',
            'slug' => 'github-updater',
            'source' => get_stylesheet_directory() . '/github-updater-9.9.10.zip',
            'required' => true,
        ),
        array(
            'name' => 'MailPoet', // Le nom du plugin
            'slug' => 'wysija-newsletters', // Le slug du plugin (généralement le nom du dossier)
            'required' => false, // FALSE signifie que le plugin est seulement recommandé
        ),
    );
    $theme_text_domain = 'futureImperfect';

    $config = array(
        'domain' => $theme_text_domain, // Text domain - le même que celui de votre thème
        'default_path' => '', // Chemin absolu par défaut pour les plugins pré-packagés 
        'menu' => 'install-my-theme-plugins', // Menu slug 
        'strings' => array(
            'page_title' => __('Installer les plugins recommandés', $theme_text_domain), // 
            'menu_title' => __('Installation des Plugins', $theme_text_domain), // 
            'instructions_install' => __('Le plugin %1$s est recommandé pour ce thème. Cliquer sur le boutton pour installer et activer %1$s.', $theme_text_domain), // %1$s = nom du plugin 
            'instructions_activate' => __('Le plugin %1$s est installé mais inactif. Aller à <a href="%2$s">la page d administration</a> pour son activation.', $theme_text_domain), // %1$s = nom du plugin, %2$s = plugins page URL 
            'button' => __('Installer %s maintenant', $theme_text_domain), // %1$s = nom du plugin 
            'installing' => __('Installation du Plugin: %s', $theme_text_domain), // %1$s = nom du plugin 
            'oops' => __('Une erreur s est produite.', $theme_text_domain), // 
            'notice_can_install' => __('Ce thème recommande le plugin %1$s. <a href="%2$s"><strong>Cliquer ici pour commencer son installation</strong></a>.', $theme_text_domain), // %1$s = nom du plugin , %2$s = TGMPA page URL 
            'notice_cannot_install' => __('Désolé, vous ne détenez pas les permissions necessaires pour installer le plugin %1$s.', $theme_text_domain), // %1$s = nom du plugin 
            'notice_can_activate' => __('Ce thème necessite le plugin %1$s. Actuellement inactif, vous devez vous rendre sur <a href="%2$s">la page d administration du plugin</a> pour l activer.', $theme_text_domain), // %1$s = plugin name, %2$s = plugins page URL 
            'notice_cannot_activate' => __('Désolé, vous ne détenez pas les permissions necessaires pour activer le plugin %1$s.', $theme_text_domain), // %1$s = nom du plugin 
            'return' => __('Retour à l installeur de plugins', $theme_text_domain),
        ),
    );
    tgmpa($plugins, $config);
}
/*----------------------------------------------------------------------------
 * Intégration de carbon fields
 *----------------------------------------------------------------------------*/

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('theme_options', __('Theme Options', 'crb'))
        ->add_tab(__('Profile'), array(
            Field::make('text', 'crb_label', 'Titre de la section'),
            Field::make('textarea', 'crb_description', 'Description'),
            Field::make('urlpicker', 'crb_profilelink', 'Lien du profil'),
        ))
        ->add_tab(__('Réseaux sociaux'), array(
            Field::make('urlpicker', 'crb_facebook', 'Facebook'),
            Field::make('urlpicker', 'crb_twitter', 'Twitter'),
            Field::make('urlpicker', 'crb_instagram', 'Instagram'),
            Field::make('urlpicker', 'crb_rss', 'Flux RSS'),
            Field::make('urlpicker', 'crb_email', 'Email'),
        ))
        ->add_tab(__('Mini posts'), array(
            Field::make('association', 'crb_mini_posts', 'Choix des mini posts')
                ->set_min(0)
                ->set_max(3),
        ))
        ->add_tab(__('Liste de mini posts'), array(
            Field::make('association', 'crb_mini_posts_list', 'Choix de la liste de mini posts')
                ->set_min(0)
                ->set_max(5),
        ));
}

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

// fin

add_theme_support('post-thumbnails');

function futureImperfect_enqueue_assets()
{

    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');

    wp_enqueue_script('browser', get_template_directory_uri() . '/assets/js/browser.min.js', array(), '1.0', true);
    wp_enqueue_script('breakpoints', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array(),  '1.0', true);
    wp_enqueue_script('util', get_template_directory_uri() . '/assets/js/util.js', array('jquery'),  '1.0', true);
    wp_enqueue_script('main-css', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'breakpoints', 'browser', 'util'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'futureImperfect_enqueue_assets');

// enregistrer la navbar

register_nav_menus(array(
    'main' => 'Menu principal',
    'footer' => 'pied de page'
));
