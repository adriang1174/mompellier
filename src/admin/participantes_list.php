<?php
//Include Common Files @1-25231463
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "participantes_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordparticipantesSearch { //participantesSearch Class @2-468B9A37

//Variables @2-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @2-0C99F150
    function clsRecordparticipantesSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record participantesSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "participantesSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_Apellido = new clsControl(ccsTextBox, "s_Apellido", "s_Apellido", ccsText, "", CCGetRequestParam("s_Apellido", $Method, NULL), $this);
            $this->s_Matricula = new clsControl(ccsTextBox, "s_Matricula", "s_Matricula", ccsText, "", CCGetRequestParam("s_Matricula", $Method, NULL), $this);
            $this->s_Hospital = new clsControl(ccsTextBox, "s_Hospital", "s_Hospital", ccsText, "", CCGetRequestParam("s_Hospital", $Method, NULL), $this);
            $this->s_Situacion = new clsControl(ccsTextBox, "s_Situacion", "s_Situacion", ccsText, "", CCGetRequestParam("s_Situacion", $Method, NULL), $this);
            $this->s_Telefono = new clsControl(ccsTextBox, "s_Telefono", "s_Telefono", ccsText, "", CCGetRequestParam("s_Telefono", $Method, NULL), $this);
            $this->s_Mail = new clsControl(ccsTextBox, "s_Mail", "s_Mail", ccsText, "", CCGetRequestParam("s_Mail", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @2-D3AC5D09
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_Apellido->Validate() && $Validation);
        $Validation = ($this->s_Matricula->Validate() && $Validation);
        $Validation = ($this->s_Hospital->Validate() && $Validation);
        $Validation = ($this->s_Situacion->Validate() && $Validation);
        $Validation = ($this->s_Telefono->Validate() && $Validation);
        $Validation = ($this->s_Mail->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_Apellido->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Matricula->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Hospital->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Situacion->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Telefono->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Mail->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-E81D12DD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_Apellido->Errors->Count());
        $errors = ($errors || $this->s_Matricula->Errors->Count());
        $errors = ($errors || $this->s_Hospital->Errors->Count());
        $errors = ($errors || $this->s_Situacion->Errors->Count());
        $errors = ($errors || $this->s_Telefono->Errors->Count());
        $errors = ($errors || $this->s_Mail->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @2-F50525E8
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "participantes_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "participantes_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @2-619D2D6D
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_Apellido->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Matricula->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Hospital->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Situacion->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Telefono->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Mail->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_DoSearch->Show();
        $this->s_Apellido->Show();
        $this->s_Matricula->Show();
        $this->s_Hospital->Show();
        $this->s_Situacion->Show();
        $this->s_Telefono->Show();
        $this->s_Mail->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End participantesSearch Class @2-FCB6E20C



class clsEditableGridparticipantes1 { //participantes1 Class @56-F5D9F1B2

//Variables @56-FBDE757A

    // Public variables
    public $ComponentType = "EditableGrid";
    public $ComponentName;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormParameters;
    public $FormState;
    public $FormEnctype;
    public $CachedColumns;
    public $TotalRows;
    public $UpdatedRows;
    public $EmptyRows;
    public $Visible;
    public $RowsErrors;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode;
    public $ValidatingControls;
    public $Controls;
    public $ControlsErrors;
    public $RowNumber;
    public $Attributes;
    public $PrimaryKeys;

    // Class variables
    public $Sorter_id;
    public $Sorter_Apellido;
    public $Sorter_Nombre;
    public $Sorter_especialidad;
    public $Sorter_Matricula;
    public $Sorter_Hospital;
    public $Sorter_Situacion;
    public $Sorter_Telefono;
    public $Sorter_Mail;
    public $Sorter_asistio;
//End Variables

//Class_Initialize Event @56-DA8341F3
    function clsEditableGridparticipantes1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid participantes1/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "participantes1";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["id"][0] = "id";
        $this->DataSource = new clsparticipantes1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 30;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 0;
        $this->UpdateAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->SorterName = CCGetParam("participantes1Order", "");
        $this->SorterDirection = CCGetParam("participantes1Dir", "");

        $this->Sorter_id = new clsSorter($this->ComponentName, "Sorter_id", $FileName, $this);
        $this->Sorter_Apellido = new clsSorter($this->ComponentName, "Sorter_Apellido", $FileName, $this);
        $this->Sorter_Nombre = new clsSorter($this->ComponentName, "Sorter_Nombre", $FileName, $this);
        $this->Sorter_especialidad = new clsSorter($this->ComponentName, "Sorter_especialidad", $FileName, $this);
        $this->Sorter_Matricula = new clsSorter($this->ComponentName, "Sorter_Matricula", $FileName, $this);
        $this->Sorter_Hospital = new clsSorter($this->ComponentName, "Sorter_Hospital", $FileName, $this);
        $this->Sorter_Situacion = new clsSorter($this->ComponentName, "Sorter_Situacion", $FileName, $this);
        $this->Sorter_Telefono = new clsSorter($this->ComponentName, "Sorter_Telefono", $FileName, $this);
        $this->Sorter_Mail = new clsSorter($this->ComponentName, "Sorter_Mail", $FileName, $this);
        $this->Sorter_asistio = new clsSorter($this->ComponentName, "Sorter_asistio", $FileName, $this);
        $this->id = new clsControl(ccsLink, "id", "Id", ccsInteger, "", NULL, $this);
        $this->id->Page = "participantes_maint.php";
        $this->Apellido = new clsControl(ccsLabel, "Apellido", "Apellido", ccsText, "", NULL, $this);
        $this->Nombre = new clsControl(ccsLabel, "Nombre", "Nombre", ccsText, "", NULL, $this);
        $this->especialidad = new clsControl(ccsLabel, "especialidad", "Especialidad", ccsText, "", NULL, $this);
        $this->Matricula = new clsControl(ccsLabel, "Matricula", "Matricula", ccsText, "", NULL, $this);
        $this->Hospital = new clsControl(ccsLabel, "Hospital", "Hospital", ccsText, "", NULL, $this);
        $this->Situacion = new clsControl(ccsLabel, "Situacion", "Situacion", ccsText, "", NULL, $this);
        $this->Telefono = new clsControl(ccsLabel, "Telefono", "Telefono", ccsText, "", NULL, $this);
        $this->Mail = new clsControl(ccsLabel, "Mail", "Mail", ccsText, "", NULL, $this);
        $this->asistio = new clsControl(ccsCheckBox, "asistio", "Asistio", ccsText, "", NULL, $this);
        $this->asistio->CheckedValue = $this->asistio->GetParsedValue(1);
        $this->asistio->UncheckedValue = $this->asistio->GetParsedValue(0);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = new clsButton("Button_Submit", $Method, $this);
        $this->participantes_Insert = new clsControl(ccsLink, "participantes_Insert", "participantes_Insert", ccsText, "", NULL, $this);
        $this->participantes_Insert->Parameters = CCGetQueryString("QueryString", array("id", "ccsForm"));
        $this->participantes_Insert->Page = "participantes_maint.php";
        $this->Link1 = new clsControl(ccsLink, "Link1", "Link1", ccsText, "", NULL, $this);
        $this->Link1->Page = "certificado.php";
        $this->Link2 = new clsControl(ccsLink, "Link2", "Link2", ccsText, "", NULL, $this);
        $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link2->Page = "certificado_multi.php";
        $this->Link3 = new clsControl(ccsLink, "Link3", "Link3", ccsText, "", NULL, $this);
        $this->Link3->Page = "certificado_fondo.php";
        $this->Link4 = new clsControl(ccsLink, "Link4", "Link4", ccsText, "", NULL, $this);
        $this->Link4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Link4->Page = "certificado_multifondo.php";
    }
//End Class_Initialize Event

//Initialize Method @56-0A48A3F3
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urls_Apellido"] = CCGetFromGet("s_Apellido", NULL);
        $this->DataSource->Parameters["urls_Matricula"] = CCGetFromGet("s_Matricula", NULL);
        $this->DataSource->Parameters["urls_Hospital"] = CCGetFromGet("s_Hospital", NULL);
        $this->DataSource->Parameters["urls_Situacion"] = CCGetFromGet("s_Situacion", NULL);
        $this->DataSource->Parameters["urls_Telefono"] = CCGetFromGet("s_Telefono", NULL);
        $this->DataSource->Parameters["urls_Mail"] = CCGetFromGet("s_Mail", NULL);
    }
//End Initialize Method

//SetPrimaryKeys Method @56-EBC3F86C
    function SetPrimaryKeys($PrimaryKeys) {
        $this->PrimaryKeys = $PrimaryKeys;
        return $this->PrimaryKeys;
    }
//End SetPrimaryKeys Method

//GetPrimaryKeys Method @56-74F9A772
    function GetPrimaryKeys() {
        return $this->PrimaryKeys;
    }
//End GetPrimaryKeys Method

//GetFormParameters Method @56-377D3246
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["asistio"][$RowNumber] = CCGetFromPost("asistio_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @56-8746D1CD
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id"] = $this->CachedColumns["id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->asistio->SetText($this->FormParameters["asistio"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                $Validation = ($this->ValidateRow($this->RowNumber) && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @56-B36DCE21
    function ValidateRow()
    {
        global $CCSLocales;
        $this->asistio->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->asistio->Errors->ToString());
        $this->asistio->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @56-196C56F5
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["asistio"][$this->RowNumber]) && count($this->FormParameters["asistio"][$this->RowNumber])) || strlen($this->FormParameters["asistio"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @56-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @56-909F269B
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @56-63C9CFFB
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["id"] = $this->CachedColumns["id"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->asistio->SetText($this->FormParameters["asistio"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->UpdateAllowed) { $Validation = ($this->UpdateRow() && $Validation); }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//UpdateRow Method @56-5A52FD25
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->id->SetValue($this->id->GetValue(true));
        $this->DataSource->Apellido->SetValue($this->Apellido->GetValue(true));
        $this->DataSource->Nombre->SetValue($this->Nombre->GetValue(true));
        $this->DataSource->especialidad->SetValue($this->especialidad->GetValue(true));
        $this->DataSource->Matricula->SetValue($this->Matricula->GetValue(true));
        $this->DataSource->Hospital->SetValue($this->Hospital->GetValue(true));
        $this->DataSource->Situacion->SetValue($this->Situacion->GetValue(true));
        $this->DataSource->Telefono->SetValue($this->Telefono->GetValue(true));
        $this->DataSource->Mail->SetValue($this->Mail->GetValue(true));
        $this->DataSource->asistio->SetValue($this->asistio->GetValue(true));
        $this->DataSource->Link1->SetValue($this->Link1->GetValue(true));
        $this->DataSource->Link3->SetValue($this->Link3->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//FormScript Method @56-59800DB5
    function FormScript($TotalRows)
    {
        $script = "";
        return $script;
    }
//End FormScript Method

//SetFormState Method @56-0EEA5586
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["id"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["id"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @56-692238C5
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["id"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @56-FF914898
    function Show()
    {
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["id"] = $this->id->Visible;
        $this->ControlsVisible["Apellido"] = $this->Apellido->Visible;
        $this->ControlsVisible["Nombre"] = $this->Nombre->Visible;
        $this->ControlsVisible["especialidad"] = $this->especialidad->Visible;
        $this->ControlsVisible["Matricula"] = $this->Matricula->Visible;
        $this->ControlsVisible["Hospital"] = $this->Hospital->Visible;
        $this->ControlsVisible["Situacion"] = $this->Situacion->Visible;
        $this->ControlsVisible["Telefono"] = $this->Telefono->Visible;
        $this->ControlsVisible["Mail"] = $this->Mail->Visible;
        $this->ControlsVisible["asistio"] = $this->asistio->Visible;
        $this->ControlsVisible["Link1"] = $this->Link1->Visible;
        $this->ControlsVisible["Link3"] = $this->Link3->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["id"][$this->RowNumber] = $this->DataSource->CachedColumns["id"];
                    $this->Link1->SetText("");
                    $this->Link3->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->id->Parameters = CCAddParam($this->id->Parameters, "id", $this->DataSource->f("id"));
                    $this->Apellido->SetValue($this->DataSource->Apellido->GetValue());
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->especialidad->SetValue($this->DataSource->especialidad->GetValue());
                    $this->Matricula->SetValue($this->DataSource->Matricula->GetValue());
                    $this->Hospital->SetValue($this->DataSource->Hospital->GetValue());
                    $this->Situacion->SetValue($this->DataSource->Situacion->GetValue());
                    $this->Telefono->SetValue($this->DataSource->Telefono->GetValue());
                    $this->Mail->SetValue($this->DataSource->Mail->GetValue());
                    $this->asistio->SetValue($this->DataSource->asistio->GetValue());
                    $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "id", $this->DataSource->f("id"));
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->id->SetText("");
                    $this->Apellido->SetText("");
                    $this->Nombre->SetText("");
                    $this->especialidad->SetText("");
                    $this->Matricula->SetText("");
                    $this->Hospital->SetText("");
                    $this->Situacion->SetText("");
                    $this->Telefono->SetText("");
                    $this->Mail->SetText("");
                    $this->Link1->SetText("");
                    $this->Link3->SetText("");
                    $this->id->SetValue($this->DataSource->id->GetValue());
                    $this->id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                    $this->id->Parameters = CCAddParam($this->id->Parameters, "id", $this->DataSource->f("id"));
                    $this->Apellido->SetValue($this->DataSource->Apellido->GetValue());
                    $this->Nombre->SetValue($this->DataSource->Nombre->GetValue());
                    $this->especialidad->SetValue($this->DataSource->especialidad->GetValue());
                    $this->Matricula->SetValue($this->DataSource->Matricula->GetValue());
                    $this->Hospital->SetValue($this->DataSource->Hospital->GetValue());
                    $this->Situacion->SetValue($this->DataSource->Situacion->GetValue());
                    $this->Telefono->SetValue($this->DataSource->Telefono->GetValue());
                    $this->Mail->SetValue($this->DataSource->Mail->GetValue());
                    $this->asistio->SetText($this->FormParameters["asistio"][$this->RowNumber], $this->RowNumber);
                    $this->id->Parameters = CCAddParam($this->id->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "id", $this->DataSource->f("id"));
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["id"][$this->RowNumber] = "";
                    $this->id->SetText("");
                    $this->Apellido->SetText("");
                    $this->Nombre->SetText("");
                    $this->especialidad->SetText("");
                    $this->Matricula->SetText("");
                    $this->Hospital->SetText("");
                    $this->Situacion->SetText("");
                    $this->Telefono->SetText("");
                    $this->Mail->SetText("");
                    $this->asistio->SetValue("");
                    $this->Link1->SetText("");
                    $this->Link3->SetText("");
                    $this->id->Parameters = CCAddParam($this->id->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "id", $this->DataSource->f("id"));
                } else {
                    $this->id->SetText("");
                    $this->Apellido->SetText("");
                    $this->Nombre->SetText("");
                    $this->especialidad->SetText("");
                    $this->Matricula->SetText("");
                    $this->Hospital->SetText("");
                    $this->Situacion->SetText("");
                    $this->Telefono->SetText("");
                    $this->Mail->SetText("");
                    $this->Link1->SetText("");
                    $this->Link3->SetText("");
                    $this->asistio->SetText($this->FormParameters["asistio"][$this->RowNumber], $this->RowNumber);
                    $this->id->Parameters = CCAddParam($this->id->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "id", $this->DataSource->f("id"));
                    $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "id", $this->DataSource->f("id"));
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->id->Show($this->RowNumber);
                $this->Apellido->Show($this->RowNumber);
                $this->Nombre->Show($this->RowNumber);
                $this->especialidad->Show($this->RowNumber);
                $this->Matricula->Show($this->RowNumber);
                $this->Hospital->Show($this->RowNumber);
                $this->Situacion->Show($this->RowNumber);
                $this->Telefono->Show($this->RowNumber);
                $this->Mail->Show($this->RowNumber);
                $this->asistio->Show($this->RowNumber);
                $this->Link1->Show($this->RowNumber);
                $this->Link3->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["id"] == $this->CachedColumns["id"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->Sorter_id->Show();
        $this->Sorter_Apellido->Show();
        $this->Sorter_Nombre->Show();
        $this->Sorter_especialidad->Show();
        $this->Sorter_Matricula->Show();
        $this->Sorter_Hospital->Show();
        $this->Sorter_Situacion->Show();
        $this->Sorter_Telefono->Show();
        $this->Sorter_Mail->Show();
        $this->Sorter_asistio->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->participantes_Insert->Show();
        $this->Link2->Show();
        $this->Link4->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End participantes1 Class @56-FCB6E20C

class clsparticipantes1DataSource extends clsDBConnection2 {  //participantes1DataSource Class @56-67DF2097

//DataSource Variables @56-A1B59975
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $UpdateParameters;
    public $CountSQL;
    public $wp;
    public $AllParametersSet;

    public $CachedColumns;
    public $CurrentRow;
    public $UpdateFields = array();

    // Datasource fields
    public $id;
    public $Apellido;
    public $Nombre;
    public $especialidad;
    public $Matricula;
    public $Hospital;
    public $Situacion;
    public $Telefono;
    public $Mail;
    public $asistio;
    public $Link1;
    public $Link3;
//End DataSource Variables

//DataSourceClass_Initialize Event @56-F55B1D09
    function clsparticipantes1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid participantes1/Error";
        $this->Initialize();
        $this->id = new clsField("id", ccsInteger, "");
        
        $this->Apellido = new clsField("Apellido", ccsText, "");
        
        $this->Nombre = new clsField("Nombre", ccsText, "");
        
        $this->especialidad = new clsField("especialidad", ccsText, "");
        
        $this->Matricula = new clsField("Matricula", ccsText, "");
        
        $this->Hospital = new clsField("Hospital", ccsText, "");
        
        $this->Situacion = new clsField("Situacion", ccsText, "");
        
        $this->Telefono = new clsField("Telefono", ccsText, "");
        
        $this->Mail = new clsField("Mail", ccsText, "");
        
        $this->asistio = new clsField("asistio", ccsText, "");
        
        $this->Link1 = new clsField("Link1", ccsText, "");
        
        $this->Link3 = new clsField("Link3", ccsText, "");
        

        $this->UpdateFields["asistio"] = array("Name" => "asistio", "Value" => "", "DataType" => ccsText);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @56-34B46F4E
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_id" => array("id", ""), 
            "Sorter_Apellido" => array("Apellido", ""), 
            "Sorter_Nombre" => array("Nombre", ""), 
            "Sorter_especialidad" => array("especialidad", ""), 
            "Sorter_Matricula" => array("Matricula", ""), 
            "Sorter_Hospital" => array("Hospital", ""), 
            "Sorter_Situacion" => array("Situacion", ""), 
            "Sorter_Telefono" => array("Telefono", ""), 
            "Sorter_Mail" => array("Mail", ""), 
            "Sorter_asistio" => array("asistio", "")));
    }
//End SetOrder Method

//Prepare Method @56-9D506A00
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Apellido", ccsText, "", "", $this->Parameters["urls_Apellido"], "", false);
        $this->wp->AddParameter("2", "urls_Matricula", ccsText, "", "", $this->Parameters["urls_Matricula"], "", false);
        $this->wp->AddParameter("3", "urls_Hospital", ccsText, "", "", $this->Parameters["urls_Hospital"], "", false);
        $this->wp->AddParameter("4", "urls_Situacion", ccsText, "", "", $this->Parameters["urls_Situacion"], "", false);
        $this->wp->AddParameter("5", "urls_Telefono", ccsText, "", "", $this->Parameters["urls_Telefono"], "", false);
        $this->wp->AddParameter("6", "urls_Mail", ccsText, "", "", $this->Parameters["urls_Mail"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "Apellido", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Matricula", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "Hospital", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "Situacion", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "Telefono", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "Mail", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @56-36594D19
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM participantes";
        $this->SQL = "SELECT * \n\n" .
        "FROM participantes {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @56-029F20D9
    function SetValues()
    {
        $this->CachedColumns["id"] = $this->f("id");
        $this->id->SetDBValue(trim($this->f("id")));
        $this->Apellido->SetDBValue($this->f("Apellido"));
        $this->Nombre->SetDBValue($this->f("Nombre"));
        $this->especialidad->SetDBValue($this->f("especialidad"));
        $this->Matricula->SetDBValue($this->f("Matricula"));
        $this->Hospital->SetDBValue($this->f("Hospital"));
        $this->Situacion->SetDBValue($this->f("Situacion"));
        $this->Telefono->SetDBValue($this->f("Telefono"));
        $this->Mail->SetDBValue($this->f("Mail"));
        $this->asistio->SetDBValue($this->f("asistio"));
    }
//End SetValues Method

//Update Method @56-73D18A02
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $SelectWhere = $this->Where;
        $this->Where = "id=" . $this->ToSQL($this->CachedColumns["id"], ccsInteger);
        $this->UpdateFields["asistio"]["Value"] = $this->asistio->GetDBValue(true);
        $this->SQL = CCBuildUpdate("participantes", $this->UpdateFields, $this);
        $this->SQL .= strlen($this->Where) ? " WHERE " . $this->Where : $this->Where;
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
        $this->Where = $SelectWhere;
    }
//End Update Method

} //End participantes1DataSource Class @56-FCB6E20C

//Initialize Page @1-5AE5597D
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "participantes_list.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-1B447F27
$DBConnection2 = new clsDBConnection2();
$MainPage->Connections["Connection2"] = & $DBConnection2;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$participantesSearch = new clsRecordparticipantesSearch("", $MainPage);
$participantes1 = new clsEditableGridparticipantes1("", $MainPage);
$MainPage->participantesSearch = & $participantesSearch;
$MainPage->participantes1 = & $participantes1;
$participantes1->Initialize();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-E710DB26
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-EABB8EF6
$participantesSearch->Operation();
$participantes1->Operation();
//End Execute Components

//Go to destination page @1-6CAFB450
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection2->close();
    header("Location: " . $Redirect);
    unset($participantesSearch);
    unset($participantes1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-AB73F8AA
$participantesSearch->Show();
$participantes1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6359B515
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection2->close();
unset($participantesSearch);
unset($participantes1);
unset($Tpl);
//End Unload Page


?>
