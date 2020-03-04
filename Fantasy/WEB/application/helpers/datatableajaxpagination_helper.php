<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/*
	 * Script:    DataTables server-side script for PHP and MySQL
	 * Copyright: 2010 - Allan Jardine
	 * License:   GPL v2 or BSD (3-point)
	 */
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * Easy set variables
	 */
	
	/* Array of database columns which should be read and sent back to DataTables. Use a space where
	 * you want to insert a non-database field (for example a counter or static image)
	 */

    function create_pagination($post, $table, $primaryKey, $columns) {

	//$aColumns = array( 'engine', 'browser', 'platform', 'version', 'grade' );
	$aColumns = array('id', 'cLeadSource', 'cCourse', 'cStudentName', 'iPhone', 'cEmail', 'cAddress', 'cCountry', 'dEnquiryDate', 'cStudentComment', 'followup_status', 'iUserId', 'bDelete');//$columns;
	
	/* Indexed column (used for fast and accurate table cardinality) */
	//$sIndexColumn = "id";
	$sIndexColumn = $primaryKey;
	/* DB table to use */
	//$sTable = "ajax";
	$sTable = $table;
	
	/* Database connection information */
	// $gaSql['user']       = "";
	// $gaSql['password']   = "";
	// $gaSql['db']         = "";
	// $gaSql['server']     = "localhost";
	
	
	/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
	 * If you just want to use the basic configuration for DataTables with PHP server-side, there is
	 * no need to edit below this line
	 */
	
	/* 
	 * MySQL connection
	 */
	// $gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
	// 	die( 'Could not open connection to server' );
	
	// mysql_select_db( $gaSql['db'], $gaSql['link'] ) or 
	// 	die( 'Could not select database '. $gaSql['db'] );
	
	
	/* 
	 * Paging
	 */
	$sLimit = "";
	if ( isset( $post['iDisplayStart'] ) && $post['iDisplayLength'] != '-1' )
	{
		$sLimit = "LIMIT ".mysql_real_escape_string( $post['iDisplayStart'] ).", ".
			mysql_real_escape_string( $post['iDisplayLength'] );
	}
	
	
	/*
	 * Ordering
	 */
	if ( isset( $post['iSortCol_0'] ) )
	{
		$sOrder = "ORDER BY  ";
		for ( $i=0 ; $i<intval( $post['iSortingCols'] ) ; $i++ )
		{
			if ( $post[ 'bSortable_'.intval($post['iSortCol_'.$i]) ] == "true" )
			{
				$sOrder .= $aColumns[ intval( $post['iSortCol_'.$i] ) ]."
				 	".mysql_real_escape_string( $post['sSortDir_'.$i] ) .", ";
			}
		}
		
		$sOrder = substr_replace( $sOrder, "", -2 );
		if ( $sOrder == "ORDER BY" )
		{
			$sOrder = "";
		}
	}
	
	
	/* 
	 * Filtering
	 * NOTE this does not match the built-in DataTables filtering which does it
	 * word by word on any field. It's possible to do here, but concerned about efficiency
	 * on very large tables, and MySQL's regex functionality is very limited
	 */
	$sWhere = "";
	if ( $post['sSearch'] != "" )
	{
		$sWhere = "WHERE (";
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string( $post['sSearch'] )."%' OR ";
		}
		$sWhere = substr_replace( $sWhere, "", -3 );
		$sWhere .= ')';
	}
	
	/* Individual column filtering */
	for ( $i=0 ; $i<count($aColumns) ; $i++ )
	{
		if ( $post['bSearchable_'.$i] == "true" && $post['sSearch_'.$i] != '' )
		{
			if ( $sWhere == "" )
			{
				$sWhere = "WHERE ";
			}
			else
			{
				$sWhere .= " AND ";
			}
			$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($post['sSearch_'.$i])."%' ";
		}
	}
	
	
	/*
	 * SQL queries
	 * Get data to display
	 */
	$sQuery = "
		SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
	//$rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	$rResult = $this->db->query( $sQuery);
	
	/* Data set length after filtering */
	$sQuery = "
		SELECT FOUND_ROWS()
	";
	
	// $rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	// $aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
	// $iFilteredTotal = $aResultFilterTotal[0];
	
	$rResultFilterTotal = $this->db->query( $sQuery );
	$aResultFilterTotal = $rResultFilterTotal->result_array();
	$iFilteredTotal = $aResultFilterTotal[0];


	/* Total data set length */
	$sQuery = "
		SELECT COUNT(".$sIndexColumn.")
		FROM   $sTable
	";
	// $rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
	// $aResultTotal = mysql_fetch_array($rResultTotal);
	// $iTotal = $aResultTotal[0];
	
	$rResultTotal = $this->db->query( $sQuery );
	$aResultTotal = $rResultTotal->result_array();
	$iTotal = $aResultTotal[0];
	/*
	 * Output
	 */
	$output = array(
		"sEcho" => intval($post['sEcho']),
		"iTotalRecords" => $iTotal,
		"iTotalDisplayRecords" => $iFilteredTotal,
		"aaData" => array()
	);
	
	while ( $aRow = $rResult->result_array() )
	{
		$row = array();
		for ( $i=0 ; $i<count($aColumns) ; $i++ )
		{
			if ( $aColumns[$i] == "version" )
			{
				/* Special output formatting for 'version' column */
				$row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
			}
			else if ( $aColumns[$i] != ' ' )
			{
				/* General output */
				$row[] = $aRow[ $aColumns[$i] ];
			}
		}
		$output['aaData'][] = $row;
	}
	
	return json_encode( $output );

}

?>