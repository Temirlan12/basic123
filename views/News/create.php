<?php

?>
<h2>News Creation</h2>
<form name="f1" method="post"  action="/news/create">
    <input name="link" type="hidden" value="index.php" />
    Title: <br />
    <input name="title" type="text" size="25" maxlength="30" value="" /> <br />
    Text: <br />
    <p><textarea name="text" id="Text" cols="48" rows="8"> </textarea></p>
    <input type="submit" name="enter" value="Create" />
    <a href="/news/" class="btn">Home</a>
</form>

