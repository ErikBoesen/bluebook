<?php
	// Create a database connection
	$connection = mysql_connect("mysql.yalerecord.com","yalerecord","");
	//$connection = mysql_connect("localhost","root","test");
	if(!$connection) {
		die("Database connection failed: " . mysql_error());
	}
	// Select a database to use
	$db_select = mysql_select_db("facebook", $connection);
	if(!$db_select) {
		die("Database selection failed: " . mysql_error());
	}
	$listing = $_POST['ProgramSubject'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
    <title><?php echo $listing; ?></title>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html;CHARSET=iso-8859-1">
    <meta NAME="Author" CONTENT="The Yale Record">
    <link href="bluebook.css" rel="stylesheet" type="text/css">
    <script language="JavaScript">
    <!--
    function openWindow(url, name, width, height, scrollbars, resizable, toolbar, location, directories, status, menubar) {
        var win,
            features = "";

        if ( name == null )
            name = "subWin";

        if ( width == null )
            features = "width=" + 640;
        else {
            if ( width != 0 )
                features = "width=" + width;
        }

        if ( height == null )
            features = features + ",height=" + 480;
        else {
            if (height != 0 )
                features = features + ",height=" + height;
        }

        if ( scrollbars == null )
            features = features + ",scrollbars=" + 1;
        else
            features = features + ",scrollbars=" + scrollbars;

        if ( resizable == null )
            features = features + ",resizable=" + 1;
        else
            features = features + ",resizable=" + resizable;

        if ( toolbar == null )
            features = features + ",toolbar=" + 0;
        else
            features = features + ",toolbar=" + toolbar;

        if ( location == null )
            features = features + ",location=" + 0;
        else
            features = features + ",location=" + location;

        if ( directories == null )
            features = features + ",directories=" + 0;
        else
            features = features + ",directories=" + directories;

        if ( status == null )
            features = features + ",status=" + 0;
        else
            features = features + ",status=" + status;

        if ( menubar == null )
            features = features + ",menubar=" + 0;
        else
            features = features + ",menubar=" + menubar;

        win = window.open(url, name, features);

        win.focus();

        return( false );
    }
	-->
	</script>
</head>

<body>
	<div align="right" id="headerimg"><img src="bluebook_images/yale_oci_banner_sm.gif" /></div>
	<div id="wrapper">
	<?php
		//check to see if a department was selected
		if (is_null($listing)) {
			echo '<p><img src="bluebook_images/label_results_ofsearch_none.gif" width="389" height="18" align="BOTTOM" border="0"> <p><font size="2" face="Verdana, Geneva, Arial, sans-serif">If you\'re looking for an independent studies course, outside the constraints of departmental bureaucracy, why don\'t you check the course listings at <a href="http://www.reed.edu/commie_curriculum">www.reed.edu</a>.</font></p>';
		} elseif ($listing == "ALL") {
			echo "<div class=\"allDepts\">Really? You can't choose just one department? Well look at you, Dr. Polymath. Why don't you just fess up: you're going to major in History anyway.</div>";
		} else {
			// Perform database query to return department header information
			$result_dept = mysql_query("SELECT * FROM bluebook_departments WHERE name = '{$listing}'", $connection);
			if(!$result_dept) {
				die("Database query failed: " . mysql_error());
			}
			// Read out returned data in h1 tags and divs with the id "description"
			$row_dept = mysql_fetch_array($result_dept);
			// Store the abbreviation for this department for use below
			$abbrev = $row_dept['abbreviation'];
			echo "<h1>".$row_dept['name']."</h1><div id=\"description\">".$row_dept['description']."</div>";
		?>
			<br />
			<div id="guide">
				<a href="how-to-read-bluebook.pdf" target="guideWin" onclick="openWindow('','guideWin',800,600);">Click here for a guide on how to read the courses on this page.</a>
			</div>

			<h2>Courses for the 2009-2010 Academic Year</h2>
		<?php
			// Perform database query to return the courses in this department
			$result_classes = mysql_query("SELECT * FROM bluebook_classes WHERE department = '{$listing}'", $connection);
			if(!$result_classes) {
				die("Database query failed: " . mysql_error());
			}

			/*
			Read out returned data, formatted in divs with the class "titleLine", "infoLine",
			"courseDescrip", and the span "prereqs" which is within the div "courseDescrip"

			everything on the infoLine needs to be developed more within the database,
			in order to include all of the distributional requirement info
			*/
			while ($row_classes = mysql_fetch_array($result_classes)) {
				if ($row_classes['time'] == "[Canceled]") {
					echo "<div class=\"titleLine\">[&nbsp;&nbsp;".$abbrev." ".$row_classes['number'].", ".$row_classes['name'].".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row_classes['professor'].".&nbsp;&nbsp;]</div><br />";
				} else {
					echo "<div class=\"titleLine\">".$abbrev." ".$row_classes['number'].", ".$row_classes['name'].".&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row_classes['professor'].".</div>";
					echo "<div class=\"infoLine\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row_classes['time']."</div>";
					echo "<div class='courseDescrip'>".$row_classes['description']."<span class=\"prereqs\">".$row_classes['prerequisites']."</span></div>";
				}
			}
		}
	?>
	</div>
</body>
</html>
