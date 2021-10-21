<h1>PHP demo page</h1>

<p>You can execute php in your post by using the php quotes.</p>

<h3>Example:</h3>
<pre>
<code class="prettyprint">&lt;?php
    $num = 1;
    for($i = 0; $i < 10; $i++)
    { 
        $num += 1;
        echo "&lt;p&gt;pow({$num}, {$num}) = " . pow($num, $num) . "&lt;/p&gt;";
    }
?&gt;</code>
</pre>

<h3>Result:</h3>
<?php
    $num = 1;
    for($i = 0; $i < 10; $i++)
    { 
        $num += 1;
        echo "<p>pow({$num}, {$num}) = " . pow($num, $num) . "</p>";
    }
?>
