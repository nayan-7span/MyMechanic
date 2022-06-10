<?php

// Global variable for table object
$garage_status = NULL;

//
// Table class for garage status
//
class crgarage_status extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $g_owner_name;
	var $g_name;
	var $g_email;
	var $g_phone;
	var $g_address;
	var $g_city;
	var $g_licence;
	var $g_registrationdate;
	var $g_zipcode;
	var $gr_status;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $gsLanguage;
		$this->TableVar = 'garage_status';
		$this->TableName = 'garage status';
		$this->TableType = 'VIEW';
		$this->DBID = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// g_owner_name
		$this->g_owner_name = new crField('garage_status', 'garage status', 'x_g_owner_name', 'g_owner_name', '`g_owner_name`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_owner_name->Sortable = TRUE; // Allow sort
		$this->fields['g_owner_name'] = &$this->g_owner_name;
		$this->g_owner_name->DateFilter = "";
		$this->g_owner_name->SqlSelect = "";
		$this->g_owner_name->SqlOrderBy = "";

		// g_name
		$this->g_name = new crField('garage_status', 'garage status', 'x_g_name', 'g_name', '`g_name`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_name->Sortable = TRUE; // Allow sort
		$this->fields['g_name'] = &$this->g_name;
		$this->g_name->DateFilter = "";
		$this->g_name->SqlSelect = "";
		$this->g_name->SqlOrderBy = "";

		// g_email
		$this->g_email = new crField('garage_status', 'garage status', 'x_g_email', 'g_email', '`g_email`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_email->Sortable = TRUE; // Allow sort
		$this->fields['g_email'] = &$this->g_email;
		$this->g_email->DateFilter = "";
		$this->g_email->SqlSelect = "";
		$this->g_email->SqlOrderBy = "";

		// g_phone
		$this->g_phone = new crField('garage_status', 'garage status', 'x_g_phone', 'g_phone', '`g_phone`', 20, EWR_DATATYPE_NUMBER, -1);
		$this->g_phone->Sortable = TRUE; // Allow sort
		$this->g_phone->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['g_phone'] = &$this->g_phone;
		$this->g_phone->DateFilter = "";
		$this->g_phone->SqlSelect = "";
		$this->g_phone->SqlOrderBy = "";

		// g_address
		$this->g_address = new crField('garage_status', 'garage status', 'x_g_address', 'g_address', '`g_address`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_address->Sortable = TRUE; // Allow sort
		$this->fields['g_address'] = &$this->g_address;
		$this->g_address->DateFilter = "";
		$this->g_address->SqlSelect = "";
		$this->g_address->SqlOrderBy = "";

		// g_city
		$this->g_city = new crField('garage_status', 'garage status', 'x_g_city', 'g_city', '`g_city`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_city->Sortable = TRUE; // Allow sort
		$this->fields['g_city'] = &$this->g_city;
		$this->g_city->DateFilter = "";
		$this->g_city->SqlSelect = "";
		$this->g_city->SqlOrderBy = "";

		// g_licence
		$this->g_licence = new crField('garage_status', 'garage status', 'x_g_licence', 'g_licence', '`g_licence`', 200, EWR_DATATYPE_STRING, -1);
		$this->g_licence->Sortable = TRUE; // Allow sort
		$this->fields['g_licence'] = &$this->g_licence;
		$this->g_licence->DateFilter = "";
		$this->g_licence->SqlSelect = "";
		$this->g_licence->SqlOrderBy = "";

		// g_registrationdate
		$this->g_registrationdate = new crField('garage_status', 'garage status', 'x_g_registrationdate', 'g_registrationdate', '`g_registrationdate`', 133, EWR_DATATYPE_DATE, 0);
		$this->g_registrationdate->Sortable = TRUE; // Allow sort
		$this->g_registrationdate->FldDefaultErrMsg = str_replace("%s", $GLOBALS["EWR_DATE_FORMAT"], $ReportLanguage->Phrase("IncorrectDate"));
		$this->fields['g_registrationdate'] = &$this->g_registrationdate;
		$this->g_registrationdate->DateFilter = "";
		$this->g_registrationdate->SqlSelect = "";
		$this->g_registrationdate->SqlOrderBy = "";

		// g_zipcode
		$this->g_zipcode = new crField('garage_status', 'garage status', 'x_g_zipcode', 'g_zipcode', '`g_zipcode`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->g_zipcode->Sortable = TRUE; // Allow sort
		$this->g_zipcode->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['g_zipcode'] = &$this->g_zipcode;
		$this->g_zipcode->DateFilter = "";
		$this->g_zipcode->SqlSelect = "";
		$this->g_zipcode->SqlOrderBy = "";

		// gr_status
		$this->gr_status = new crField('garage_status', 'garage status', 'x_gr_status', 'gr_status', '`gr_status`', 200, EWR_DATATYPE_STRING, -1);
		$this->gr_status->Sortable = TRUE; // Allow sort
		$this->fields['gr_status'] = &$this->gr_status;
		$this->gr_status->DateFilter = "";
		$this->gr_status->SqlSelect = "SELECT DISTINCT `gr_status`, `gr_status` AS `DispFld` FROM " . $this->getSqlFrom();
		$this->gr_status->SqlOrderBy = "`gr_status`";
	}

	// Set Field Visibility
	function SetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Multiple column sort
	function UpdateSort(&$ofld, $ctrl) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ofld->GroupingFieldId == 0) {
				if ($ctrl) {
					$sOrderBy = $this->getDetailOrderBy();
					if (strpos($sOrderBy, $sSortField . " " . $sLastSort) !== FALSE) {
						$sOrderBy = str_replace($sSortField . " " . $sLastSort, $sSortField . " " . $sThisSort, $sOrderBy);
					} else {
						if ($sOrderBy <> "") $sOrderBy .= ", ";
						$sOrderBy .= $sSortField . " " . $sThisSort;
					}
					$this->setDetailOrderBy($sOrderBy); // Save to Session
				} else {
					$this->setDetailOrderBy($sSortField . " " . $sThisSort); // Save to Session
				}
			}
		} else {
			if ($ofld->GroupingFieldId == 0 && !$ctrl) $ofld->setSort("");
		}
	}

	// Get Sort SQL
	function SortSql() {
		$sDtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = array();
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->FldExpression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->FldGroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->FldGroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sSortSql = "";
		foreach ($argrps as $grp) {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $grp;
		}
		if ($sDtlSortSql <> "") {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $sDtlSortSql;
		}
		return $sSortSql;
	}

	// Table level SQL
	// From

	var $_SqlFrom = "";

	function getSqlFrom() {
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`garage status`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}

	// Select
	var $_SqlSelect = "";

	function getSqlSelect() {
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}

	// Where
	var $_SqlWhere = "";

	function getSqlWhere() {
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}

	// Group By
	var $_SqlGroupBy = "";

	function getSqlGroupBy() {
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}

	// Having
	var $_SqlHaving = "";

	function getSqlHaving() {
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}

	// Order By
	var $_SqlOrderBy = "";

	function getSqlOrderBy() {
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Select Aggregate
	var $_SqlSelectAgg = "";

	function getSqlSelectAgg() {
		return ($this->_SqlSelectAgg <> "") ? $this->_SqlSelectAgg : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelectAgg() { // For backward compatibility
		return $this->getSqlSelectAgg();
	}

	function setSqlSelectAgg($v) {
		$this->_SqlSelectAgg = $v;
	}

	// Aggregate Prefix
	var $_SqlAggPfx = "";

	function getSqlAggPfx() {
		return ($this->_SqlAggPfx <> "") ? $this->_SqlAggPfx : "";
	}

	function SqlAggPfx() { // For backward compatibility
		return $this->getSqlAggPfx();
	}

	function setSqlAggPfx($v) {
		$this->_SqlAggPfx = $v;
	}

	// Aggregate Suffix
	var $_SqlAggSfx = "";

	function getSqlAggSfx() {
		return ($this->_SqlAggSfx <> "") ? $this->_SqlAggSfx : "";
	}

	function SqlAggSfx() { // For backward compatibility
		return $this->getSqlAggSfx();
	}

	function setSqlAggSfx($v) {
		$this->_SqlAggSfx = $v;
	}

	// Select Count
	var $_SqlSelectCount = "";

	function getSqlSelectCount() {
		return ($this->_SqlSelectCount <> "") ? $this->_SqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}

	function SqlSelectCount() { // For backward compatibility
		return $this->getSqlSelectCount();
	}

	function setSqlSelectCount($v) {
		$this->_SqlSelectCount = $v;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {

			//$sUrlParm = "order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort();
			$sUrlParm = "order=" . urlencode($fld->FldName) . "&amp;ordertype=" . $fld->ReverseSort();
			return ewr_CurrentPage() . "?" . $sUrlParm;
		} else {
			return "";
		}
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		case "x_gr_status":
			$sSqlWrk = "";
		$sSqlWrk = "SELECT DISTINCT `gr_status`, `gr_status` AS `DispFld`, '' AS `DispFld2`, '' AS `DispFld3`, '' AS `DispFld4` FROM `garage status`";
		$sWhereWrk = "";
		$this->gr_status->LookupFilters = array();
			$fld->LookupFilters += array("s" => $sSqlWrk, "d" => "DB", "f0" => '`gr_status` = {filter_value}', "t0" => "200", "fn0" => "", "dlm" => ewr_Encrypt($fld->FldDelimiter));
			$sSqlWrk = "";
		$this->Lookup_Selecting($this->gr_status, $sWhereWrk); // Call Lookup selecting
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
		$sSqlWrk .= " ORDER BY `gr_status` ASC";
			if ($sSqlWrk <> "")
				$fld->LookupFilters["s"] .= $sSqlWrk;
			break;
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["style"] = "xxx";

	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', 'GetStartsWithAFilter'); // With function, or
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//ewr_UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->FldName == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->FldName == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->FldName == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->FldName == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>