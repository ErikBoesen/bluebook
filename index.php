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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">



<html>
<head>
    <title>Yale Record Online Course Information | Search Courses</title>
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
    <meta NAME="Author" CONTENT="The Yale Record">

<!--TEST FOR BROWSERS-->
    <script language="JavaScript">
    <!--
    // Test for Browser version and brand.
    var isNav, isIE, isOther;
    // Used to capture programs selected by user. These programs will be set as
    // selected after user selects new course category.
    var arr = new Array();

    if ( parseInt(navigator.appVersion) >= 4 ) {
        if ( navigator.appName == "Netscape" )
            isNav = true;
        else if ( navigator.appName == "Microsoft Internet Explorer" )
            isIE = true;
        else
            isOther = true;
    }
	-->
</script>

    <script language="JavaScript">
    <!--

    function resetForms() {
        <!-- array contains selected programs -->
        arr.length = 0;
        document.forms[0].reset();
    }

    function winClose() {
        window.parent.close();
    }

    function removeOption(selectObject, index) {
        if ( isNav )
            selectObject[index] = null;
        else if ( isIE )
            selectObject.remove(index);
    }

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

    // Looks for containing TD cell and sets its background color
    function colorTDCell(element, color) {
        while (element.tagName.toUpperCase() != 'TD' && element != null) {
            element = element.parentNode;
        }
        if (element)
            element.bgColor = color;
    }

    // -->
</script>

<!--script to make highlight options when selected-->
<SCRIPT LANGUAGE='Javascript'>
<!--
function highlightDOW () {
    var element = document.frmSearch.dow[0];
    var dowColor = 'white' ;
    var i = 0;
    while (i < document.frmSearch.dow.length) {
        if (document.frmSearch.dow[i].checked) {
           dowColor='#FFCCCC';
           break;
        }
        i++;
    }
    colorTDCell(element, dowColor);
}
function highlightDistrib () {
    var element = document.frmSearch.distributionalgroup[0];
    var color = '#CCCCCC' ;
    var i = 0;
    while (i < document.frmSearch.distributionalgroup.length) {
        if (document.frmSearch.distributionalgroup[i].checked) {
           color='#FFCCCC';
           break;
        }
        i++;
    }
    colorTDCell(element, color);
}
function highlight(element) {
    var color = '#EBEBEB' ;
    var i = 0;
    if (element.checked) {
        color='#FFCCCC';
    }
    colorTDCell(element, color);
}

//-->
</SCRIPT>
<!--how to highlight changed text-->
<style>
.changedField
{
    color:#CC0000;
    font-weight: bold;
}
</style>

</head>

<body bgcolor="#FFFFCC" link="#000066" vlink="#000066" alink="#000066">

<form name="frmSearch" action="resultWindow.php" target="resultWin" method="post" onSubmit="openWindow('','resultWin',800,600);">
    <p>
  <table width="780" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="62">&nbsp;</td>
      <td colspan="2" align="right"><img src="bluebook_images/yale_oci_banner_sm.gif" alt="Online Course Information, Yale University" border="0" width="570" height="45"></td>
    </tr>
    <tr>
      <td width="10" height="62"> <img src="bluebook_images/spacer.gif" width="10" height="10" align="BOTTOM" border="0">
      </td>
      <td valign="top" width="200" height="350" bgcolor="#333399">
        <table border="0" cellpadding="0" cellspacing="0" bgcolor="#333399">
    <tr>

    <td><img src="bluebook_images/scancol_01.gif" width="200" height="10" align="BOTTOM" border="0"></td>
    </tr>
     <tr>
        <td><a href="http://www.yalerecord.com" target="_blank"><img src="bluebook_images/scancol_searchOCE.gif"  align="BOTTOM" border="0" alt="Search Course Evaluations"></a></td>
     </tr>

    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_02_search_on.gif"  align="BOTTOM" border="0" alt="Search Courses"></a></td>
    </tr>
    <tr>
        <script language="JavaScript">
        <!--
        var currentURL = new String(window.location);

        if ( currentURL.indexOf("howTo.jsp") != -1 )
            document.write('<td><img src="bluebook_images/scancol_03_how_to_on.gif"  align="BOTTOM" border="0" alt="How to use this site"></td>');
        else
            document.write('<td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_03_how_to.gif"  align="BOTTOM" border="0" alt="How to use this site"></a></td>');
        // -->
        </script>
    </tr>
     <tr>
        <td><a href="http://www.yalerecord.com" target="_blank"><img src="bluebook_images/scancol_04_browser_req.gif"  align="BOTTOM" border="0" alt="Browser Requirements"></a></td>
     </tr>

    <tr>
        <td><img src="bluebook_images/scancol_04.gif" width="200" height="19" align="BOTTOM" border="0"></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_07_yale_college.gif" width="200" height="20" align="BOTTOM" border="0" alt="Yale College Programs of Study"></a></td>
    </tr>
        <tr>
        <td><a href="http://www.yalerecord.com" target="_blank"><img src="bluebook_images/scancol_supplement.gif" width="200" height="20" align="BOTTOM" border="0" alt="Yale College Course Supplement"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_08_grad_school.gif" width="200" height="38" align="BOTTOM" border="0" alt="Graduate School of Arts and Sciences Programs and Policies"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_09_prof_school.gif" width="200" height="21" align="BOTTOM" border="0" alt="Professional school bulletins"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_10_residential.gif" width="200" height="20" align="BOTTOM" border="0" alt="Residential college seminars"></a></td>
    </tr>
    <tr>
        <td><img src="bluebook_images/scancol_11.gif" width="200" height="19" align="BOTTOM" border="0"></td>
    </tr>
    <tr>

    <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_12_academic.gif" width="200" height="20" align="BOTTOM" border="0" alt="Academic calendars"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_13b_syllabus.gif" width="200" height="21" align="BOTTOM" border="0" alt="Syllabus archive"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com">
            <img src="bluebook_images/scancol_14_classes.gif" width="200" height="20" align="BOTTOM" border="0" alt="Classes server">
            </a>
        </td>
    </tr>
    <tr>
        <td><img src="bluebook_images/scancol_15.gif" width="200" height="18" align="BOTTOM" border="0"></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_16_student_info.gif" width="200" height="21" align="BOTTOM" border="0" alt="Student Information System"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_disabilities.gif" width="200" height="21" align="BOTTOM" border="0" alt="Disabilities"></a></td>
    </tr>
    <tr>
        <td><a href="http://www.yalerecord.com"><img src="bluebook_images/scancol_17_yale_university.gif" width="200"	height="20" align="BOTTOM" border="0" alt="Yale University front door"></a></td>
    </tr>
    <tr>

    <td><img src="bluebook_images/scancol_18.gif" width="200" height="48" align="BOTTOM" border="0"></td>
    </tr>
    <tr>
        <!-- Removed once Browse feature is available.  This is only here for layout purpose. -->


<td><img src="bluebook_images/spacer.gif" width="200" height="1" align="BOTTOM" border="0"></td>
    </tr>
</table>

      </td>
      <td width="490" valign="top" height="350"> <table border="1" cellpadding="0" cellspacing="0" width="100%" bordercolor="333399">
          <tr>
            <td width="100%" height="355"> <table border="0" cellpadding="8" cellspacing="0" width="100%" bgcolor="#FFFFFF">
                <tr>
                  <td width="100%" valign="TOP" height="353"> <table border="0" cellpadding="1" cellspacing="0" width="100%">
                      <tr>
                        <td width="47%" rowspan="2">
                          <table width="100%" border="0" cellspacing="1" cellpadding="2">
                            <tr>
                              <td width="40%" nowrap><font size="1" face="Verdana, Geneva, Arial, sans-serif">Select
                              Term:</font></td>
                              <td width="60%"><font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                <select name="term">
                                  <option value=200601>Spring 2006</option><option value=200602>Summer 2006</option><option value=200603>Fall 2006</option><option value=200701>Spring 2007</option><option value=200702>Summer 2007</option><option value=200703>Fall 2007</option><option value=200801>Spring 2008</option><option value=200802>Summer 2008</option><option value=200803>Fall 2008</option><option value=200901>Spring 2009</option><option value=200902>Summer 2009</option><option value=200903>Fall 2009</option><option value=201001>Spring 2010</option><option value=201002>Summer 2010</option><option value=201003 SELECTED>Fall 2010</option><option value=201101>Spring 2011</option>
                                </select>
                              </font></td>
                            </tr>
                            <tr>
                              <td nowrap><font size="1" face="Verdana, Geneva, Arial, sans-serif">Course
                              category:&nbsp;</font></td>
                              <td><select name="GUPgroup">
                                <option value="A" selected>ALL</option>
                                <option value="U">Undergraduate</option>
                                <option value="G">Graduate</option>
                                <option value="P">Professional</option>
                                <option value="S">Summer Session</option>
                              </select></td>
                            </tr>
                          </table>

                        </td>
                        <td width="5%" rowspan="2"></td>
                        <td width="49%" height="25" align="right" valign="top" nowrap><a href="http://www.yalerecord.com" target="_blank"><img border="0" height="17" src="bluebook_images/lbl_view_classroom_locations_white.gif" width="130"></a>
                        <a href="http://www.yalerecord.com"><img src="bluebook_images/lbl_building_codes_white.gif" alt="building codes" width="81" height="17" border="0"></a><br />
                        <a href="http://www.yalerecord.com" target="_blank"><img src="bluebook_images/lbl_view_discussion_section_locations.gif" alt="View Discussion Section Locations" width="215" height="17"  border="0"></a><br />
                        <a href="http://www.yalerecord.com" target="_blank"><img src="bluebook_images/lbl_view_discussion_section_statistics.gif" alt="View Discussion Section Statistics" width="215" height="17"  border="0"></a>                      </td>
                      </tr>
                      <tr>
                        <td width="49%" rowspan="2" align="right" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                            <tr>
                              <td bgcolor="#999999"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                                  <tr>
                                    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="2">
                                        <tr>
                                          <td nowrap><font size="1" face="Verdana, Geneva, Arial, sans-serif">Course
                                            number </font></td>
                                          <td width="50%"><font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                            <input name="CourseNumber" type="TEXT" id="CourseNumber" size="15" onChange="this.className='changedField'" >
                                            </font></td>
                                        </tr>
                                        <tr>
                                          <td height="15" colspan="2" nowrap><font size="1" face="Verdana, Geneva, Arial, sans-serif">Examples:
                                            DUCK115, DUCK 115, duck*, DUCK1*</font>
                                          </td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td rowspan="4" valign="top"><font size="1" face="Verdana, Geneva, Arial, sans-serif">Program/subject<br>
                          </font> <select name="ProgramSubject" size="11">
						  	<option value="ALL">ALL</option>
                            <?php
								// 3. Perform database query
								$result = mysql_query("SELECT * FROM bluebook_departments", $connection);
								if(!$result) {
									die("Database query failed: " . mysql_error());
								}
								// 4. Use returned data
								while ($row = mysql_fetch_array($result)) {
									echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
								}
							?>
                          </select> </td>
                        <td width="5%" valign="top"><font size="1" face="Verdana, Geneva, Arial, sans-serif"><img src="bluebook_images/spacer.gif" width="10" height="10" align="BOTTOM" border="0" vspace="1"></font></td>
                      </tr>
                      <tr>
                        <td width="5%"></td>
                        <td width="49%" height="45" valign="middle"><font size="1" face="Verdana, Geneva, Arial, sans-serif">Name of instructor or administrator<br>
                          <input type="TEXT" name="InstructorName" size="25" onChange="this.className='changedField'" >
                          </font> </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#999999">
                            <tr>
                              <td> <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#FFFFFF">
                                  <tr>
                                    <td height="39"> <table width="100%" border="0" cellspacing="1" cellpadding="2">
                                        <tr>
                                          <td width="47%" height="20" nowrap><font size="1" face="Verdana, Geneva, Arial, sans-serif">M</font>
                                            <input type="CHECKBOX" name="dow" value="1" onClick="highlightDOW();">
                                            <font size="1" face="Verdana, Geneva, Arial, sans-serif">T</font>
                                            <input type="CHECKBOX" name="dow" value="2" onClick="highlightDOW();">
                                            <font size="1" face="Verdana, Geneva, Arial, sans-serif">W</font>
                                            <input type="CHECKBOX" name="dow" value="3" onClick="highlightDOW();">
                                            <font size="1" face="Verdana, Geneva, Arial, sans-serif">Th</font>
                                            <input type="CHECKBOX" name="dow" value="4" onClick="highlightDOW();">
                                            <font size="1" face="Verdana, Geneva, Arial, sans-serif">F</font>
                                            <input type="CHECKBOX" name="dow" value="5" onClick="highlightDOW();">
                                          </td>
                                        </tr>
                                        <tr>
                                          <td width="47%" height="15" nowrap><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Select hours planned for pacing and/or fretting</font></td>
                                        </tr>
                                        <tr>
                                          <td width="47%" nowrap><font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#333333">From:
                                            </font> <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
                                            <select name="timeRangeFrom"  >
                                              <option value="08" selected>8:00
                                              am</option>
                                              <option value="09">9:00 am</option>
                                              <option value="10">10:00 am</option>
                                              <option value="11">11:00 am</option>
                                              <option value="12">12 noon</option>
                                              <option value="13">1:00 pm</option>
                                              <option value="14">2:00 pm</option>
                                              <option value="15">3:00 pm</option>
                                              <option value="16">4:00 pm</option>
                                              <option value="17">5:00 pm</option>
                                              <option value="18">6:00 pm</option>
                                              <option value="19">7:00 pm</option>
                                            </select>
                                            </font> <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#333333">
                                            To: </font> <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
                                            <select name="timeRangeTo" >
                                              <option value="10">10:00 am</option>
                                              <option value="11">11:00 am</option>
                                              <option value="12">12 noon</option>
                                              <option value="13">1:00 pm</option>
                                              <option value="14">2:00 pm</option>
                                              <option value="15">3:00 pm</option>
                                              <option value="16">4:00 pm</option>
                                              <option value="17">5:00 pm</option>
                                              <option value="18">6:00 pm</option>
                                              <option value="19">7:00 pm</option>
                                              <option value="20">8:00 pm</option>
                                              <option value="21" selected>9:00
                                              pm</option>
                                            </select>
                                            </font></td>
                                        </tr>
                                      </table></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr>
                        <td width="5%" valign="middle"></td>
                        <td width="49%" valign="middle"><font size="1" face="Verdana, Geneva, Arial, sans-serif">Eligible for the Athlete Acceleration Program?
                          <input type="TEXT" name="ExactWordPhrase" size="15" onChange="this.className='changedField'" >
                          </font> </td>
                      </tr>
                      <tr>
                        <td colspan="3" height="3"><img src="bluebook_images/spacer.gif" width="8" height="3" align="BOTTOM" border="0" hspace="0" vspace="0">
                          <table width="100%" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000">
                            <tr>
                              <td> <table width="100%" border="0" cellspacing="1" cellpadding="2" bgcolor="#ebebeb">
                                  <tr>
                                <td valign="top"><table border="0" cellpadding="2" cellspacing="0" width="100%">
                                            <tr valign="top">
                                              <td colspan="4" align="left"><img src="bluebook_images/label_following_criteria.gif" align="BOTTOM" border="0" >
                                              </td>
                                            </tr>
                                            <tr valign="top">
                                            <td height="28" colspan="3" align="right">
                                               <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                                   For Class of 2014 only: When you blow your nose, do you grab a new tissue from the box or an old, crumpled one from your pocket?<br>
                                              </font></td>
                                            <td width="24%" align="left"><font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                                <input name="ycRules" type="radio" value="new" checked>New
                                                <input name="ycRules" type="radio" value="old">Old
                                                </font></td>
                                            </tr>
                                            <tr bgcolor="#CCCCCC">
                                          <td colspan="4">

                                          <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                          Skills:
                                            L1<input type="CHECKBOX" name="distributionalgroup" value="L1" onClick="highlightDistrib();">
                                            L2<input type="CHECKBOX" name="distributionalgroup" value="L2" onClick="highlightDistrib();">
                                            L3<input type="CHECKBOX" name="distributionalgroup" value="L3" onClick="highlightDistrib();">
                                            L4<input type="CHECKBOX" name="distributionalgroup" value="L4" onClick="highlightDistrib();">
                                            L5<input type="CHECKBOX" name="distributionalgroup" value="L5" onClick="highlightDistrib();">
                                            QR<input type="CHECKBOX" name="distributionalgroup" value="QR" onClick="highlightDistrib();">
                                            WR<input type="CHECKBOX" name="distributionalgroup" value="WR" onClick="highlightDistrib();">
                                            </font>
                                            <br>
                                          <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                          Areas:
                                            Humanities<input type="CHECKBOX" name="distributionalgroup" value="HU" onClick="highlightDistrib();">
                                            Sciences<input type="CHECKBOX" name="distributionalgroup" value="SC" onClick="highlightDistrib();">
                                            Social Sciences<input type="CHECKBOX" name="distributionalgroup" value="SO" onClick="highlightDistrib();">
                                          </font>

                                            <font size="1" face="Verdana, Geneva, Arial, sans-serif">Bellybutton:
                                            <input type="radio" name="distributionGroupOperator" value="AND" checked>
                                            Innie</font><font face="Verdana, Arial, Helvetica, sans-serif" size="1">
                                            <input type="radio" name="distributionGroupOperator" value="OR">
                                            </font><font size="1" face="Verdana, Geneva, Arial, sans-serif">Outie</font></td>
                                        </tr>
                                        <tr valign="middle">
                                          <td width="32%"> <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                              &nbsp;  </font>
                                          </td>
                                          <td width="35%"> <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                              &nbsp;  </font>
                                          </td>
                                          <td colspan="2"> <font size="1" face="Verdana, Geneva, Arial, sans-serif">
                                            Readings in translation, n00b?<input type="CHECKBOX" name="readingstranslation" value="Y" onClick="highlight(this);">
                                           </font> </td>
                                        </tr>
                                    </table></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                      <tr valign="top">
                        <td colspan="3" height="2"><img src="bluebook_images/spacer.gif" width="8" height="2" align="BOTTOM" border="0" hspace="3" vspace="3"></td>
                      </tr>
                      <tr valign="top">
                        <td width="47%" height="2"> <div align="right">
                            <input type="IMAGE" name="Submit" src="bluebook_images/search_button_white.gif" width="177" height="17" valign="top" border="0" align="bottom">
                          </div></td>
                        <td width="5%" height="2" valign="top"></td>
                        <td width="49%" height="2"><a href="JavaScript:document.location=document.location;"><img src="bluebook_images/clear_button_white.gif" width="50" height="17" valign="top" border="0" value="Reset" align="bottom"></a></td>
                      </tr>
                    </table>
                    <img src="bluebook_images/spacer.gif" width="43" height="2" align="BOTTOM" border="0" vspace="0">
                  </td>
                </tr>
              </table></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top" >&nbsp; </td>
      <td valign="top"> <font SIZE="1" FACE="Verdana, Geneva, Arial, sans-serif">
<br>Copyright &copy; 2010 <a href="http://www.yalerecord.com"><i>The Yale Record</i></a> New Haven, Connecticut 06520.
Published by <i>The Yale Record</i>.
Please address questions and comments to the site editor, <a HREF="mailto:chairman[at]yalerecord[dot]com">chairman[at]yalerecord[dot]com</a>
<br><br><i>The Yale Record</i> is America's oldest college humor magazine. Aside from supplementals like this site, we print six full issues each year. If you enjoyed this site and would like to get involved with <i>The Record</i>, contact the Chairman at <a HREF="mailto:chairman[at]yalerecord[dot]com">chairman[at]yalerecord[dot]com</a> or visit <a href="http://www.yalerecord.com">yalerecord.com</a>.
</font> </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
	// 5. Close connection
	mysql_close($connection);
?>
