<?php
/*
 * @version $Id$
 ----------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2006 by the INDEPNET Development Team.
 
 http://indepnet.net/   http://glpi.indepnet.org
 ----------------------------------------------------------------------

 LICENSE

	This file is part of GLPI.

    GLPI is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    GLPI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with GLPI; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 ------------------------------------------------------------------------
*/
 
// ----------------------------------------------------------------------
// Original Author of file: Julien Dombre
// Purpose of file:
// ----------------------------------------------------------------------

include ("_relpos.php");
$NEEDED_ITEMS=array("document");
include ($phproot . "/inc/includes.php");

checkRight("document","r");

if (isset($_GET["file"])){
$splitter=split("/",$_GET["file"]);
if (count($splitter)==2)
	$send=false;
	if (!$splitter[0][0]=="_") $send=true;
	else if ($splitter[0]=="_dumps"&&haveRight("backup","w")) $send=true;
	else $send=false;
	if ($send&&file_exists($cfg_glpi["doc_dir"]."/".$_GET["file"]))
		sendFile($cfg_glpi["doc_dir"]."/".$_GET["file"],$splitter[1]);
	else echo "You do not have right to give this file";
}



?>