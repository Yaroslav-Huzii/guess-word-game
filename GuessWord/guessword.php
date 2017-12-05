<?php
// список слів, що будуть вгадуватись
$list = "JAVA
PHP
JAVASCRIPT
COOKIES
ERROR
DATABASE
INITIALIZATION
DEBUGGING
VERIFICATION
";

// літери, що використовуватимуться для вгадування
$alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

$additional_letters = " -.,;!?%&0123456789";


echo<<<endHTML
 
<!--
	H1		{font-family: "Courier New", Courier, monospace; font-size: 18pt;}
	P		{font-family: Verdana, Arial, sans-serif; font-size: 12pt;}
	A:link	{COLOR: #0000FF; TEXT-DECORATION: underline;}
	A:visited	{COLOR: #0000FF; TEXT-DECORATION: underline;}
	A:active	{COLOR: #0000FF; TEXT-DECORATION: underline;}
	A:hover	{COLOR: #FF0000; TEXT-DECORATION: underline;}
-->
</style>
</HEAD>

<BODY bgColor="#CCCCCC" link="navy" vlink="navy" alink="navy">
<DIV ALIGN="center">
endHTML;

$len_alpha = strlen($alpha);

if(isset($_GET["n"])) $n=$_GET["n"];
if(isset($_GET["letters"])) $letters=$_GET["letters"];
if(!isset($letters)) $letters="";

if(isset($PHP_SELF)) $self=$PHP_SELF;
else $self=$_SERVER["PHP_SELF"];

$links="";






$max=6;		// максимальна кількість неправильно введених слів			
$list = strtoupper($list);
$words = explode("\n",$list);
srand ((double)microtime()*1000000);
$all_letters=$letters.$additional_letters;
$wrong = 0;


if (!isset($n)) { $n = rand(1,count($words)) - 1; }
$word_line="";
$word = trim($words[$n]);
$done = 1;
for ($x=0; $x < strlen($word); $x++)
{
  if (strstr($all_letters, $word[$x]))
  {
    if ($word[$x]==" ") $word_line.="&nbsp; "; else $word_line.=$word[$x];
  } 
  else { $word_line.="_<font size=1>&nbsp;</font>"; $done = 0; }
}

if (!$done)
{

  for ($c=0; $c<$len_alpha; $c++)
  {
    if (strstr($letters, $alpha[$c]))
    {
      if (strstr($words[$n], $alpha[$c])) {$links .= "\n<B>$alpha[$c]</B> "; }
      else { $links .= "\n<FONT color=\"red\">$alpha[$c] </font>"; $wrong++; }
    }
    else
    { $links .= "\n<A HREF=\"$self?letters=$alpha[$c]$letters&n=$n\">$alpha[$c]</A> "; }
  }
  $nwrong=$wrong; if ($nwrong>6) $nwrong=6;
  

  if ($wrong >= $max)
  {
    $n++; 
    if ($n>(count($words)-1)) $n=0;
    echo "<BR><BR><H1><font size=5>\n$word_line</font></H1>\n";
    echo "<p><BR><FONT color=\"red\"><BIG>SORRY, YOU LOOSE!!!</BIG></FONT><BR><BR>";
    if (strstr($word, " ")) $term="phrase"; else $term="word";
    echo "The $term was \"<B>$word</B>\"<BR><BR>\n";
    echo "<A HREF=$self?n=$n>Play again.</A>\n\n";
  }
  else
  {
    echo " &nbsp; # Wrong Guesses Left: <B>".($max-$wrong)."</B><BR>\n";
    echo "<H1><font size=5>\n$word_line</font></H1>\n";
    echo "<P><BR>Choose a letter:<BR><BR>\n";
    echo "$links\n";
  }
}
else
{
  $n++;	// отримує наступне слово
  if ($n>(count($words)-1)) $n=0;
  echo "<BR><BR><H1><font size=5>\n$word_line</font></H1>\n";
  echo "<P><BR><BR><B>Congratulations!!! &nbsp;You win!!!</B><BR><BR><BR>\n";
  echo "<A HREF=$self?n=$n>Play again</A>\n\n";
}

echo<<<endHTML


endHTML;
?>
