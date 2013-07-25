<?php
/**
 * Global Discount (lite) extension for Opencart.
 *
 * @author Anthony Lawrence <freelancer@anthonylawrence.me.uk>
 * @copyright © Anthony Lawrence 2011
 * @license Creative Common's ShareAlike License - http://creativecommons.org/licenses/by-sa/3.0/
 */
?>

<?php echo $header; ?>
<?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="box">
    <div class="left"></div>
    <div class="right"></div>
    <div class="heading">
        <h1 style="background-image: url('view/image/total.png');"><?php echo $heading_title; ?></h1>
        <div class="buttons"><a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a></div>
    </div>
    <div class="content">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
            <table class="form">
                <tr>
                    <td><?php echo $entry_total; ?></td>
                    <td><input type="text" name="global_discount_total" value="<?php echo $global_discount_total; ?>" /></td>
                </tr>
                <tr>
                    <td><?php echo $entry_amount; ?></td>
                    <td><input type="text" name="global_discount_amount" value="<?php echo $global_discount_amount; ?>" /></td>
                </tr>
                <tr>
                    <td><?php echo $entry_type; ?></td>
                    <td>
                        <select name="global_discount_type" id="global_discount_type">
                            <option value="F" <?= (($global_discount_type == "F" ? "selected='selected'" : "")) ?>>Fixed Value</option>
                            <option value="P" <?= (($global_discount_type == "P" ? "selected='selected'" : "")) ?>>Percentage</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><?php echo $entry_date_start; ?></td>
                    <td><input type="text" name="global_discount_date_start" id="date_start" value="<?php echo $global_discount_date_start; ?>" /></td>
                </tr>
                <tr>
                    <td><?php echo $entry_date_end; ?></td>
                    <td><input type="text" name="global_discount_date_end" id="date_end" value="<?php echo $global_discount_date_end; ?>" /></td>
                </tr>
                <tr>
                    <td><?php echo $entry_status; ?></td>
                    <td><select name="global_discount_status">
                            <?php if ($global_discount_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                            <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
                <tr>
                    <td><?php echo $entry_sort_order; ?></td>
                    <td><input type="text" name="global_discount_sort_order" value="<?php echo $global_discount_sort_order; ?>" size="1" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<script type="text/javascript" src="view/javascript/jquery/ui/ui.datepicker.js"></script>
<script type="text/javascript"><!--
    $(document).ready(function() {
        $('#date_start').datepicker({dateFormat: 'yy-mm-dd'});

        $('#date_end').datepicker({dateFormat: 'yy-mm-dd'});
    });
    //--></script>

<?php echo $footer; ?>