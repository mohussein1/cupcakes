<?php
//the function which calls submenu *code taken from lauries lab 4* 
function cd_add_submenu() {
add_submenu_page( 'themes.php', 'update your cupcake', 'Theme Options', 'manage_options',
'theme_options', 'my_theme_options_page');
}
add_action( 'admin_menu', 'cd_add_submenu' );

//this code registers the function so they can add or remove options
function cd_settings_init() {
register_setting( 'theme_options',
'cd_options_settings' );

//the setting field coincides with the function code below. 
add_settings_section(
'cd_options_page_section', 
'Cupcakes', 
'cd_options_page_section_callback', 
'theme_options' 
);

function cd_options_page_section_callback() {
echo 'On this theme options page, you will be able to customize your website to your match your cupcake needs.' ;
}
//this specific setting field cold creates a text area and the function below call it
add_settings_field(
'cd_textarea_field',
'Customize your Cupcake content',
'cd_textarea_field_render',
'theme_options',
'cd_options_page_section'
);

function cd_textarea_field_render() {
$options = get_option( 'cd_options_settings' );
?>
<textarea cols="50" rows="6" name="cd_options_settings
[cd_textarea_field]"><?php
if (isset($options['cd_textarea_field'])) echo $options
['cd_textarea_field'];
?></textarea>
<?php
}

add_settings_field(
'cd_checkbox_field',
'I want a pink background',
'cd_checkbox_field_render',
'theme_options',
'cd_options_page_section'
);
//I used a checkbox to change the background. Changed the value to the html color pink
function cd_checkbox_field_render() {
$options = get_option( 'cd_options_settings' );
?>
<input type="checkbox" name="cd_options_settings[cd_checkbox_field]" <?php if (isset($options['cd_checkbox_field'])) checked( 'on',($options['cd_checkbox_field']) ); ?> value="#FAAFBE" />
<label>Background color</label>
<?php
}

//the code here works to save the value on the actions committed above
function my_theme_options_page(){
?>
<form action="options.php" method="post">
<h2>Update Your Cupcake Designs</h2>
<?php
settings_fields( 'theme_options' );
do_settings_sections( 'theme_options' );
submit_button();
?>
</form>
<?php
}

}

add_action( 'admin_init', 'cd_settings_init' );
?>

