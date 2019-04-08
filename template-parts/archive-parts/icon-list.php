<?php
$field = get_sub_field_object('amenities');
$value = $field['value'];
$choices = $field['choices'];

foreach ($field['choices'] as $choice_value => $choice_label) {

if (in_array($choice_value, $value)) {?>
    
    <p><span class="<?php echo $choice_value;?>"></span><?php echo $choice_label;?></p>

    <?} else {
    }
}?>