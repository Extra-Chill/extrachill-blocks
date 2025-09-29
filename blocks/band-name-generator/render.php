<?php
/**
 * Render callback for the band name generator block
 *
 * @param array $attributes Block attributes
 * @param string $content Block content
 * @param WP_Block $block Block instance
 * @return string Block HTML output
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$title = isset($attributes['title']) ? $attributes['title'] : 'Band Name Generator';
$button_text = isset($attributes['buttonText']) ? $attributes['buttonText'] : 'Generate Band Name';

$wrapper_attributes = get_block_wrapper_attributes([
    'class' => 'extrachill-blocks-band-name-generator'
]);

ob_start();
?>
<div <?php echo $wrapper_attributes; ?>>
    <h3><?php echo esc_html($title); ?></h3>
    <form class="extrachill-blocks-generator-form" data-generator-type="band">
        <div class="form-group">
            <label for="input"><?php _e('Your Name/Word:', 'extrachill-blocks'); ?></label>
            <input type="text" id="input" name="input" placeholder="<?php _e('Enter your name or word', 'extrachill-blocks'); ?>" required>
        </div>
        <div class="form-group">
            <label for="genre"><?php _e('Genre:', 'extrachill-blocks'); ?></label>
            <select id="genre" name="genre">
                <option value="rock"><?php _e('Rock', 'extrachill-blocks'); ?></option>
                <option value="country"><?php _e('Country', 'extrachill-blocks'); ?></option>
                <option value="metal"><?php _e('Metal', 'extrachill-blocks'); ?></option>
                <option value="indie"><?php _e('Indie', 'extrachill-blocks'); ?></option>
                <option value="punk"><?php _e('Punk', 'extrachill-blocks'); ?></option>
                <option value="jam"><?php _e('Jam', 'extrachill-blocks'); ?></option>
                <option value="electronic"><?php _e('Electronic', 'extrachill-blocks'); ?></option>
                <option value="random"><?php _e('Random', 'extrachill-blocks'); ?></option>
            </select>
        </div>
        <div class="form-group">
            <label for="number_of_words"><?php _e('Number of Words:', 'extrachill-blocks'); ?></label>
            <select id="number_of_words" name="number_of_words">
                <option value="2"><?php _e('2 Words', 'extrachill-blocks'); ?></option>
                <option value="3"><?php _e('3 Words', 'extrachill-blocks'); ?></option>
                <option value="4"><?php _e('4 Words', 'extrachill-blocks'); ?></option>
            </select>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="first-the" value="true">
                <?php _e('Add "The" at the beginning', 'extrachill-blocks'); ?>
            </label>
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="and-the" value="true">
                <?php _e('Add "& The" in the middle', 'extrachill-blocks'); ?>
            </label>
        </div>
        <button type="submit"><?php echo esc_html($button_text); ?></button>
    </form>
    <div class="extrachill-blocks-generator-result">
        <div class="generated-name-wrap">
            <em><?php _e('Your band name will appear here', 'extrachill-blocks'); ?></em>
        </div>
    </div>
</div>
<?php
return ob_get_clean();