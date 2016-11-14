<div class="container">
    <h3>Search</h3>
    <form action="<?php echo URL; ?>home/search" method="POST">
        <select name="search_option">
            <?php foreach ($search_options as $option) { ?>
            <option value="<?php echo $option ?>"><?php echo $option ?></option>
            <?php } ?>
        </select>
        <input type="text" name="search_query" value="" />
        <input type="submit" name="submit_search" value="Search" />
    </form>
</div>
