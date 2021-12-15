<?php
?>

<div class="mb-3">
    <label for="title" class="form-label">Song's Title</label>
    <input type="text" class="form-control" id="title" name="title">
</div>

<?php


    $artists = new Getter();
    $Allartist = $artists->getAllArtist();

?>
<div class="mb-3">
    <label for="author" class="form-label <?php if(isset($_GET['id'])){ echo 'd-none';} ?>">Song's Artist</label>
    <select <?php if(isset($_GET['id'])){ echo 'class="d-none"';} ?> name="artist" id="author">
        <?php

        foreach ($Allartist as $artist) {
            echo '<option value=" ' . $artist['id'] . ' ">' . $artist['name'] . '</option>';
        }
        ?>
    </select>
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Duration</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="time">
</div>

<div class="mb-3">
    <label for="publishedAt" class="form-label">published_at</label>
    <input type="date" class="form-control" id="publishedAt" name="published_at">
</div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>


